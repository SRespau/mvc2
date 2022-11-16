<?php
    namespace Dwes\Galaxias; // Siempre la primera en mayuscula

    const RADIO = 1.25; //Millones de años luz

    function observar ($mensaje){
        echo "<br>Estoy mirando a la galaxia " . $mensaje;
    }

    class Galaxia {
        function __construct(){
            $this->nacimiento();
        }

        function __toString(){
            return "Esto son galaxias superiores";
        }

        function nacimiento(){
            echo "<br>Nueva galaxia";
        }

        static function muerte (){
            echo "<br>Galaxia Destruida";
        }
    }