<?php

class HomeController{

    function __construct(){
        //Constructor vacio
    }

    function index(){
        require "../views/indice.php";
    }

    function agenda(){
        session_start();
        if(isset($_SESSION["credenciales"])){
            require "../views/agenda.php";
        }else{
            header("Location: ../login");
        }        
    }

}//Fin clase home