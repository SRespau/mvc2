<?php
namespace App\Controllers;

use App\Models\Jugador;
/**
*
*/
class JugadorController{

    function __construct(){
        // echo "En JugadorController";
    }

    public function index(){
        $jugadores = Jugador::all();
        require "../app/views/jugador/index.php";        
    }

    public function create(){
        require "../app/views/jugador/create.php";
    }

    public function edit($arguments){
        $id = (int) $arguments[0];
        $jugador = Jugador::find($id);
        require "../app/views/jugador/create.php";
    }

    public function update(){
        $id = $_REQUEST['id'];        
        $jugador = Jugador::find($id);

        $jugador->nombre = $_REQUEST['nombre'];
        $jugador->nacimiento = $_REQUEST['nacimiento'];
        $jugador->puesto = $_REQUEST['posicion'];        
        $jugador->save();
        header('Location:/jugador');
    }

    public function store(){            
        $jugador = new Jugador();        
        $jugador->nombre = $_REQUEST['nombre'];
        $jugador->nacimiento = $_REQUEST['fNacimiento'];
        $jugador->puesto = $_REQUEST['posicion'];
        $jugador->insert();       
           
        $target_dir = "../fotos/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]); 
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                     
        if(isset($_POST["envio"])) {          

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" ) {                        
            $uploadOk = 0;
            } 
        } 
        $uploadOk = 1;           
        
        if ($uploadOk == 1) {                     
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);             
        }
        header('Location: /jugador');
    }


    public function titular($arg){
        session_start();
        $id = (int) $arg[0];
        $jugador = Jugador::find($id);
        $jugadores = [$jugador->id, $jugador->nombre, $jugador->puesto, $jugador->nacimiento];
        $_SESSION["titulares"][] = $jugadores;
        header('Location: /jugador');
    }
    public function titulares(){
        session_start();
        $jugadores = $_SESSION["titulares"];
        require "../app/views/jugador/titulares.php";        
    }


    public function quitar($arg){
        session_start();
        $id = (int) $arg[0];
        $jugadores = $_SESSION["titulares"];
        $contador = 0;
        foreach ($jugadores as $jugador) {
            if($jugador[0] == $id){
                unset($_SESSION["titulares"][$contador]);
            }
            $contador++;
        }        

        header('Location: /jugador/titulares');
    }
}
