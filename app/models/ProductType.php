<?php

namespace App\Models;  

use PDO;
use Core\Model;
use DateTime;


require_once '../core/Model.php';

    //Extendemos clase Model de conection
class ProductType extends Model{
        

    function __construct(){
        $this->fecha_compra = DateTime::createFromFormat('Y-m-d', $this->fecha_compra);
    } 
    
    public static function all(){
        $db = ProductType::db();
        $statement = $db->query('SELECT * FROM products_types');
        $products = $statement->fetchAll(PDO::FETCH_CLASS, ProductType::class);

        return $products;
    }

    public static function find($id){
        $db = ProductType::db();
        $stmt = $db->prepare('SELECT * FROM products_types WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, ProductType::class);
        $products = $stmt->fetch(PDO::FETCH_CLASS);
        return $products;
    }

    public function insert(){
        $db = ProductType::db();
        $stmt = $db->prepare('INSERT INTO products_types(id, name) VALUES(:id, :name)');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->name);
               
        return $stmt->execute();
    }
    

    public function save(){
        $db = ProductType::db();
        $stmt = $db->prepare('UPDATE products_types SET id = :id, name = :name WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->name);        
        
        return $stmt->execute();
    }

    public function delete(){
        $db = ProductType::db();
        $stmt = $db->prepare('DELETE FROM product_type WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute(); 
    }

    //Creamos un metodo Type para que nos devuelva el type_id del producto segun su id
    public function products(){
    //un producto pertenece a un tipo:
    $db = ProductType::db();
    $statement = $db->prepare('SELECT name FROM products WHERE type_id = :type_id');
    $statement->bindValue(':type_id', $this->id);
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);

    return $products;
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
