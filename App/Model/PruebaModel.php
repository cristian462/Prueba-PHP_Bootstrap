<?php

namespace App\Model;

use Core\Model;

class PruebaModel extends Model
{
    public function signUp($nombre, $pass, $fecha)
    {
        $sql = "INSERT INTO usuario (nombre,pass,fecha) VALUES (?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $pass);
        $query->bindParam(3, $fecha);
        $query->execute()

        return $query->fetchAll();
    }

    public function Login($nombre, $pass)
    {
        $sql = "SELECT pass FROM usuario WHERE nombre = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre]);
        $encryptPass = $query->fetchColumn();

        return password_verify($pass, $encryptPass);
    }
}