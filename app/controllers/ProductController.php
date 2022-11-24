<?php

namespace App\Controllers;
use App\Models\Product;

require_once "../app/models/Product.php"; //Al poner namespace en Product ya coge el del mismo namespace y no hace falta poner el require


class ProductController{

    function __construct(){
        //Constructor vacio        
    }//fin constructor

    
    function index(){ //Por defecto se crean en public los metodos        
        $products = Product::all();
        require "../app/views/homeProduct.php";        
    }

    function show($args){
        list($id) = $args;
        $product = Product::find($id);
        require('../app/views/showProduct.php');   
    }

    //------------Funciones para insertar-------------//
    public function create(){
    require '../app/views/formularioAltaProduct.php';
    }

    public function store(){
        $product = new Product();
        $product->id = $_REQUEST['id'];
        $product->name = $_REQUEST['name'];
        $product->price = $_REQUEST['price'];
        $product->fecha_compra = $_REQUEST['fecha_compra'];
        $product->insert();
        header('Location:/product');
    }
    //------------ FIN Funciones para insertar-------------//

    //------------Funciones para modificar----------------//
    public function edit($arguments){
        $id = (int) $arguments[0];
        $product = Product::find($id);
        require '../app/views/user/edit.php';
    }

    public function update(){
        $id = $_REQUEST['id'];
        $user = Product::find($id);
        $user->name = $_REQUEST['name'];
        $user->surname = $_REQUEST['surname'];
        $user->birthdate = $_REQUEST['birthdate'];
        $user->email = $_REQUEST['email'];
        $user->save();
        header('Location:/user');
    }

    //------------FIN Funciones para modificar-------------//

    //-----------Funciones para borrar ------------------//
    //Viene los datos de la url    mvc.local/product/delete/1
    public function delete($arguments){
        $id = (int) $arguments[0];
        $product = Product::find($id);
        $product->delete();
        header('Location:/product');
    }

    
    
}//Fin clase

