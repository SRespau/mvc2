<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . "/../../app/views/head.php" ?>

<body>
<?php require __DIR__ . "/../../app/views/header.php" ?>

<!--Menú de selección de opciones a realizar para la gestión de contactos de empresas. Cada link manda a una función diferente de CompanyController -->    
    <h1>Se encuentra en la gestión de contactos de personas.</h1>
    <ul>
        <li>Menu
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