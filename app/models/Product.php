<?php

namespace App\Models;  

use PDO;
use Core\Model;
use DateTime;
use App\Models\ProductType;


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

   
    //Creamos un metodo Type para que nos devuelva el type_id del producto segun su id
    public function type(){
    //un producto pertenece a un tipo:
    $db = Product::db();
    $statement = $db->prepare('SELECT * FROM product_types WHERE id = :id');
    $statement->bindValue(':id', $this->type_id);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_CLASS, ProductType::class);
    $product_type = $statement->fetch(PDO::FETCH_CLASS);

    return $product_type;
    }

    //Con la función magica __get lo que haremos será meter el metodo "type" a un atributo. Para ello utilizamos __get y lo que hacemos en realidad
    //es preguntar que si el atributo type no existe, que coja el metodo type() y lo transforme en el atributo type. Con lo que cuando pongamos type
    //estaremos llamando realmente al método type().
    public function __get($atributoDesconocido){
    // return "atributo $atributoDesconocido desconocido";
    if (method_exists($this, $atributoDesconocido)) {
        $this->$atributoDesconocido = $this->$atributoDesconocido();
        return $this->$atributoDesconocido;
        // echo "<hr> atributo $x <hr>";
    }
}



}// FIN_CLASE
