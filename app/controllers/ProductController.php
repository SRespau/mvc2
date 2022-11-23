<?php

namespace App\Controllers;

use \App\Models\Product; //Asi no añadimos en las funciones \Product. Con esto sustituimos la ruta completa

//require_once "../app/models/Product.php"; 


class ProductController{

    function __construct(){
        //Constructor vacio        
    }//fin constructor

    
    function index(){ //Por defecto se crean en public los metodos
        $products = Product::all(); //Se pone \Product porque está en el namespace global
        require "../app/views/homeProduct.php";        
        // Metodo home de Controller de mvc00
    }

    function show($arguments){
        $id = $_GET["id"];
        $product = Product::find($id);
        require("../app/views/showProduct.php");
    }
    
}//Fin clase