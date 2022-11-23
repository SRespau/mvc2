<?php

namespace App\Models;  

use PDO;
use Core\Model;

require_once '../core/Model.php';

    //Extendemos clase Model de conection
class Product extends Model{
        

    function __construct(){
        //constructor vacio
    } 
    
    public static function all(){
        $db = Product::db();
        $statement = $db->query('SELECT * FROM products');
        $products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public static function find($id)
    {
        $db = Product::db();
        $stmt = $db->prepare('SELECT * FROM products WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $products = $stmt->fetch(PDO::FETCH_CLASS);
        return $products;
    }

    public function delete(){
         //TODO 
    }

    public function save(){
         //TODO 
    }



}// FIN_CLASE
