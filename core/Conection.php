<?php

namespace Core;

use PDO;
use PDOException;

class Model{
   protected static function db()
    {
        $dsn = "mysql:dbname=demo;host=db"; 
        $usuario = "dbuser";
        $password = "secret";
        try {
            $db = new PDO($dsn, $usuario, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        return $db;
    }
}
