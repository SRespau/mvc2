<?php

    $dns = "mysql:dbname=demo;host=db"; //db es el host creado en el docker-compose. Si fuera otro sitio habría que poner el nombre o ip
    $usuario = "dbuser";
    $password = "secret";

    /**
     * 1 - Preparar la consulta -> prepare
     * 2 - Vincular los datos -> bindParam / bindValue
     * 3 - Ejecutar la sentencia -> execute();
     */
    try {
        $db = new PDO($dns, $usuario, $password);
        // Establece el nivel de error que muestra en la conexión. Aparece en la documentacion php de PDO
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        /*

        //CON BINDPARAM
        //Preparamos la consulta. Al meter datos dinámicos (no queremos unos fijos) se pone en values con : el valor
        $sentencia = $db->prepare("INSERT INTO credenciales (nombreusu,password) VALUES (:nombre, :clave)");
        $nombre = "Juan";
        $clave1 = "1234";

        //Asociamos la sentencia. Los valores no tienen por que coincidir en el nombre. BindParam pone un puntero en la variable. Si lo
        //Sobreescribimos como abajo, bindParam cogera el último valor que hemos puesto en esa variable.
        $sentencia->bindParam(":nombre", $nombre);
        $sentencia->bindParam(":clave", $clave1);

        $nombre = "Pedro";
        $clave1 = "789";
        $sentencia->execute(); //Ejecuta la sentencia
        echo "<h2>Exito bindParam</h2";
        //FIN BINDPARAM

        */
        
        
        /*
        
        //CON BINDVALUE
        //Preparamos la consulta. Al meter datos dinámicos (no queremos unos fijos) se pone en values con : el valor
        $sentencia = $db->prepare("INSERT INTO credenciales (nombreusu,password) VALUES (:nombre, :clave)");
        $nombre = "Juan";
        $clave1 = "1234";

        //Asociamos la sentencia. Los valores no tienen por que coincidir en el nombre. 
        //Con bindValue coge el valor, no apunta a la variable. Por lo que cogera los primeros valores que se han creado y no los sobrescritos
        $sentencia->bindValue(":nombre", $nombre);
        $sentencia->bindValue(":clave", $clave1);

        $nombre = "Pedro";
        $clave1 = "789";
        $sentencia->execute(); //Ejecuta la sentencia
        echo "<h2>Exito bindValue</h2";
        //FIN BINDVALUE

        */

        /*
        //CON BindParam2
        //Preparamos la consulta. Al meter datos dinámicos (no queremos unos fijos) se pone en values con : el valor
        $sentencia = $db->prepare("INSERT INTO credenciales (nombreusu,password) VALUES (?, ?)"); //Posicion 1 y 2
        $nombre = "Juan";
        $clave1 = "1234";

        //Asociamos la sentencia. Los valores no tienen por que coincidir en el nombre. 
        //Con bindValue coge el valor, no apunta a la variable. Por lo que cogera los primeros valores que se han creado y no los sobrescritos
        $sentencia->bindValue(1, $nombre);
        $sentencia->bindValue(2, $clave1);

        $nombre = "Pedro";
        $clave1 = "789";
        $sentencia->execute(); //Ejecuta la sentencia
        echo "<h2>Exito bindValue</h2";
        //FIN BINDVALUE

        */




        //CON EXECUTE + PREPARE
        //Preparamos la consulta. Al meter datos dinámicos (no queremos unos fijos) se pone en values con : el valor
        $sentencia = $db->prepare("INSERT INTO credenciales (nombreusu,password) VALUES (?, ?)"); //Posicion 1 y 2
        $nombre = "Juan";
        $clave1 = "1234";

        //Asociamos la sentencia. Los valores no tienen por que coincidir en el nombre. 
        //Con bindValue coge el valor, no apunta a la variable. Por lo que cogera los primeros valores que se han creado y no los sobrescritos
               
        $sentencia->execute(array(':nombre' => $nombre, ':pass' => $clave1)); //Ejecuta la sentencia
        echo "<h2>Exito execute con array</h2";
        //FIN BINDVALUE

        
    } catch (PDOException $e) {
        echo "Error producido al conectar: " . $e->getMessage();
    }