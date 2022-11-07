<?php  
        require("../conexion.php");
        

        /*MVC -> es un patron. Se sabe a ciencia cierta que dividiendolo en 3 partes (modelo, vista, controlador) voy a tener una aplicación web robusta
        Patrón ->Es una serie de metodos que sabemos que repitiendolos vamos a obtener un resultado optimo, siempre el mismo.

        */

        $sql = "SELECT nombreusu, password FROM credenciales"; //Comando para SQL
        $registros = $db->query($sql); //Realizamos la busqueda sql. Devuelve array asociativo con los datos
        echo "<br>Numero de registros devueltos: " . $registros->rowCount(); //Devolvera el numero de registros de la consulta
        
        if($registros->rowCount() > 0){
            foreach($registros as $fila){ //Accedemos al array asociativo y lo mostramos
                echo "<br>Nombre de usuario: " . $fila["nombreusu"]; // Clave del array
                echo "<br>Password: " . $fila["password"];
            }
        }else{
            echo "<br>No se ha devuelto ninguna fila";
        }


        /*// Añadir un campo nuevo
        $add = "INSERT INTO credenciales VALUES ('usuario2','$2y$10\$aYtf0pGGRdcxPfsavyCdP.dRg42fj8CBhZFXNBEWBy7WjleEb8mNC')";
        $db->query($add);

        $registros = $db->query($sql);
        if($registros->rowCount() > 0){
            foreach($registros as $fila){ //Accedemos al array asociativo y lo mostramos
                echo "<br>Nombre de usuario: " . $fila["nombreusu"]; // Clave del array
                echo "<br>Password: " . $fila["password"];
            }
        }else{
            echo "<br>No se ha devuelto ninguna fila";
        }


        // Modificar un campo
        $modify = "UPDATE credenciales SET nombreusu='presidente' WHERE nombreusu='usuario2'";
        $db->query($modify);
        $registros = $db->query($sql);
        if($registros->rowCount() > 0){
            foreach($registros as $fila){ //Accedemos al array asociativo y lo mostramos
                echo "<br>Nombre de usuario: " . $fila["nombreusu"]; // Clave del array
                echo "<br>Password: " . $fila["password"];
            }
        }else{
            echo "<br>No se ha devuelto ninguna fila";
        }

        //Eliminar un campo*/
  
    
    