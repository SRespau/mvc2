<?php

/**
 * Clase LoginController: 
 * Controla las vistas principales de login y sus operaciones.
 */
class LoginController {

    function __construct(){

    }//Fin constructor

    /**
     * Función index: Controla el index o menú principal de la vista login.
     * - Mediante una condicional comprobará si se ha hecho login correctamente comprobando la sesión creada
     *      - Si se ha hecho login correctamente redirigirá al panel de control del usuario.
     *      - Si no se ha hecho login todavía mandará a la vista de login para que ponga sus credenciales.
     */
    function index(){
        session_start();
        if(isset($_SESSION["credenciales"])){
            require "../views/login/logeado.php";            
        }else{
            require "../views/login/login.php";
        }        
    }
    
    /**
     * Función auth: Autenticará si las credenciales introducidas son correctas o no para hacer login
     * - Insertará el fichero php de conexión a la base de datos y conectará a la base de datos "agenda".
     * - Obtendrá mediante POST del formulario ubicado en "login.php" las credenciales insertadas.
     * - Buscaremos los datos del usuario insertado en la tabla "credenciales" mediante sentencia SQL SELECT * FROM
     *      - Comprobaremos si el usuario es igual al que hay en la tabla "credenciales".
     *      - Comprobaremos si la contraseña es igual a la que hay en la tabla "credenciales" comparando el valor insertado con la contraseña codificada. Se utilizará password_verify para ello.
     * - Si ambos valores coinciden se creará una sesión con los datos y se redirigirá a home.
     * - Si los valores no coinciden aparecerá en pantalla un aviso de error. 
     */
    function auth(){              
        require "../core/Connection.php";
        $db = Connection::db();

        $user = $_POST["user"];
        $pass = $_POST["pass"];            
                
        $busqueda = "SELECT * FROM credenciales WHERE usuario ='" . $user . "'";

        foreach ($db->query($busqueda) as $dato) {
            $userCheck = $dato[0];
            $passCheck = $dato[1];                        
        }

        if($userCheck == $user && password_verify($pass, $passCheck)){
            session_start();
            $datos = [$user, $passCheck];
            $_SESSION["credenciales"] = $datos;

            header ("refresh:2; /home");
            echo "Login con exíto. Redirigiendo...";
        }else{
            echo "Usuario o contraseña erroneos. Vuelva a intentarlo.";
            echo "<br><a href='/login'>Volver a login </a>";            
        }  

    }

    /**
     * Función logout: saldrá del usuario logeado actual.
     * - Si la sesión está creada por un login exitoso se borrarán los datos de la sesión y se eliminará por completo.
     * - Si no hay ninguna sesión creada se redirigirá a home
     */
    function logout(){
        session_start();
        if(isset($_SESSION["credenciales"])){
            $_SESSION = array();
            session_destroy();
            setcookie(session_name(),"", time() -120, '/');
            header("Location: /home");
        }else{
            header("Location: /login");
        } 
        
    }
}//Fin LoginController