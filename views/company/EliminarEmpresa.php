<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>
    <h1>Eliminar un contacto de empresa de la agenda</h1>

    <form action="#" method="get">
        <fieldset style="background-color: #eeeeee;">
            <legend style="background-color: gray; color: white; padding: 5px 10px;">Empresa a eliminar</legend>
            <label for="rSocial">Razón Social:</label>
            <input type="text" id="rSocial" name="rSocial" style="margin: 5px" required><br><br>            
            <input type="submit" value="Enviar" name="envio" style="margin: 5px">
        </fieldset>
    </form>
    <?php
        if(isset($_GET["envio"])){
            CompanyController::showOne($_GET["rSocial"]);
            echo "<br><br><a href='/company/eliminar?rSocial=" . $_GET["rSocial"] . "'>Confimar eliminación de la agenda</a>";           
        }   
    ?>
    <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>