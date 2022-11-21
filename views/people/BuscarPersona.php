<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>
    <h1>Buscar persona en agenda</h1>

    <!-- Formulario cuyo objetivo es la misma página. Enviará en GET los datos introducidos-->
    <form action="#" method="get">       
        
        <fieldset style="background-color: #eeeeee;">
            <legend style="background-color: gray; color: white; padding: 5px 10px;">Persona a buscar</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" style="margin: 5px" required><br><br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" style="margin: 5px"><br><br>            
            <input type="submit" value="Enviar" name="envio" style="margin: 5px">
        </fieldset>

    </form>
    
    <?php
        /**
         * Comprobará si se ha puslsado el botón envio en GET del html
         * - Llamará a la función estatica de PeopleController showOne y le mandará el dato introducido por el usuario
         * - Mostrará los resultados en la misma página HTML
         */

        if(isset($_GET["envio"])){
            PeopleController::showOne($_GET["nombre"], $_GET["apellidos"]);                                    
        }   
    ?>

    <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>