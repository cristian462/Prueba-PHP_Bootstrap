<?php

namespace App\Model;

use Core\Model;

use PDO;

class PruebaModel extends Model
{
    public function signUp($nombre, $pass, $fecha)
    {
        $sql = "INSERT INTO usuarios (nombre,pass,fecha) VALUES (?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $pass);
        $query->bindParam(3, $fecha);
        $query->execute();

        return $this->db->lastInsertId();
    }

    public function login($nombre, $pass)
    {
        $sql = "SELECT id_user, pass FROM usuarios WHERE nombre = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $id_user = $result['id_user'];
            $encryptPass = $result['pass'];

            if (password_verify($pass, $encryptPass)) {
                return $id_user;
            }
        }
        return 0;
    }

}