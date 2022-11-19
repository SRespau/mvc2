<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>
    <h1>Buscar persona en agenda</h1>

    <form action="show" method="post">       
        
        <fieldset style="background-color: #eeeeee;">
            <legend style="background-color: gray; color: white; padding: 5px 10px;">Persona a buscar</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" style="margin: 5px" required><br><br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" style="margin: 5px"><br><br>            
            <input type="submit" value="Enviar" name="envio" style="margin: 5px">
        </fieldset>

    </form>
    <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>