<?php

/**
 * Clase PeopleController: 
 * Controla todas las operaciones de la agenda relacionada con contactos de personas
 */
class PeopleController{

    /**
     * Funciones de redirección: función para redigirir a vistas 
     * Serán llamadas desde el menú de la opción de "persona".
     * Cada una redirigirá a la vista correspondiente con el html de solicitud de datos.
     */
    function __construct(){
        //constructor vacio
    } 

    function index(){        
        require "../views/people/MenuPersona.php";
    }
    
    function personaNueva(){
        require "../views/people/PersonaNueva.php";
    }

    function eliminarPersona(){
        require "../views/people/EliminarPersona.php";
    }

    function modificarPersona(){
        require "../views/people/ModificarPersona.php";
    }

    function buscarPersona(){
        require "../views/people/BuscarPersona.php";
    }

    function showAll(){
        require "../views/people/MostrarTodo.php";
    }
  
    /**
     * Función insertar: Añade un nuevo contacto de persona a la agenda.
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Obtendrá los datos que se han enviado desde el formulario html en "PersonaNueva.php" mediante POST
     * - Buscará y comprobará en la tabla "persona" si el contacto existe mediante sentencia SQL SELECT * usando nombre y apellidos.
     *      - Si ya existe no lo insertará y mostraŕa un aviso.
     *      - Si no existe transformará los datos en mayúsculas y lo insertará en la base de datos mediante sentencia SQL INSERT INTO y mostrará un aviso.
     */
    function insertar(){
        require "../core/Connection.php";
        $db = Connection::db(); 
        
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];         
        
        try{
            $busqueda = "SELECT * FROM persona WHERE Nombre ='" . strtoupper($nombre) . "' and Apellidos='" . strtoupper($apellidos) . "'";
        
            if($db->query($busqueda)->rowCount() > 0){
                echo "Contacto ya existe. Por favor, escriba nombre y apellidos diferente";
                echo "<a href='/home/agenda'>Volver a agenda </a>";
            }else{
                $sql = "INSERT INTO persona VALUES ('" . strtoupper($nombre) . "', '" . strtoupper($apellidos) . "', '" . strtoupper($direccion) . "', " . $telefono . ");";
                $registros = $db->query($sql);
        
                if($registros->rowCount() > 0){                
                    echo "<br>Contacto guardado con éxito en la agenda."; 
                    echo "<br>Datos insertados: " . $registros->rowCount();
                    echo "<br><a href='/home/agenda'>Volver a agenda </a>";            
                }else{
                    echo "<br>Error al guardar el contacto en la agenda";
                    echo "<br><a href='/home/agenda'>Volver a agenda </a>";
                }
            } 
        }catch(PDOException $p){  
            echo "Algún campo rellenado erroneo,vuelve a intentarlo.";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
    }

    /**
     * Función eliminar: Elimina un contacto de persona de la base de datos
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Obtendrá mediante GET el nombre y apellidos enviados por el link ubicado en la página "EliminarPersona.php"
     * - Transformará el dato obtenido a mayúsculas y ejecutará la sentencia SQL DELETE FROM para eliminar dicho contacto de la tabla "persona".
     * - Mostrará un aviso si se ha realizado con éxito la eliminación o no
     */
    function eliminar(){
        require "../core/Connection.php";
        $db = Connection::db();

        $nombre = strtoupper($_GET["nombre"]);
        $apellidos  = strtoupper($_GET["apellidos"]);
        
        $sql = "DELETE FROM persona WHERE Nombre = '" . $nombre . "' and Apellidos='" . $apellidos . "'";
        $registros = $db->query($sql);

        if($registros->rowCount() > 0){
            
            echo "<br>Contacto eliminado con éxito de la agenda."; 
            echo "<br>Contactos eliminados: " . $registros->rowCount();
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";            
        }else{
            echo "<br>Error al eliminar el contacto de la agenda";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
    }


    /**
     * Función modificar: modificará uno o varios datos de un contacto de persona de la base de datos.
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Obtendrá mediante POST el nombre y apellidos a modificar y los datos nuevos del formulario de la página "ModificarPersona.php".
     * - Buscará en la tabla "persona" el contacto a modificar y se guardarán sus datos en variables.
     * - Mediante condicionales comprobamos que campos a modificar ha dejado vacios en el formulario html.
     *      - Si están vacios mantendrá en la variable el mismo dato que había en la base de datos.
     *      - Si no están vacios modificará la variable del dato por el nuevo valor del formulario.
     * - Si se encuentran los 4 campos del formulario vacios mandará un aviso de que hay que rellenar al menos 1 campo.
     * - Actualizará mediante sentencia SQL UPDATE los campos nuevos.
     * - Mostrará un aviso si se ha realizado con éxito la modificación o no.
     */
    function modificar(){
        require "../core/Connection.php";
        $contador = 0;
        $db = Connection::db();

        $nombreBuscar = strtoupper($_POST["nombreModificar"]);
        $apellidosBuscar = strtoupper($_POST["apellidosModificar"]);        
        
        try{
            $busqueda = "SELECT * FROM persona WHERE Nombre ='" . $nombreBuscar . "' and Apellidos='" . $apellidosBuscar . "'";
        
            foreach ($db->query($busqueda) as $dato) {
                $nombre = $dato[0];           
                $apellidos = $dato[1];           
                $direccion = $dato[2];
                $telefono = $dato[3];                       
            }
       
            if($_POST["nombre"] != ""){
                $nombre = strtoupper($_POST["nombre"]);
                $contador++;
            }

            if($_POST["apellidos"] != ""){
                $apellidos = strtoupper($_POST["apellidos"]);
                $contador++;
            }

            if($_POST["direccion"] != ""){
                $direccion = strtoupper($_POST["direccion"]);
                $contador++;
            }

            if($_POST["telefono"] != ""){
                $telefono = $_POST["telefono"];
                $contador++;
            }
       
            if($_POST["nombre"] == "" && $_POST["apellidos"] == "" && $_POST["direccion"] == "" && $_POST["telefono"] == ""){
                echo "Campos de datos a modificar vacíos. Rellena al menos un campo.";
                echo "<br><a href='/people/modificarPersona'>Volver atrás</a>";
            }else{       
                $sql = "UPDATE persona SET Nombre='" . $nombre . "', Apellidos='" . $apellidos . "', Direccion ='" . $direccion . "', Telefono=" . $telefono . " WHERE Nombre ='" . $nombreBuscar . "' and Apellidos='" . $apellidosBuscar . "'"; 
                $registros = $db->query($sql);        

                if($registros->rowCount() > 0){                
                    echo "<br>Contacto modificado con éxito de la agenda."; 
                    echo "<br>Datos modificados: " . $contador; 
                    echo "<br><a href='/home/agenda'>Volver a agenda </a>";            
                }else{
                    echo "<br>Error al modificar el contacto de la agenda. El contacto no existe o está mal escrito.";
                    echo "<br><a href='/people/modificarPersona'>Volver atrás</a>";
                }
            }
        }catch(PDOException $p){  
            echo "Algún campo rellenado erroneo,vuelve a intentarlo.";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
    }
    }

    /**
     * Función showOne: Recibirá varios valores de busquedá y mostrará sus datos de la base de datos.
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Obtendrá los datos que le han enviado y los transformará a mayúsculas.
     * - Con una condicional estableceremos que tipo de busqueda queremos hacer en la tabla "persona".
     *      - Si el campo apellido se encuentra vacío buscaremos en la base de datos todos los contactos que coincidan con el nombre dado.
     *      - Si el campo apellido se ha rellenado buscaremos en la base de datos el contacto que coincida con el nombre y apellido dado.
     * - Realizará un bucle foreach para recorrer el objeto PDOStatement y mostrará por pantalla cada dato recibido.      
     */
    static function showOne($nombre, $apellidos){
        require "../core/Connection.php";

        $db = Connection::db();

        $nombreBuscar = strtoupper($nombre);
        $apellidosBuscar = strtoupper($apellidos);      
        
        if($apellidosBuscar == ""){

            $busqueda = "SELECT * FROM persona WHERE Nombre ='" . $nombreBuscar . "'";        
            
        }else{
            $busqueda = "SELECT * FROM persona WHERE Nombre ='" . $nombreBuscar . "' and Apellidos = '" . $apellidosBuscar . "'";
        }  
                   
        if($db->query($busqueda)->rowCount() > 0){
            $contador = 1;           
            foreach ($db->query($busqueda) as $dato) {
                echo "<b>Datos del contacto:</b> " . $contador;
                echo "<br>Nombre -> " . $dato[0];
                echo "<br>Apellidos -> " . $dato[1];
                echo "<br>Dirección -> " . $dato[2];
                echo "<br>Teléfono -> " . $dato[3];
                echo "<br><br>";
                $contador++;
            }   
        }else{
            echo "<br>Contacto no encontrado.";            
        }
        
    }

    /**
     * Función showTodo: Mostrará por pantalla todos los datos de cada contacto persona de la base de datos
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Realizará la sentencia SQL SELECT para buscar todos los contactos de la tabla "persona".
     * - Se comprobará con una condicional si la busqueda ha dado como resultado alguna fila
     *      - Si ha devuelto alguna fila realizará un bucle foreach para recorrer el objeto PDOStatement y mostrará cada dato recibido.
     *      - Si NO ha devuelto ninguna fila mostrará un mensaje de error y un link para volver a la agenda     
     */
    static function showTodo(){
        require "../core/Connection.php";

        $db = Connection::db();      
                
        $busqueda = "SELECT * FROM persona";
                
        if($db->query($busqueda)->rowCount() > 0){            
            $contador = 1;
            foreach ($db->query($busqueda) as $dato) {
                echo "<b>Contacto: " . $contador . "</b>";
                echo "<br>Nombre -> " . $dato[0];
                echo "<br>Apellidos -> " . $dato[1];
                echo "<br>Dirección -> " . $dato[2];
                echo "<br>Teléfono -> " . $dato[3];
                echo "<br><br>";
                $contador++;            
            }                        
        }else{
            echo "<br>Error al mostrar los contactos de la agenda";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
    }
   

}