<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>
    <h1>Modificar datos contacto empresa</h1>

     <!-- Formulario cuyo objetivo es la misma página. Enviará en GET los datos introducidos-->
    <form action="#" method="get">
        <label for="rSocialModificar">Razón social empresa a modificar:</label>
        <input type="text" id="rSocialModificar" name="rSocialModificar" style="margin: 5px" required><br><br>
        <input type="submit" value="Comprobar contacto" name="envio" style="margin: 5px">
    </form> 
    
    
    <?php
        /**
         * Comprobará si se ha puslsado el botón envio en GET del html
         * - Llamará a la función estatica de CompanyController showOne y le mandará el dato introducido por el usuario
         * - Mostrará los resultados en la misma página HTML
         */
        if(isset($_GET["envio"])){
            CompanyController::showOne($_GET["rSocialModificar"]);           
        }   
    ?>
    <!--Con los datos del contacto visibles en la página podrá saber que datos desea modificar el usuario -->
    <!--El formulario contará con un input hidden al que se le pasará como valor el dato introducido en el formulario anterior -->
    <!--Una vez los campos rellenos y puslado enviar, mandara la información al método "modificar" de CompanyController -->
    <form action="modificar" method="post">
        
        <input type="text" id="rSocialModificar" value="<?= $_GET["rSocialModificar"]?>" name="rSocialModificar" style="margin: 5px" hidden><br><br>
        
        <fieldset style="background-color: #eeeeee;">
            <legend style="background-color: gray; color: white; padding: 5px 10px;">Datos a modificar</legend>
            <label for="rSocial">Razón Social nueva:</label>
            <input type="text" id="rSocial" name="rSocial" style="margin: 5px" ><br><br>            
            <label for="direccion">Dirección nuevo:</label>
            <input type="text" id="direccion" name="direccion" style="margin: 5px" ><br><br>
            <label for="telefono">Teléfono nuevo:</label>
            <input type="number" id="telefono" name="telefono" style="margin: 5px" ><br><br>
            <label for="email">Email nuevo:</label>
            <input type="email" id="email" name="email" style="margin: 5px" ><br><br>
            <input type="submit" value="Enviar" name="envio" style="margin: 5px">
        </fieldset>
    </form>
    
    <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>