<?php

class CompanyController{

    function __construct(){
        //constructor vacio
    } 

    function index(){        
        require "../views/company/empresaNueva.php";
    }
    
    function all($razonSocial, $direccion, $telefono, $email){
        $persona = new Company($razonSocial, $direccion, $telefono, $email);
        
        return $persona->getRazonSocial();
    }


    //Esto funciona. Devuelve uno
    function show(){
        require "../connection.php";

        $sql = "SELECT * FROM empresas WHERE RazonSocial = 'Juguettos'";
        $registros = $db->query($sql);
        var_dump($registros);
        echo "<br>Numero de registros devueltos: " . $registros->rowCount(); 
    }

    //Esto funciona. Comprobado
    function insertar(){
        require "../core/Connection.php";

        $db = Connection::db(); 
        
        $razon = $_POST["rSocial"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];

        $sql = "INSERT INTO empresas VALUES ('" . $razon . "', '" . $direccion . "', " . $telefono . ", '" . $email . "');";
        $registros = $db->query($sql);
        
        if($registros->rowCount() > 0){
            //require "../views/agenda.php"; //Lo mejor sería redireccionar despues del mensaje
            echo "<br>Contacto guardado con éxito en la agenda."; 
            echo "<br>Datos insertados: " . $registros->rowCount(); //Devolvera el numero de registros de la consulta
            echo "<a href='/home/agenda'>Volver a agenda </a>";            
        }else{
            echo "<br>Error al guardar el contacto en la agenda";
        }
        
    }

   

}