<?php
namespace App\Models;

use PDO;
use Core\Model;

require_once '../core/Model.php';

class User extends Model
{

    function __construct()
    {

    }

    public static function all()
    {
        $db = User::db();
        $statement = $db->query('SELECT * FROM users');
        $users = $statement->fetchAll(PDO::FETCH_CLASS, User::class);

        return $users;
    }

    public static function find($id)
    {
        $db = User::db();
        $stmt = $db->prepare('SELECT * FROM users WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $stmt->fetch(PDO::FETCH_CLASS);
        return $user;
    }

    public function insert()
    {
        $db = User::db();
        $stmt = $db->prepare('INSERT INTO users(name, surname, birthdate, email) VALUES(:name, :surname, :birthdate, :email)');
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':surname', $this->surname);
        $stmt->bindValue(':birthdate', $this->birthdate);
        $stmt->bindValue(':email', $this->email);
        return $stmt->execute();
    }

    public function delete()
    {
        $db = User::db();
        $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute();
    }


    public function setPassword($password){
        $password = password_hash($password, PASSWORD_BCRYPT);
        $db = User::db();
        $stmt = $db->prepare('UPDATE users SET password = :password WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':password', $password);
        $stmt->execute();

        return $password;
    } 
    
    public function passwordVerify($email, $password){
        $db = User::db();
        $stmt = $db->prepare('SELECT * FROM users WHERE email=:email');
        
        $stmt->execute(array(':email' => $email));
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $pass = $stmt->fetch(PDO::FETCH_CLASS);

        return password_verify($password, $pass->password);
    }
}