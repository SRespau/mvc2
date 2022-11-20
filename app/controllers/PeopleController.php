<?php


class PeopleController{

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

  
    function insertar(){
        require "../core/Connection.php";
        $db = Connection::db(); 
        
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];         
        
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

    function eliminar(){
        require "../core/Connection.php";
        $db = Connection::db();

        $nombre = strtoupper($_POST["nombre"]);
        $apellidos  = strtoupper($_POST["apellidos"]);

        $sql = "DELETE FROM persona WHERE Nombre = '" . $nombre . "' and Apellidos='" . $apellidos . "'";
        $registros = $db->query($sql);

        if($registros->rowCount() > 0){
            //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
            echo "<br>Contacto eliminado con éxito de la agenda."; 
            echo "<br>Datos eliminados: " . $registros->rowCount(); //Devolvera el numero de registros de la consulta
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";            
        }else{
            echo "<br>Error al eliminar el contacto de la agenda";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
    }


    function modificar(){
        require "../core/Connection.php";
        $db = Connection::db();

        $nombreBuscar = strtoupper($_POST["nombreModificar"]);
        $apellidosBuscar = strtoupper($_POST["apellidosModificar"]);        
        
        $busqueda = "SELECT * FROM persona WHERE Nombre ='" . $nombreBuscar . "' and Apellidos='" . $apellidosBuscar . "'";
        
        foreach ($db->query($busqueda) as $dato) {
           $nombre = $dato[0];           
           $apellidos = $dato[1];           
           $direccion = $dato[2];
           $telefono = $dato[3];                       
        }
       
        if($_POST["nombre"] != ""){
            $nombre = strtoupper($_POST["nombre"]);
        }

        if($_POST["apellidos"] != ""){
            $apellidos = strtoupper($_POST["apellidos"]);
        }

        if($_POST["direccion"] != ""){
            $direccion = strtoupper($_POST["direccion"]);
        }

        if($_POST["telefono"] != ""){
            $telefono = $_POST["telefono"];
        }
       
        $sql = "UPDATE persona SET Nombre='" . $nombre . "', Apellidos='" . $apellidos . "', Direccion ='" . $direccion . "', Telefono=" . $telefono . " WHERE Nombre ='" . $nombreBuscar . "' and Apellidos='" . $apellidosBuscar . "'"; 
        $registros = $db->query($sql);

        if($registros->rowCount() > 0){
            //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
            echo "<br>Contacto modificado con éxito de la agenda."; 
            echo "<br>Datos modificados: " . $registros->rowCount(); //Devolvera el numero de registros de la consulta
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";            
        }else{
            echo "<br>Error al modificar el contacto de la agenda";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
    }

    function show(){
        require "../core/Connection.php";

        $db = Connection::db();

        $nombreBuscar = strtoupper($_POST["nombre"]);
        $apellidosBuscar = strtoupper($_POST["apellidos"]);        
        
        if($apellidosBuscar == ""){

            $busqueda = "SELECT * FROM persona WHERE Nombre ='" . $nombreBuscar . "'";        
            
        }else{
            $busqueda = "SELECT * FROM persona WHERE Nombre ='" . $nombreBuscar . "' and Apellidos LIKE '" . $apellidosBuscar . "%'";
        }        
            
        if($db->query($busqueda)->rowCount() > 0){
            //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
            $contador = 1;
            foreach ($db->query($busqueda) as $dato) {
                echo "Contacto: " . $contador;
                echo "<br>Nombre -> " . $dato[0];
                echo "<br>Apellidos -> " . $dato[1];
                echo "<br>Dirección -> " . $dato[2];
                echo "<br>Teléfono -> " . $dato[3];
                echo "<br><br>";
            $contador++;            
            }   
        echo "<br><br><a href='/home/agenda'>Volver a agenda </a>";            
        }else{
            echo "<br>Error al mostrar el contacto de la agenda";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
        
    }

    function showAll(){
        require "../core/Connection.php";

        $db = Connection::db();      
                
        $busqueda = "SELECT * FROM persona";
                
        if($db->query($busqueda)->rowCount() > 0){
            //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
            $contador = 1;
            foreach ($db->query($busqueda) as $dato) {
                echo "Contacto: " . $contador;
                echo "<br>Nombre -> " . $dato[0];
                echo "<br>Apellidos -> " . $dato[1];
                echo "<br>Dirección -> " . $dato[2];
                echo "<br>Teléfono -> " . $dato[3];
                echo "<br><br>";
                $contador++;            
            }
            echo "<br><br><a href='/home/agenda'>Volver a agenda </a>";            
        }else{
            echo "<br>Error al mostrar los contactos de la agenda";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
    }
   

}