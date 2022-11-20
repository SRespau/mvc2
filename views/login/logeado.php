<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>
<body>
  <?php require __DIR__ . "/../../app/views/header.php" ?>
  
  <!-- Formulario para obtener los datos de usuario y contraseña por metodo post -->
  <!-- Mandará a la función autenticar de app.php -->
  
    <h1>Panel de control de usuarios de </h1>
    <fieldset style="background-color: #eeeeee;">
        <legend style="background-color: gray; color: white; padding: 5px 10px;">Login</legend>
        <p>Nombre usuario: <b><?= $_SESSION["credenciales"][0] ?></b></p>
        <br>
        
        <!--Preguntar por que no lo abre al entrar en carpeta y fuera si. Si esta a nivel de start y de index la coge-->
        <img src="../files/userPicture/fotoPerfilnormaluser.jpeg" width="200" height="267" alt="mo">
        <img src="fotoPerfilnormaluser.jpeg" width="200" height="267" alt="me">
               
        <form action="datos/subidafichero" method="post" enctype="multipart/form-data">        
            <label for="mifich">Selecciona foto perfil: </label>            
            <input type="file" name="myfile" id="mifich" style="margin: 5px;">        
            <input type="submit" value="Enviar" name="envio" style="margin: 5px;">
            <p>Limite subida 5mb y archivos jpg, jpeg, png y pdf</p>
        </form>        
    </fieldset>

<?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>
