<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Inventario de Productos</h1>
    <table>
        <?php foreach($products as $item): ?> <!-- para ver el foreach mas claro se quitan las llaves, se pone : y al final se pone endforeach;-->
        <tr>
            <!-- Al ser array de arrays, del primer elemento array cogemos la posición 0 y 1 -->
            <td>Identificador: <?= $item[0] ?></td> <!-- ?= es lo mismo que echo -->
            <td>Descripción: <?= $item[1] ?> </td> 
            <td><a href="?method=show&id=<?= $item[0] ?>">Ver detalle producto</a></td>              
            
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
