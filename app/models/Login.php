<?php

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