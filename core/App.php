<?php
/*
    - Si la url no especifica ningun controlador (recurso) => asigno uno por defecto: home
    - Si la url no especifica ningun metodo => asigno por defecto: index
*/
class App{

    function __construct(){
        // Objetivo: convertir http://mvc.local/product/show => http://mvc.local/index.php?url=product/show
        if(isset($_GET["url"]) && !empty($_GET["url"])){
            $url = $_GET["url"];
        }else{
            $url = "home";
        }
    // le va a llegar /product/show/5 -> product: recurso;   show: accion/metodo;    5: parametro
    //explode -> Separa una cadena en subcadenas mediante un caracter separador
    //Trim -> elimina el caracter del inicio y final de la cadena. Queremos eliminar las "/" del comienzo y del final
    $arguments = explode('/', trim($url, '/')); //explode -> Devuelve array de strings
    $controllerName = array_shift($arguments); //array_shift -> Extrae el primer valor del array y lo elimina de este
    //Transformamos  product -> ProductController
    $controllerName = ucwords($controllerName) . "Controller"; // ucwords -> convierte la primera letra en mayuscula   
    
    //Verificar que ese array tiene más elementos. Quizá solo nos han puesto el recurso y nada más
    if(count($arguments) > 0){
        $method = array_shift($arguments); //Obtenemos el metodo si hubiera más recursos en la array

    }else{
        $method = "index";
    }
    //var_dump($arguments);

    
    // Voy a cargar el controlador -> ProductController.php (o nombre de controlador que tengamos y nos manden)
    $file = "../app/controllers/$controllerName" . ".php";
    //Verificamos si el fichero existe en la ruta enviada para llamar al controlador.
    if(file_exists($file)){
        require_once $file;// Si existe que lo cargue
        
    }else{
        http_response_code(404);
        die("Controlador no encontrado.");
    }

    //Una vez que veamos si existe el controlador comprobamos si existe el metodo dentro de este
    $controllerObject = new $controllerName; //$controllerName sera el nombre pasado con la letra mayuscula + Controller. Si el constructor es vacio no hace falta ()
    if(method_exists($controllerObject, $method)){
        $controllerObject->$method($arguments); //Si arguments esta vacio lo llamara vacio, si contiene algo lo llamara con argumentos
        
    }else{
        http_response_code(404);
        die("No encontrado.");
    }
    }//fin_construct

}//Fin_clase App