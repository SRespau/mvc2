<?php

namespace App\Models;  

use PDO;
use Core\Model;
use DateTime;


require_once '../core/Model.php';

    //Extendemos clase Model de conection
class Product extends Model{
        

    function __construct(){
        $this->fecha_compra = DateTime::createFromFormat('Y-m-d', $this->fecha_compra);
    } 
    
    public static function all(){
        $db = Product::db();
        $statement = $db->query('SELECT * FROM products');
        $products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public static function find($id){
        $db = Product::db();
        $stmt = $db->prepare('SELECT * FROM products WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $products = $stmt->fetch(PDO::FETCH_CLASS);
        return $products;
    }

    public function insert(){
        $db = Product::db();
        $stmt = $db->prepare('INSERT INTO products(id, name, type_id, price, fecha_compra) VALUES(:id, :name, :id, :price, :fecha_compra)');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':price', $this->price);
        $stmt->bindValue(':fecha_compra', $this->fecha_compra);
        
        return $stmt->execute();
    }
    

    public function save(){
        $db = Product::db();
        $stmt = $db->prepare('UPDATE products SET id = :id, name = :name, type_id = :id, price = :price, fecha_compra = :fecha_compra WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':price', $this->price);
        $stmt->bindValue(':fecha_compra', $this->fecha_compra);
        
        return $stmt->execute();
    }

    public function delete(){
        $db = Product::db();
        $stmt = $db->prepare('DELETE FROM product WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute(); 
    }




}// FIN_CLASE
