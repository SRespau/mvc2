<?php
namespace App\Models;

use PDO;
use DateTime;
use Core\Model;

class Jugador extends Model{

    public function __construct(){
        $this->nacimiento = \DateTime::createFromFormat('Y-m-d H:i:s', $this->nacimiento);
    }


    
    public static function find($id){
        $db = Jugador::db();
        $stmt = $db->prepare('SELECT * FROM jugadores WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, Jugador::class);
        $jugadores = $stmt->fetch(PDO::FETCH_CLASS);
        return $jugadores;
    }   
    
    
    public static function all(){
        $db = Jugador::db();
        $statement = $db->query('SELECT * FROM jugadores');
        return $statement->fetchAll(PDO::FETCH_CLASS, Jugador::class);
    }



    public function insert(){
        $db = Jugador::db();
        $stmt = $db->prepare('INSERT INTO jugadores(nombre, nacimiento, puesto) VALUES(:nombre, :nacimiento, :puesto)');        
        $stmt->bindValue(':nombre', $this->nombre);
        $stmt->bindValue(':nacimiento', $this->nacimiento); /* Mirar porque si no pongo la fecha completa no va */
        $stmt->bindValue(':puesto', $this->puesto);
        
        return $stmt->execute();
    }



    public function save(){
        $db = Jugador::db();
        $stmt = $db->prepare('UPDATE jugadores SET id = :id, nombre = :name, nacimiento = :nacimiento, puesto = :puesto WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->nombre);
        $stmt->bindValue(':nacimiento', $this->nacimiento);
        $stmt->bindValue(':puesto', $this->puesto);
        
        return $stmt->execute();
    }
}