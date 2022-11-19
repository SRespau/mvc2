<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<?php require __DIR__ . "/../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../app/views/header.php" ?>
    <h1>¡Bienvenido de nuevo, <?= $_SESSION["credenciales"][0] ?> !</h1>
    <h4>Elija opción a gestionar</h4>
    <button><a href="/people/index">Persona</a></button>
    <button><a href="/company/index">Empresa</a></button>
    <button><a href="/datos/importar">Importar datos</a></button>
    
    <?php require __DIR__ . "/../app/views/footer.php" ?>
</body>
</html>