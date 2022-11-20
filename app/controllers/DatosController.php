<?php

class DatosController{

    function __construct(){
        
    }

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
                    $nombre = $this->replace($data->nombre);
                    $apellidos = $this->replace($data->apellidos);
                    $direccion = $this->replace($data->direccion);
                    $telefono = $data->telefono;       
        
                    $sql = "INSERT INTO persona VALUES ('" . strtoupper($nombre) . "', '" . strtoupper($apellidos) . "', '" . strtoupper($direccion) . "', " . $telefono . ");";
                    $db->query($sql);
                
                }else{                    
                    $db = Connection::db(); 
        
                    $razon = $this->replace($data->nombre);                
                    $direccion = $this->replace($data->direccion);
                    $telefono = $data->telefono; 
                    $email = $this->replace($data->email);      
        
                    $sql = "INSERT INTO empresas VALUES ('" . strtoupper($razon) . "', '" . strtoupper($direccion) . "', " . $telefono . ", '" . strtoupper($email) . "');";
                    $db->query($sql);
                }
            }
        }   
        header ("refresh:2; ../home");
        echo "Importado con exíto. Redirigiendo al indice";
                
    }

    function replace($frase){
        $buscar  = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú');
        $replace = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u');
        $resultado = str_replace($buscar, $replace, $frase);
        
        return $resultado;
    }


    function subidaFichero(){
        session_start();
        $target_dir = "../files/userPicture/";
        $target_file = $target_dir . basename($_FILES["myfile"]["name"]); //"fotoPerfil" . $_SESSION["credenciales"][0]
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $target_file = $target_dir . "fotoPerfil" . $_SESSION["credenciales"][0] . "." . $imageFileType; //"fotoPerfil" . $_SESSION["credenciales"][0]
        // Check if image file is a actual image or fake image
        if(isset($_POST["envio"])) {
            $check = getimagesize($_FILES["myfile"]["tmp_name"]);

            if($check !== false){
                if ($_FILES["myfile"]["size"] > 5000000) {
                    echo "Lo siento, fichero mayor que 5mb.";
                    $uploadOk = 0;
                }else{
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" ) {
                        echo "Lo siento, solo archivos jpg, jpeg, png y pdf admitidos.";
                        $uploadOk = 0;
                    } 
                } 
            $uploadOk = 1;
            
            } else {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
            }
        }
        if ($uploadOk == 0) {
            echo "Lo siento, tu archivo no se ha subido.";
          
          } else {
            
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                
              echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
              echo "Lo siento, hubo un error subiendo la imagen.";
            }
          }
    }
    
}