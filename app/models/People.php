<?php

class People{

    function __construct($nombre, $apellidos, $direccion, $telefono){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    static function insertar(){
        require "../core/Connection.php";
        $db = Connection::db();

        $busqueda = "SELECT * FROM persona WHERE Nombre ='" . strtoupper($nombre) . "' and Apellidos='" . strtoupper($apellidos) . "'";
        
        if($db->query($busqueda)->rowCount() > 0){
            echo "Contacto ya existe. Por favor, escriba nombre y apellidos diferente";
            echo "<a href='/home/agenda'>Volver a agenda </a>";
        }else{
            $sql = "INSERT INTO persona VALUES ('" . strtoupper($nombre) . "', '" . strtoupper($apellidos) . "', '" . strtoupper($direccion) . "', " . $telefono . ");";
            $registros = $db->query($sql);
        
            if($registros->rowCount() > 0){
                //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
                echo "<br>Contacto guardado con éxito en la agenda."; 
                echo "<br>Datos insertados: " . $registros->rowCount(); //Devolvera el numero de registros de la consulta
                echo "<br><a href='/home/agenda'>Volver a agenda </a>";            
            }else{
                echo "<br>Error al guardar el contacto en la agenda";
                echo "<br><a href='/home/agenda'>Volver a agenda </a>";
            }
        } 
    }
}