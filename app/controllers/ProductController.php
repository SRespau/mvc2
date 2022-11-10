<?php

class Product{

    function __construct(){
        //Constructor vacio        
    }//fin constructor

    
    function index(){ //Por defecto se crean en public los metodos
        $products = Product::all(); 
        require("views/home.php");
        // Metodo home de COntroller de mvc00
    }

    function show(){
        $id = $_GET["id"];
        $product = Product::find($id);
        require("views/show.php");
    }
}//Fin clase