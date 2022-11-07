<?php
// Domain, source, name. Conexion a la base de datos
    // mysql:dbname=<nombre_bbdd>;host=<ip | nombre>; hostname lo hemos mirado en docker-compose.yml
    $dsn = "mysql:dbname=demo;host=db";
    $usuario = "dbuser";
    $clave = "secret";

    try {
        $db = new PDO($dsn, $usuario, $clave); //Creamos un objeto PDO con esos valores como pone en la pagina de php
    } catch (PDOException $e) {
        echo "Mensaje de la excepcion:" . $e->getMessage();
    }