<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>
<body>
  <?php require __DIR__ . "/../../app/views/header.php" ?>
  
  <!-- Formulario para obtener los datos de usuario y contraseña por metodo post -->
  <!-- Mandará a la función autenticar de app.php -->  
  
  <form action="login/auth" method="post"> 
    <fieldset style="background-color: #eeeeee;">
        <legend style="background-color: gray; color: white; padding: 5px 10px;">Login</legend>
        <label for="user">Usuario</label>
        <input type="text" name="user" id="user" style="margin: 5px;" required> 
        <br>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass" style="margin: 5px;" required> 
        <br>
        <input type="submit" value="Enviar" name="envio" style="margin: 5px;">
    </fieldset>
    
  </form>

  <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>
