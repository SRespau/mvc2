<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>
    <h1>Se encuentra en la gestión de contactos de personas.</h1>
    <ul>
        <li>Gestionar:
            <ul>
                <li><a href="/people/personaNueva">Nuevo Contacto</a></li>
                <li><a href="/people/eliminarPersona">Eliminar contacto</a></li>
                <li><a href="/people/modificarPersona">Modificar contacto</a></li>
                <li><a href="/people/buscarPersona">Buscar contacto</a></li>
                <li><a href="/people/showAll">Mostrar todos los contacto</a></li>
            </ul>
        </li>        
    </ul>
    <?php require __DIR__ . "/../../app/views/footer.php" ?>
</body>
</html>