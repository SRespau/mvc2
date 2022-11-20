<?php

class LoginController {

    function __construct(){

    }//Fin constructor

    function index(){
        session_start();
        if(isset($_SESSION["credenciales"])){
            require "../views/login/logeado.php";            
        }else{
            require "../views/login/login.php";
        }        
    }
    
    function auth(){              
        require "../core/Connection.php";
        $db = Connection::db();

        $user = $_POST["user"];
        $pass = $_POST["pass"];            
                
        $busqueda = "SELECT * FROM credenciales WHERE usuario ='" . $user . "'";

        foreach ($db->query($busqueda) as $dato) {
            $userCheck = $dato[0];
            $passCheck = $dato[1];
                        
        }

        if($userCheck == $user && password_verify($pass, $passCheck)){
            session_start();
            $datos = [$user, $passCheck];
            $_SESSION["credenciales"] = $datos;

            header ("refresh:2; ../home");
            echo "Login con exíto. Redirigiendo...";
        }else{
            echo "Usuario o contraseña erroneos. Vuelva a intentarlo.";
            echo "<br><a href='/login'>Volver a login </a>";            
        }  

    }

    function logout(){
        session_start();
        if(isset($_SESSION["credenciales"])){
            $_SESSION = array();
            session_destroy();
            setcookie(session_name(),"", time() -120, '/');
            header("Location: ../home");
        }else{
            require "../views/login/login.php";
        } 
        
    }
}//Fin LoginController