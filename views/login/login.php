<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/default.css">
  <style></style>
  <title>Login</title>
  <style> 
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      padding: 8px;
      background-color: #dddddd;
    }
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
</head>
<body>
  <?php
      // Carga la cabecera de nuestra pagina donde aparecerá Inicio, Login y Logout
    require_once('vistas/header.php');
  ?>
  
  <!-- Formulario para obtener los datos de usuario y contraseña por metodo post -->
  <!-- Mandará a la función autenticar de app.php -->
  
  <!-- COMPROBAR EL ACTION -->
  <form action="login/auth" method="post"> 
    <fieldset>
        <legend>Login</legend>
        <label for="user">Usuario</label>
        <input type="text" name="user" id="user"> 
        <br>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass"> 
        <br>
        <input type="submit" value="Enviar" name="envio">
    </fieldset>
    
  </form>
</body>
</html>
