<?php

namespace App\Controllers;

class HomeController{

    function __construct(){
        
        //Constructor vacio
    }    

    function index(){
        require "../app/views/home.php";
    }

    function show(){
        echo "<br>Dentro de show de HomeController";
    } 
    
    


}//Fin clase home