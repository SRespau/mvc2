<?php

/**
 * Clase Login: 
 * Se iba a encargar de hacer lo que realizan los controladores. Pero a medio camino cambiar todo de lugar me daban mmás problemas que soluciones
 * - Deberían estar las funciones que se muestran en el controller de su nombre
 */
class Login{

    function __construct($user, $pass){
        $this->user = $user;
        $this->pass = $pass;
    }//Fin constructor

    function getUser(){
        return $this->user;
    }

    function getPass(){
        return $this->pass;
    }

}//Fin clase Login