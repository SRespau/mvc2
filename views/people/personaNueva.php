<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo contacto</title>
</head>
<style>
    fieldset {
        background-color: #eeeeee;
    }

    legend {
        background-color: gray;
        color: white;
        padding: 5px 10px;
    }

    input {
        margin: 5px;
    }
</style>
<body>
    <h1>Añadir una persona nueva a la agenda</h1>

    <form action="/action_page.php">
        <fieldset>
            <legend>Datos personales</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required><br><br>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion"><br><br>
            <label for="birthday">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" required><br><br>
            <input type="submit" value="Enviar" name="envio">
        </fieldset>
    </form>
</body>
</html>