<?php
    /**
     * Clase Connection: encargada de entablar conexión con nuestra base de datos
     * - Devolverá la variable necesaria para poder realizar sentencias con una conexión establecida.
     */
    
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