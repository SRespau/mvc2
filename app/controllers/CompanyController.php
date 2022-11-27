<?php

/**
 * Clase CompanyController: 
 * Controla todas las operaciones de la agenda relacionada con contactos de empresa
 */
class CompanyController{

    /**
     * Funciones de redirección: función para redigirir a vistas 
     * Serán llamadas desde el menú de la opción de "empresa".
     * Cada una redirigirá a la vista correspondiente con el html de solicitud de datos.
     */
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

    function showAll(){
        require "../views/company/MostrarTodo.php";
    }
  
    /**
     * Función insertar: Añade un nuevo contacto de empresa a la agenda.
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Obtendrá los datos que se han enviado desde el formulario html en "EmpresaNueva.php" mediante POST
     * - Buscará y comprobará en la tabla "empresas" si el nombre existe mediante sentencia SQL SELECT *.
     *      - Si ya existe no lo insertará y mostraŕa un aviso.
     *      - Si no existe transformará los datos en mayúsculas y lo insertará en la base de datos mediante sentencia SQL INSERT INTO y mostrará un aviso.
     */
    function insertar(){
        require "../core/Connection.php";
        $db = Connection::db(); 
        
        $razon = $_POST["rSocial"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];       
        try{

                
            $busqueda = "SELECT * FROM empresa WHERE RazonSocial ='" . strtoupper($razon) . "'";
        
            if($db->query($busqueda)->rowCount() > 0){
                echo "Contacto ya existe. Por favor, escriba nombre diferente";
                echo "<a href='/home/agenda'>Volver a agenda </a>";
            }else{
                $sql = "INSERT INTO empresa VALUES ('" . strtoupper($razon) . "', '" . strtoupper($direccion) . "', " . $telefono . ", '" . strtoupper($email) . "');";
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
        }catch(PDOException $p){  
            echo "Algún campo rellenado erroneo,vuelve a intentarlo.";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
    }

    /**
     * Función eliminar: Elimina un contacto de empresa de la base de datos
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Obtendrá mediante GET el nombre enviado por el link ubicado en la página "EliminarEmpresa.php"
     * - Transformará el dato obtenido a mayúsculas y ejecutará la sentencia SQL DELETE FROM para eliminar dicho contacto de la tabla empresa.
     * - Mostrará un aviso si se ha realizado con éxito la eliminación o no
     */
    function eliminar(){
        require "../core/Connection.php";
        $db = Connection::db();

        $razon = strtoupper($_GET["rSocial"]);

        $sql = "DELETE FROM empresa WHERE RazonSocial = '" . $razon . "';";
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
     * Función modificar: modificará uno o varios datos de un contacto de empresa de la base de datos.
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Obtendrá mediante POST el nombre a modificar y los datos nuevos del formulario de la página "ModificarEmpresa.php".
     * - Buscará en la tabla "empresa" el contacto a modificar y se guardarán sus datos en variables.
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

        $razonBuscar = strtoupper($_POST["rSocialModificar"]);                
       
        try {
        
            $busqueda = "SELECT * FROM empresa WHERE RazonSocial ='" . $razonBuscar . "'";
        
            foreach ($db->query($busqueda) as $dato) {
                $razon = $dato[0];
                $direccion = $dato[1];
                $telefono = $dato[2];
                $email = $dato[3];            
            }
       
            if($_POST["rSocial"] != ""){
                $razon = $_POST["rSocial"];
                $contador++;
            }

            if($_POST["direccion"] != ""){
                $direccion = $_POST["direccion"];
                $contador++;
            }

            if($_POST["telefono"] != ""){
                $telefono = $_POST["telefono"];
                $contador++;
            }

            if($_POST["email"] != ""){
                $email = $_POST["email"];
                $contador++;
            }
        
            if($_POST["rSocial"] == "" && $_POST["direccion"] == "" && $_POST["telefono"] == "" && $_POST["email"] == ""){
                echo "Campos de datos a modificar vacíos. Rellena al menos un campo.";
                echo "<br><a href='/company/modificarEmpresa'>Volver atrás</a>";
            }else{ 

            $sql = "UPDATE empresa SET RazonSocial='" . strtoupper($razon) . "', Direccion='" . strtoupper($direccion) . "', Telefono =" . $telefono . ", Email='" . strtoupper($email) . "' WHERE RazonSocial='" . $razonBuscar . "'"; 
            $registros = $db->query($sql);
       
                if($registros->rowCount() > 0){                
                    echo "<br>Contacto modificado con éxito de la agenda."; 
                    echo "<br>Datos modificados: " . $contador;
                    echo "<br><a href='/home/agenda'>Volver a agenda </a>";            
                }else{
                    echo "<br>Error al modificar el contacto de la agenda. El contacto no existe o está mal escrito.";
                    echo "<br><a href='/company/modificarEmpresa'>Volver atrás</a>";
                }
            }
        }catch(PDOException $p){  
            echo "Algún campo rellenado erroneo,vuelve a intentarlo.";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
    }

    /**
     * Función showOne: Recibirá un valor y mostrará sus datos de la base de datos.
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Obtendrá el dato que le han enviado y lo transformará a mayúsculas.
     * - Realizará la sentencia SQL SELECT con el dato enviado para buscarlo en la tabla "empresa".
     * - Buscará por la palabra insertada. Devolverá 1 registro si se pone nombre completo de la agenda o devolverá varios si se llaman igual.
     * - Realizará un bucle foreach para recorrer el objeto PDOStatement y mostrará por pantalla cada dato recibido.      
     */
    static function showOne($rSocial){
        require "../core/Connection.php";

        $db = Connection::db();

        $razonBuscar = strtoupper($rSocial);
                
        $busqueda = "SELECT * FROM empresa WHERE RazonSocial = '" . $razonBuscar . "'";
        
        if($db->query($busqueda)->rowCount() > 0){
            foreach ($db->query($busqueda) as $dato) {            
            echo "<br><b>Datos del contacto:</b><br>"; 
            echo "<br>Razón Social -> " . $dato[0];
            echo "<br>Dirección -> " . $dato[1];
            echo "<br>Teléfono -> " . $dato[2];
            echo "<br>Email -> " . $dato[3];
            echo "<br>";
            }                        
        }else{
            echo "<br>Contacto no encontrado";            
        }
    }

    /**
     * Función showTodo: Mostrará por pantalla todos los datos de cada contacto empresa de la base de datos
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Realizará la sentencia SQL SELECT para buscar todos los contactos de la tabla empresa.
     * - Realizará un bucle foreach para recorrer el objeto PDOStatement y mostrará cada dato recibido.      
     */
    static function showTodo(){
        require "../core/Connection.php";
        
        $db = Connection::db();      
                
        $busqueda = "SELECT * FROM empresa";
                
        if($db->query($busqueda)->rowCount() > 0){            
            $contador = 1;
            foreach ($db->query($busqueda) as $dato) {
                echo "<b>Datos del contacto: " . $contador . "</b>";
                echo "<br>Razón Social -> " . $dato[0];
                echo "<br>Dirección -> " . $dato[1];
                echo "<br>Teléfono -> " . $dato[2];
                echo "<br>Email -> " . $dato[3];
                echo "<br><br>";
                $contador++;            
            }                       
        }else{
            echo "<br>Error al mostrar los contactos de la agenda";
            echo "<br><a href='/home/agenda'>Volver a agenda </a>";
        }
    }
   

}