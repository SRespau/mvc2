<?php
    // Domain, source, name. Conexion a la base de datos
    
    class Connection{

        static function db(){
             $dsn = "mysql:dbname=agenda;host=db"; 
             $usuario = "root";
             $password = "password";

            try {
                $db = new PDO($dsn, $usuario, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Fallo la conexión: ' . $e->getMessage();
            }
            
            return $db;
        }
    }