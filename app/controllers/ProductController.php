<?php

require_once "../Product.php"; //Esto de normal iria en models

class ProductController{

    function __construct(){
        //Constructor vacio        
    }//fin constructor

    
    function index(){ //Por defecto se crean en public los metodos
        $products = Product::all();
        require "../views/homeProduct.php";        
        // Metodo home de Controller de mvc00
    }

    function show($arguments){
        $id = $_GET["id"];
        $product = Product::find($id);
        require("../views/showProduct.php");
    }
    
}//Fin clase