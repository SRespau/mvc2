<?php

namespace App\Controllers;

class HomeController{

    function __construct(){
        echo "Este es el constructor de HomeController";
        //Constructor vacio
    }    

    function index(){
        require "../views/home.php";
    }

    function show(){
        echo "<br>Dentro de show de HomeController";
    }   


}//Fin clase home