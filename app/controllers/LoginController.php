<?php

class LoginController {

    function __construct(){

    }//Fin constructor

    function index(){
        require "../views/login/login.php";
    }
    
    /*function auth(){
        $usuario = Login::all();

    }*/
}//Fin LoginController