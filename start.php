<?php
    //1-> Definir -> namespace...

    //2-> requerir fichero -> require "loquesea.php"  (importar la clase, los metodos)

    //3-> Use <clase> (utilizar:instancias)

    use \Core\App; // Cogerá el namespace de App. Con esto nos evitamos poner abajo $app = new \Core\App();

    //echo "<h2> Contenido PRIVADO</h2>";

    //Ir pensando en recurso/metodo/parametro
    //  - Recurso: controlador
    //  - Acción: metodos del controlador   $controlador->metodo();
    //  - Parametros: parametros del metodo

    //require_once "../core/App.php"; //Importamos el fichero

    //autoload de composer. Se encuentra en vendor. Ahora cogerá todos los require de los namespace
    require 'vendor/autoload.php';
    
    $app = new App(); //Ruta absoluta. Ruta relativa sería Core\App porque estamos en start.php

    

