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
        $views = ['home/index'];
        $args  = ['title' => 'Home'];
        View::render($views, $args);
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
                $params["pass2"] = recoge("nombre");

                if(empty($params["nombre"]) || empty($params["pass"]) || empty($params["pass2"])){
                    $params["error"] = "Por favor, rellena todos los datos del formulario";
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

        }
    }

    public function login()
    {
        if(!isset($_SESSION["id"])){
            $params=array(
                "nombre"=>'',
                "pass"=>''
            );

            $views = ['home/login'];
            $args  = ['title' => 'Home',
                      'error' => 'Usuario o contraseña incorrectos.'
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