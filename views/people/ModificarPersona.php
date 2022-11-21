<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>
    <h1>Modificar datos contacto persona</h1>

    <form action="#" method="get">
    <h4>Datos de la persona a modificar:</h4>
        <label for="nombreModificar">Nombre:</label>
        <input type="text" id="nombreModificar" name="nombreModificar" style="margin: 5px" required><br><br>
        <label for="apellidosModificar">Apellidos:</label>
        <input type="text" id="apellidosModificar" name="apellidosModificar" style="margin: 5px" required><br><br>
        <input type="submit" value="Comprobar contacto" name="envio" style="margin: 5px">
    </form>
   
    <?php
        /**
         * Comprobará si se ha puslsado el botón envio en GET del html
         * - Llamará a la función estatica de PeopleController showOne y le mandará el dato introducido por el usuario
         * - Mostrará los resultados en la misma página HTML
         */

        if(isset($_GET["envio"])){
            PeopleController::showOne($_GET["nombreModificar"], $_GET["apellidosModificar"]);
        }   
    ?>

    <!--Con los datos del contacto visibles en la página podrá saber que datos desea modificar el usuario -->
    <!--El formulario contará con un input hidden al que se le pasará como valor el dato introducido en el formulario anterior -->
    <!--Una vez los campos rellenos y puslado enviar, mandara la información al método "modificar" de CompanyController -->
    <form action="modificar" method="post">

    <form action="modificar" method="post">        
        <input type="text" id="nombreModificar" value="<?= $_GET["nombreModificar"]?>" name="nombreModificar" style="margin: 5px" hidden>
        <input type="text" id="apellidosModificar" value="<?= $_GET["apellidosModificar"]?>" name="apellidosModificar" style="margin: 5px" hidden>

        <fieldset style="background-color: #eeeeee;">
            <legend style="background-color: gray; color: white; padding: 5px 10px;">Datos a modificar</legend>
            <label for="nombre">Nombre nuevo:</label>
            <input type="text" id="nombre" name="nombre" style="margin: 5px" ><br><br> 
            <label for="apellidos">Apellidos nuevos:</label>
            <input type="apellidos" id="apellidos" name="apellidos" style="margin: 5px" ><br><br>           
            <label for="direccion">Dirección nuevo:</label>
            <input type="text" id="direccion" name="direccion" style="margin: 5px" ><br><br>
            <label for="telefono">Teléfono nuevo:</label>
            <input type="number" id="telefono" name="telefono" style="margin: 5px" ><br><br>            
            <input type="submit" value="Enviar" name="envio" style="margin: 5px">
        </fieldset>
    </form>
    <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>