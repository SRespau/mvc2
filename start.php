<?php
    //echo "<h2> Contenido PRIVADO</h2>";

    //Ir pensando en recurso/metodo/parametro
    //  - Recurso: controlador
    //  - Acción: metodos del controlador   $controlador->metodo();
    //  - Parametros: parametros del metodo

    require_once("../Controller.php");

    //Recurso
    $app = new Controller();

    //Defino variable de petición en la url

    //1- Recoger el metodo que pasan como parametro y si no pasan parametro cargará el método home por defecto
    if(isset($_GET["method"])){
        $method = $_GET["method"]; //metodo show, find, create, update -> ?method=show
    }else{
        $method = "home";
    }
    //Comprobamos si el metodo existe en $app (pagina del controlador). Se puede poner el nombre del objeto o el nombre de la clase
    if(method_exists($app, $method)){
        $app->$method();
    }else{
        //Si devuelve el codigo 404 que detenga la aplicación y devuelva un mensaje
        http_response_code(404);
        die("Metodo no encontrado"); //die = exit
    }


