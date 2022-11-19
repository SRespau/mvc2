<?php

class DatosController{

    function importar(){
        
        $datos = simplexml_load_file("../files/xml/agenda.xml");
        
        if($datos == false){
            echo "<br>No se ha podido leer el fichero xml";
            header ("refresh:2; ../home/agenda");
        }else{
            require "../core/Connection.php";
        
            foreach($datos->contacto as $data){            
            
                if($data["tipo"] == "persona"){
                
                    $db = Connection::db(); 
                    
                    //Cambiar a mano los acentos en xml o hacer funcion con replace para quitar todos los acentos
                    $nombre = $data->nombre;
                    $apellidos = $data->apellidos;
                    $direccion = $data->direccion;
                    $telefono = $data->telefono;       
        
                    $sql = "INSERT INTO persona VALUES ('" . strtoupper($nombre) . "', '" . strtoupper($apellidos) . "', '" . strtoupper($direccion) . "', " . $telefono . ");";
                    $db->query($sql);
                
                }else{                    
                    $db = Connection::db(); 
        
                    $razon = $data->nombre;                
                    $direccion = $data->direccion;
                    $telefono = $data->telefono; 
                    $email = $data->email;      
        
                    $sql = "INSERT INTO empresas VALUES ('" . strtoupper($razon) . "', '" . strtoupper($direccion) . "', " . $telefono . ", '" . strtoupper($email) . "');";
                    $db->query($sql);
                }
            }
        }   
        header ("refresh:2; ../home");
        echo "Importado con exíto. Redirigiendo al indice";
                
    }
    
}