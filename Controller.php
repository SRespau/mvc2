<?php

require_once "Product.php";
class Controller{
    
    function __construct(){
        //constructor vacio
    }

    //Función que:
    //  -Recogerá todos los productos
    //  -Llama a vista de inventario
    public function home(){
        $products = Product::all(); //Doble punto por ser un metodo estatico
        require("views/home.php");
    }


    //Funcion que:
    //  - Mostrará un producto en particular. Se pasa un id como parametro
    //  - Llamar vista de un producto en concreto.
    public function show(){
       $id = $_GET["id"];
       $product = Product::find($id);
       require("views/show.php");
    }
}// fin_clase
