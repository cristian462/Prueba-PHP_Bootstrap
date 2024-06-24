<?php

namespace Core;

use App\Config\Config;
use PDO;

class Model
{
    protected $db;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";charset=" . Config::DB_CHARSET;
            $options = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            $this->db = new PDO($dsn, Config::DB_USER, Config::DB_PASS, $options);
        } catch (\PDOException $e) {
            exit('Database connection could not be established. Error: ' . $e->getMessage());
        }
    }
}
