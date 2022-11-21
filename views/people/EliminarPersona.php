<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>
    <h1>Eliminar un contacto de persona de la agenda</h1>

    <!-- Formulario cuyo objetivo es la misma página. Enviará en GET los datos introducidos-->
    <form action="#" method="get">
        <fieldset style="background-color: #eeeeee;">
            <legend style="background-color: gray; color: white; padding: 5px 10px;">Persona a eliminar</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" style="margin: 5px" required><br><br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" style="margin: 5px" required><br><br>             
            <input type="submit" value="Enviar" name="envio" style="margin: 5px">
        </fieldset>
    </form>

    <?php
         /**
         * Comprobará si se ha puslsado el botón envio en GET del html
         * - Llamará a la función estatica de PeopleController showOne y le mandará el dato introducido por el usuario
         * - Mostrará los resultados en la misma página HTML
         * - Si al usuario le parece correcto el contacto mostrado a eliminar pulsará el link provisto de confirmación.
         * - Una vez pulsada la confirmación mandará los datos mediante un link para que mande el contacto introducido a la función eliminar de CompanyController
         */

        if(isset($_GET["envio"])){
            PeopleController::showOne($_GET["nombre"], $_GET["apellidos"]);
            echo "<br><a href='/people/eliminar?nombre=" . $_GET["nombre"] . "&apellidos=" . $_GET["apellidos"]. "'>Confimar eliminación de la agenda</a>";            
        }   
    ?>
    <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>