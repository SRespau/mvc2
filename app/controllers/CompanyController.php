<?php

class CompanyController{

    function __construct(){
        //constructor vacio
    } 

    function index(){        
        require "../views/company/MenuEmpresa.php";
    }
    
    function empresaNueva(){
        require "../views/company/EmpresaNueva.php";
    }

    function eliminarEmpresa(){
        require "../views/company/EliminarEmpresa.php";
    }

    function modificarEmpresa(){
        require "../views/company/ModificarEmpresa.php";
    }

    function buscarEmpresa(){
        require "../views/company/BuscarEmpresa.php";
    }

  
    function insertar(){
        require "../core/Connection.php";
        $db = Connection::db(); 
        
        $razon = $_POST["rSocial"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];       
                
        $busqueda = "SELECT * FROM empresas WHERE RazonSocial ='" . strtoupper($razon) . "'";
        
        if($db->query($busqueda)->rowCount() > 0){
            echo "Contacto ya existe. Por favor, escriba nombre diferente";
            echo "<a href='/home/agenda'>Volver a agenda </a>";
        }else{
            $sql = "INSERT INTO empresas VALUES ('" . strtoupper($razon) . "', '" . strtoupper($direccion) . "', " . $telefono . ", '" . strtoupper($email) . "');";
            $registros = $db->query($sql);
        
            if($registros->rowCount() > 0){
                //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
                echo "<br>Contacto guardado con éxito en la agenda."; 
                echo "<br>Datos insertados: " . $registros->rowCount(); //Devolvera el numero de registros de la consulta
                echo "<a href='/home/agenda'>Volver a agenda </a>";            
            }else{
                echo "<br>Error al guardar el contacto en la agenda";
                echo "<a href='/home/agenda'>Volver a agenda </a>";
            }
        }  
        
    }

    function eliminar(){
        require "../core/Connection.php";
        $db = Connection::db();

        $razon = strtoupper($_POST["rSocial"]);

        $sql = "DELETE FROM empresas WHERE RazonSocial = '" . $razon . "';";
        $registros = $db->query($sql);

        if($registros->rowCount() > 0){
            //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
            echo "<br>Contacto eliminado con éxito de la agenda."; 
            echo "<br>Datos eliminados: " . $registros->rowCount(); //Devolvera el numero de registros de la consulta
            echo "<a href='/home/agenda'>Volver a agenda </a>";            
        }else{
            echo "<br>Error al eliminar el contacto de la agenda";
            echo "<a href='/home/agenda'>Volver a agenda </a>";
        }
    }


    function modificar(){
        require "../core/Connection.php";
        $db = Connection::db();

        $razonBuscar = strtoupper($_POST["rSocialModificar"]);                
        
        $busqueda = "SELECT * FROM empresas WHERE RazonSocial ='" . $razonBuscar . "'";
        
        foreach ($db->query($busqueda) as $dato) {
           $razon = $dato[0];
           $direccion = $dato[1];
           $telefono = $dato[2];
           $email = $dato[3];            
        }
       
        if($_POST["rSocial"] != ""){
            $razon = $_POST["rSocial"];
        }

        if($_POST["direccion"] != ""){
            $direccion = $_POST["direccion"];
        }

        if($_POST["telefono"] != ""){
            $telefono = $_POST["telefono"];
        }

        if($_POST["email"] != ""){
            $email = $_POST["email"];
        }
        
        $sql = "UPDATE empresas SET RazonSocial='" . strtoupper($razon) . "', Direccion='" . strtoupper($direccion) . "', Telefono =" . $telefono . ", Email='" . strtoupper($email) . "' WHERE RazonSocial='" . $razonBuscar . "'"; 
        $registros = $db->query($sql);

        if($registros->rowCount() > 0){
            //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
            echo "<br>Contacto modificado con éxito de la agenda."; 
            echo "<br>Datos modificados: " . $registros->rowCount(); //Devolvera el numero de registros de la consulta
            echo "<a href='/home/agenda'>Volver a agenda </a>";            
        }else{
            echo "<br>Error al modificar el contacto de la agenda";
            echo "<a href='/home/agenda'>Volver a agenda </a>";
        }
    }

    function show(){
        require "../core/Connection.php";

        $db = Connection::db();

        $razonBuscar = strtoupper($_POST["rSocial"]);
                
        $busqueda = "SELECT * FROM empresas WHERE RazonSocial ='" . $razonBuscar . "'";
        
        foreach ($db->query($busqueda) as $dato) {
           $razon = $dato[0];
           $direccion = $dato[1];
           $telefono = $dato[2];
           $email = $dato[3];            
        }
        
        if($db->query($busqueda)->rowCount() > 0){
            //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
            echo "<br>Los datos de la empresa buscada son los siquientes:<br>"; 
            echo "<br>Razón Social -> " . $razon;
            echo "<br>Dirección -> " . $direccion;
            echo "<br>Teléfono -> " . $telefono;
            echo "<br>Email -> " . $email;
            echo "<br><br><a href='/home/agenda'>Volver a agenda </a>";            
        }else{
            echo "<br>Error al mostrar el contacto de la agenda";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
    }

    function showAll(){
        require "../core/Connection.php";

        $db = Connection::db();      
                
        $busqueda = "SELECT * FROM empresas";
                
        if($db->query($busqueda)->rowCount() > 0){
            //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
            $contador = 1;
            foreach ($db->query($busqueda) as $dato) {
                echo "Contacto: " . $contador;
                echo "<br>Razón Social -> " . $dato[0];
                echo "<br>Dirección -> " . $dato[1];
                echo "<br>Teléfono -> " . $dato[2];
                echo "<br>Email -> " . $dato[3];
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