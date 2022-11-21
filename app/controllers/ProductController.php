<?php

namespace App\Controllers;

require_once "../app/models/Product.php"; //Al poner namespace en Product ya coge el del mismo namespace y no hace falta poner el require


class ProductController{

    function __construct(){
        //Constructor vacio        
    }//fin constructor

    
    function index(){ //Por defecto se crean en public los metodos
        $products = \App\Models\Product::all(); //Se pone \Product porque está en el namespace global
        require "../app/views/homeProduct.php";        
        // Metodo home de Controller de mvc00
    }

    function show($arguments){
        $id = $_GET["id"];
        $product = \App\Models\Product::find($id);
        require("../app/views/showProduct.php");
    }
    
}//Fin clase