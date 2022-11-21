<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>
<body>
  <?php require __DIR__ . "/../../app/views/header.php" ?>
  
  <!--Vista panel de control del usuario. Aparecerá esta vista en el botón login cuando un usuario se haya logeado con éxito --> 
  
    <h1>Panel de control de usuarios de </h1>
    <fieldset style="background-color: #eeeeee;">
        <legend style="background-color: gray; color: white; padding: 5px 10px;">Login</legend>
        <p>Nombre usuario: <b><?= $_SESSION["credenciales"][0] ?></b></p>
        <br>
        
        
        <!--Dispone de un input para subir una foto al usuario. Una vez subida la guardará y la mostrará en el panel de control del usuario -->
        
        <img src="/update/fotoPerfil<?= $_SESSION['credenciales'][0]?>.jpeg" width="200" height="267" alt="me">
        <!--Una vez añadido un fichero lo mandará a DatosController al método subidafichero-->       
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
