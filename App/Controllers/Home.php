<?php

namespace App\Controllers;

use Core\View;

use App\Model\PruebaModel;

use function App\Libs\recoge;

require_once __DIR__ . '/../Libs/Functions.php';

class Home
{
    public function index()
    {
        if(isset($_SESSION["id"])){
            try{
                $model = new PruebaModel();
                $result = $model->profile($_SESSION["id"]);

                $views = ['home/index'];
                $args  = ['title' => 'Home',
                          'name' => 'Name: '.$result["nombre"],
                          'date' => 'Registration Date: '.$result["fecha"]
                         ];
                View::render($views, $args);
            }catch(Exception $e){
                $views = ['home/index'];
                $args  = ['title' => 'Home',
                          'name' => 'Home',
                          'date' => ''
                         ];
                View::render($views, $args);
            }
        }else{
            $views = ['home/index'];
            $args  = ['title' => 'Home',
                      'name' => 'Home',
                      'date' => ''
                     ];
            View::render($views, $args);
        }
    }

    public function signUp()
    {
        if(!isset($_SESSION["id"])){
            $params = array(
                'nombre'=>'',
                'pass'=>'',
                'pass2'=>'',
                'error'=>''
            );

            if(isset($_POST["submit"])){
                $params["nombre"] = recoge("nombre");
                $params["pass"] = recoge("pass");
                $params["pass2"] = recoge("pass2");

                if(empty($params["nombre"]) || empty($params["pass"])){
                    $params["error"] = "Por favor, rellena todos los datos del formulario";
                }

                if (strlen($params["nombre"]) > 20){
                    $params["error"] = "El nombre es demasiado largo.";
                }

                if (strlen($params["pass"]) > 16){
                    $params["error"] = "La contraseña es demasiado larga.";
                }

                if($params["pass"] !== $params["pass2"]){
                    $params["error"] = "Las contraseñas no coinciden";
                }

                if($params["error"] === ''){
                    try{
                        $model = new PruebaModel();
                        $hash = password_hash($params["pass"], PASSWORD_BCRYPT);
                        $date = date('Y-m-d');
                        $_SESSION["id"]=$model->signUp($params["nombre"], $hash, $date);

                        header("Location: http://app.local");
                    }catch (Exception $e){
                        $views = ['home/signup'];
                        $args  = ['title' => 'Sign Up',
                                  'error' => 'Ha ocurrido un problema al registrarse'
                                 ];
                        View::render($views, $args);
                    }
                }else{
                    $views = ['home/signup'];
                    $args  = ['title' => 'Sign Up',
                              'error' => $params['error']
                             ];
                    View::render($views, $args);
                }
            }
            $views = ['home/signup'];
            $args  = ['title' => 'Sign Up',
                      'error' => $params['error']
                     ];
            View::render($views, $args);
        }else{
            header("Location: http://app.local");
        }
    }

    public function login()
    {
        if(!isset($_SESSION["id"])){
            $params=array(
                "nombre"=>'',
                "pass"=>'',
                "error"=>''
            );

            if(isset($_POST["submit"])){
                $params["nombre"] = recoge("nombre");
                $params["pass"] = recoge("pass");

                if (strlen($params["nombre"]) > 20 || strlen($params["pass"]) > 16){
                    $params["error"] = "Usuario o contraseña incorrectos.";
                }

                if(empty($params["error"])){
                    try{
                        $model = new PruebaModel();
                        $id = $model->login($params["nombre"],$params["pass"]);

                        if($id > 0){
                            $_SESSION["id"] = $id;
                            header("Location: http://app.local");
                        }else{
                            $views = ['home/login'];
                            $args  = ['title' => 'Home',
                                      'error' => 'Usuario o contraseña incorrectos.'
                                     ];
                            View::render($views, $args);
                        }
                    }catch(Exception $e){
                        $views = ['home/login'];
                        $args  = ['title' => 'Home',
                                  'error' => 'Usuario o contraseña incorrectos.'
                                 ];
                        View::render($views, $args);
                    }
                }else{
                    $views = ['home/login'];
                    $args  = ['title' => 'Home',
                              'error' => $params["error"]
                             ];
                    View::render($views, $args);
                }
            }

            $views = ['home/login'];
            $args  = ['title' => 'Home',
                      'error' => ''
                     ];
            View::render($views, $args);
        }else{
            header("Location: http://app.local");
        }
    }

    public function logout()
    {
        $_SESSION["id"] = null;

        header("Location: http://app.local");
    }
}