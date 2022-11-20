<?php

/**
 * Clase HomeController: 
 * Controla las vistas principales de home y de la agenda.
 */
class HomeController{

    function __construct(){
        //Constructor vacio
    }

    /**
     * Función index: Controla el indice de la página
     * - Abrirá el código de la vista "indice.php" 
     */
    function index(){
        require "../views/indice.php";
    }

    /**
     * Función agenda: Controla el index o menú principal de la vista agenda.
     * - Mediante una condicional comprobará si se ha hecho login correctamente comprobando la sesión creada
     *      - Si se ha hecho login correctamente redirigirá al index o menú principal de la agenda.
     *      - Si no se ha hecho login todavía mandará a la vista de login para que ponga sus credenciales.
     */
    function agenda(){
        session_start();
        if(isset($_SESSION["credenciales"])){
            require "../views/agenda.php";
        }else{
            header("Location: ../login");
        }        
    }

}//Fin clase home