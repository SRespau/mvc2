<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>
    <h1>Añadir una persona nueva a la agenda</h1>

    <!--Formulario para añadir los datos necesarios para crear el nuevo contacto. Mandará los datos a la función insertar de PeopleController -->
    <form action="insertar" method="post">
        <fieldset style="background-color: #eeeeee;">
            <legend style="background-color: gray; color: white; padding: 5px 10px;">Datos empresa nueva</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" style="margin: 5px" required><br><br> 
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" style="margin: 5px" required><br><br>           
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" style="margin: 5px" ><br><br>
            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" style="margin: 5px" required><br><br>            
            <input type="submit" value="Enviar" name="envio" style="margin: 5px">
        </fieldset>
    </form>
    <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>