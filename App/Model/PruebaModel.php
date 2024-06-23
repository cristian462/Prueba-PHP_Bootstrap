<?php

namespace App\Model;

use Core\Model;

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
    }

    public function Login($nombre, $pass)
    {
        $sql = "SELECT pass FROM usuarios WHERE nombre = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre]);
        $encryptPass = $query->fetchColumn();

        return password_verify($pass, $encryptPass);
    }

    public function a()
    {
        $sql = "SELECT nombre FROM usuarios";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}