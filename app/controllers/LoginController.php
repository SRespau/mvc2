<?php

namespace App\Controllers;
use \App\Models\User;

class LoginController{

    function __construct(){
        //Controlador vacio
    }

    function index(){
        session_start();
        if(isset($_SESSION["login"])){
            header("Location: /home");
        }else{
            header("Location: /login");
        }
        
    }

    function verificar(){
        $email = $_POST["user"];
        $pass = $_POST["pass"];
        $user = new User();

        if($user->passwordVerify($email, $pass)){
            session_start();
            $_SESSION["login"] = $email;
            header("Location: /home");
        }else{
            header("Location: /login");
        }
    }

    function logout(){
        session_start();
        if(isset($_SESSION["login"])){
            $_SESSION[] = array();
            session_destroy();
            setcookie(session_name(),"", time() -120, '/');
            header("Location: /home");
        }else{
            header("Location: /login");
        } 
        
    }
}//Fin clase login