<?php

/**
 * Clase DatosController: 
 * Controla todas las operaciones relacionadas con el control de ficheros (importar, subida de ficheros)
 */
class DatosController{

    function __construct(){
        
    }

    /**
     * Función importar: Controlará la inserción de datos en la base de datos mediante ficheros XML provistos.
     * - Cargará el fichero "agenda.xml" ubicado en la carpeta files.
     *      - Si devuelve false se mostrará un aviso de error y devolverá al menú principal de agenda.
     * - Si es correcto el archivo XML insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Con un bucle foreach obtendremos los datos del XML importado y los pasaremos a variables.
     * - Si el atributo del campo tipo es "persona":
     *      - Obtendrá los datos y los pasará por la función replace (borrar acentos).
     *      - Buscará los contactos importados en la base de datos mediante sentencia SQL SELECT. Si existen no los insertará. Si no existen los insetará mediante sentencia SQL INSERT en la tabla "persona"
     * - Si el atributo del campo de tipo es "empresa" realizará los mismos pasos que para "persona" y los insertará en la tabla "empresas"   
     * - Al finalizar saldrá un mensaje de éxito en pantalla y redirigiŕa al menú principal de la agenda
     */
    function importar(){
        // Cargamos la clase de libxml para tratar los errores que pueda ocurrir al tratar archivos XML
        libxml_use_internal_errors(true);
        $datos = simplexml_load_file("../files/xml/agenda.xml");
        
        if($datos === false){
            header ("refresh:4; /home/agenda");
            echo "Fallo al cargar el fichero XML\n   ->  ";
            foreach(libxml_get_errors() as $error) {
            echo  $error->message;
            echo "<br><b>Devolviendo al menú de la agenda....</b>";
            }           
        }else{
            require "../core/Connection.php";
        
            foreach($datos->contacto as $data){            
            
                if($data["tipo"] == "persona"){
                
                    $db = Connection::db(); 
                                     
                    $nombre = $this->replace($data->nombre);
                    $apellidos = $this->replace($data->apellidos);
                    $direccion = $this->replace($data->direccion);
                    $telefono = $data->telefono;       
                    
                    $busqueda = "SELECT * FROM persona WHERE Nombre ='" . strtoupper($nombre) . "' and Apellidos='" . strtoupper($apellidos) . "' and Direccion ='" . strtoupper($direccion) . "' and Telefono=" . $telefono;
        
                    if($db->query($busqueda)->rowCount() > 0){

                    }else{
                    $sql = "INSERT INTO persona VALUES ('" . strtoupper($nombre) . "', '" . strtoupper($apellidos) . "', '" . strtoupper($direccion) . "', " . $telefono . ");";
                    $db->query($sql);
                    }
                }else{                    
                    $db = Connection::db(); 
        
                    $razon = $this->replace($data->nombre);                
                    $direccion = $this->replace($data->direccion);
                    $telefono = $data->telefono; 
                    $email = $this->replace($data->email);      
                    
                    $busqueda = "SELECT * FROM empresa WHERE RazonSocial ='" . strtoupper($razon) . "' and Direccion ='" . strtoupper($direccion) . "' and Telefono=" . $telefono . " and Email='" . strtoupper($email) . "'";
        
                    if($db->query($busqueda)->rowCount() > 0){

                    }else{
                    $sql = "INSERT INTO empresa VALUES ('" . strtoupper($razon) . "', '" . strtoupper($direccion) . "', " . $telefono . ", '" . strtoupper($email) . "');";
                    $db->query($sql);
                    }
                }
            }
            header ("refresh:2; /home/agenda");
            echo "Importado con éxito. <b>Redirigiendo a la agenda....</b>";
        }   
    }

    /**
     * Función replace: reemplaza caracteres por otros
     * - Se le enviará una palabra comprobar y reemplazar.
     * - Buscará si tiene alguna vocal con acento y la sustituirá por la misma vocal sin acento.
     * - Devolverá la misma palabra sin acentos.
     */
    function replace($frase){
        $buscar  = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú');
        $replace = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u');
        $resultado = str_replace($buscar, $replace, $frase);
        
        return $resultado;
    }

    /**
     * Función subidaFichero: Controlará la subida de ficheros al servidor.
     * - Se instanciarán varias variables:
     *      - target_dir -> carpeta destino 
     *      - target_file -> carpeta destino + nombre fichero
     *      - imageFileType -> obtiene la extensión del fichero subido
     *      - target_file -> será la ruta destino con el nombre modificado de la imagen subida
     * - Comprobará si ha venido mediante POST del pantel de control de login
     * - Si ha venido mediante el panel de control comprobará si el fichero es mayor de 5 megas. En caso afirmativo no lo subirá.
     * - Comprobará si el fichero subido corresponde con las extensiones jpg, jpeg, png y pdf. En caso contrario no lo subirá
     */
    function subidaFichero(){
        session_start();
        $target_dir = "update/";
        $target_file = $target_dir . basename($_FILES["myfile"]["name"]); 
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $target_file = $target_dir . "fotoPerfil" . $_SESSION["credenciales"][0] . "." . $imageFileType; 
        
        if(isset($_POST["envio"])) {
            $check = getimagesize($_FILES["myfile"]["tmp_name"]);

            if($check !== false){
                if ($_FILES["myfile"]["size"] > 5242880) {
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
            echo "<br>Lo siento, tu archivo no se ha subido.";
            echo "<br><a href='/login'>Volver al panel de control </a>";
          
          } else {            
            
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                
              echo "El fichero ". htmlspecialchars( basename( $_FILES["myfile"]["name"])). " se ha subido.";
              echo "<br><a href='/login'>Volver al panel de control </a>";
            } else {
              echo "Lo siento, hubo un error subiendo la imagen.";
              echo "<br><a href='/login'>Volver al panel de control </a>";
            }
          }
    }
    
}