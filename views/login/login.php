<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/default.css">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
  <title>Login</title>
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
</head>
<body>
  <?php require __DIR__ . "/../../app/views/header.php" ?>
  
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

  <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>
