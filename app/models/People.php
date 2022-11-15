<?php

class People{

    function __construct($nombre, $apellidos, $direccion, $telefono){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getApellidos(){
        return $this->apellidos;
    }

    function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    function getDireccion(){
        return $this->direccion;
    }

    function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    function getTelefono(){
        return $this->telefono;
    }

    function setTelefono($telefono){
        $this->telefono = $telefono;
    }
}