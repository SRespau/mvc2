<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>
    <h1>Eliminar un contacto de empresa de la agenda</h1>

     <!-- Formulario cuyo objetivo es la misma página. Enviará en GET los datos introducidos-->
    <form action="#" method="get">
        <fieldset style="background-color: #eeeeee;">
            <legend style="background-color: gray; color: white; padding: 5px 10px;">Empresa a eliminar</legend>
            <label for="rSocial">Razón Social:</label>
            <input type="text" id="rSocial" name="rSocial" style="margin: 5px" required><br><br>            
            <input type="submit" value="Enviar" name="envio" style="margin: 5px">
        </fieldset>
    </form>
    
    <?php
        /**
         * Comprobará si se ha puslsado el botón envio en GET del html
         * - Llamará a la función estatica de CompanyController showOne y le mandará el dato introducido por el usuario
         * - Mostrará los resultados en la misma página HTML
         * - Si al usuario le parece correcto el contacto mostrado a eliminar pulsará el link provisto de confirmación.
         * - Una vez pulsada la confirmación mandará los datos mediante un link para que mande el contacto introducido a la función eliminar de CompanyController
         */
        if(isset($_GET["envio"])){
            CompanyController::showOne($_GET["rSocial"]);
            echo "<br><br><a href='/company/eliminar?rSocial=" . $_GET["rSocial"] . "'>Confimar eliminación de la agenda</a>";           
        }   
    ?>
    <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>