<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . "/../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../app/views/header.php" ?>
    <h1>¿Bienvenido de nuevo, <!--sacar noombre cookie-->!</h1>
    <ul>
        <li>Añadir contacto
            <ul>
                <li><a href="">Persona</a></li>
                <li><a href="/company/index">Empresa</a></li>
            </ul>
        </li>    
        <li><a href="">Eliminar contacto</a></li>
        <li><a href="">Buscar contacto</a></li>
        <li><a href=""></a>Modificar contacto</li>
        <li><a href=""></a>Logout</li>
    </ul>
    <?php require __DIR__ . "/../app/views/footer.php" ?>
</body>
</html>