<?php

/**
 * Clase People: 
 * Se iba a encargar de hacer lo que realizan los controladores. Pero a medio camino cambiar todo de lugar me daban mmás problemas que soluciones
 * - Deberían estar las funciones que se muestran en el controller de su nombre
 */
class People{

    function __construct($nombre, $apellidos, $direccion, $telefono){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    
}