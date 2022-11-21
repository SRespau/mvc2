<?php

class Login{

    protected $nombreusu = null; //Muy recomendable que se llamen igual que la columna con la que queremos trabajar. Asi al hacer fetch los meterá en estas variables
    protected $password = null;


    /**
     * Recuperar filas
     *  1- Preparar la consulta -> prepare
     *  2- Establecer el modo de recuperación: FETCH_ASSOC, FETCH_CLASS
     *  3- Ejecutar la consulta -> execute
     *  4- Recuperar los registros: fetch (un registro) / fetchAll (devuelve todos los registros)
     */
    public static function all(){
        $dsn = "mysql:dbname=demo;host=db";
        $usuario = "dbuser";
        $password = "secret";

        try{
            $db = new PDO($dsn, $usuario, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM credenciales";
            $sentencia = $db->prepare($sql);//1- peparar la consulta

            //2- Establecemos la forma de recuperar registros. 1º le ponemos el modo. En este caso clase. 2- Le ponemos el nombre de la clase donde queremos recuperarlos y convertirlos ("Login" o Login::Class)
            $sentencia->setFetchMode(PDO::FETCH_CLASS, "Login"); //Esto se puede poner dentro del fetch o fetchAll y no haría falta hacer la sentencia
            $sentencia->execute(); //3- Ejecuto la sentencia

            //4- Recupero los registros
            /*
            while($obj = $sentencia->fetch()){// fetch -> Devuelve 1 registro
                //print_r($obj);
                echo "<br>NOMBRE: " . $obj->nombreusu; //obj es un objeto y se accede a él como tal
                echo "<br>Password: " . $obj->password; //Devuelve un string
                echo "<br>";
            } 
            */
            //FETCH_CLASS -> Devuelve un array de objetos...... FETCH_ASSOC -> Devuelve un array de arrays
            $credenciales = $sentencia->fetchAll(PDO::FETCH_CLASS, "Login"); //hay que indicarle modo y en que clase lo vuelco. 
            foreach($credenciales as $credencial){
                echo "<br>NOMBRE: " . $credencial->nombreusu; // Cogemos nombreusu del array
                echo "<br>Password: " . $credencial->password; //
                echo "<br>";
            }
        }catch (PDOException $e){
            echo "<br>Error conexion: " . $e->getMessage();
        }


    }//fin all   

}// fin_clase

echo "<h2>Recuperando registros</h2>";
Login::all();