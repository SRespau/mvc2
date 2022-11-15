<?php

class Company{    
    
    function __construct($razonSocial, $direccion, $telefono, $email){
        $this->razonSocial = $razonSocial;        
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
    }    
       
       
    function getRazonSocial(){
        return $this->razonSocial;
    }

    function setRazonSocial($razonSocial){
        $this->razonSocial = $razonSocial;
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

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email = $email;
    }
}