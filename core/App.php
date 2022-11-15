<?php

class App{

    
    function __construct(){
        /*
            - Si la url no especifica ningun controlador (recurso) => asigno uno por defecto: home
            - Si la url no especifica ningun metodo => asigno por defecto: index
        */
        if(isset($_GET["url"]) && !empty($_GET["url"])){
            $url = $_GET["url"];
        }else{
            $url = "home";
        }
    //Obtenemos la url y la dividimos en argumentos que añadiremos a una variable array
    //  - Separamos los argumentos por el signo "/"
    //  - Creamos el nombre de controlador con el primer elemento de la array obtenida
    $arguments = explode('/', trim($url, '/')); 
    $controllerName = array_shift($arguments);    
    $controllerName = ucwords($controllerName) . "Controller"; 
    
    //Verificamos si en la array hay mas elementos que haya añadido el usuario en la URL
    //  - Si tiene mas elementos copiará el valor dado en una variable metodo para lanzarlo mas adelante
    //  - Si no tiene más elementos lanzará el index del controlador seleccionado
    if(count($arguments) > 0){
        $method = array_shift($arguments);
    }else{
        $method = "index";
    }

    // Cargamos el controlador que ha indicado el usuario
    // Verificamos que el fichero del controlador existe
    //  - Si existe que lo cargue. Si no existe que salga un error de fichero no encontrado(404) y termine la aplicación.
    $file = "../app/controllers/$controllerName" . ".php";
    
    if(file_exists($file)){
        require_once $file;
    }else{
        http_response_code(404);
        die("Controlador no encontrado.");
    }

    //Si el controlador existe cargamos un objeto de el.
    //Buscamos si el metodo seleccionado existe.
    //  - Si existe que lo lance. Si no existe que salga un error de "no encontrado" y termine la aplicación
    $controllerObject = new $controllerName;
    
    if(method_exists($controllerObject, $method)){
        $controllerObject->$method($arguments);

    }else{
        http_response_code(404);
        die("No encontrado.");
    }
    }//fin_construct

}//Fin_clase App