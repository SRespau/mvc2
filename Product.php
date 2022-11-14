<?php
    //Fichero que simula el modelo con datos
    class Product{
        const PRODUCTS = [
            array(1, "Cortacesped"),
            array(2, "Pizarra"),
            array(3, "Billar"),
            array(4, "Dardos")
        ];

    function __construct(){
        //constructor vacio
    } 
     
    //Devuelve todos los productos
    public static function all(){ //static -> función que pertenece a la clase, no al objeto
        return Product::PRODUCTS; //Devolvemos de la clase product la constante PRODUCT. :: por ser estatico
    }        
     
    //Devuelve un producto en particular buscado por la clave del array
    public static function find($id){        
        return Product::PRODUCTS[$id - 1];
    }


    }// FIN_CLASE