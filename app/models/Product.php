<?php

namespace App\Models;  

use PDO;
use Core\Model;

//require_once '../core/Model.php'; //Al tener el autoload.php no hace falta hacer el require_once. El fichero ya lo hace para todo

    //Extendemos clase Model de conection
    class Product extends Model{
        const PRODUCTS = [
            array(1, "Cortacesped"),
            array(2, "Pizarra"),
            array(3, "Billar"),
            array(4, "Dardos")
        ];

    function __construct(){
        //constructor vacio
    } 
    /* 
    //Devuelve todos los productos
    public static function all(){ //static -> función que pertenece a la clase, no al objeto
        return Product::PRODUCTS; //Devolvemos de la clase product la constante PRODUCT. :: por ser estatico
    }        
     
    //Devuelve un producto en particular buscado por la clave del array
    public static function find($id){        
        return Product::PRODUCTS[$id - 1];
    }
    */
    public static function all(){
        return Product::PRODUCTS; 
    }
    public static function find($id){
        return Product::PRODUCTS[$id - 1]; 
    }

    public function delete(){
         //TODO 
    }

    public function save(){
         //TODO 
    }



    }// FIN_CLASE