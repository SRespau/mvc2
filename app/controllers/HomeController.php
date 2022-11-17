<?php

class HomeController{

    function __construct(){
        //Constructor vacio
    }

    function index(){
        require "../views/indice.php";
    }

    function agenda(){
        require "../views/agenda.php";
    }

}//Fin clase home