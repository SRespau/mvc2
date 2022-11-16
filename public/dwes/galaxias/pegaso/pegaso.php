<?php
    namespace Dwes\Galaxias\Pegaso; // Siempre la primera en mayuscula. Hemos generado para esta carpeta una serie de nombre. No dará error con galaxia1 aunque se llame igual

    const RADIO = 0.75; //Millones de años luz

    function observar ($mensaje){
        echo "<br>Estoy DIRIGIENDOME a la galaxia " . $mensaje;
    }

    class Galaxia {
        function __construct(){
            $this->nacimiento();
        }

        function __toString(){
            return "Esto son galaxias superiores de Pegaso";
        }

        function nacimiento(){
            echo "<br>Soy una GALAXIA NUEVA";
        }

        static function muerte (){
            echo "<br>Me muero!";
        }
    }