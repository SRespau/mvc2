<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "../app/views/head.php" ?>  
</head>
<body>
    <?php require "../app/views/header.php" ?> 
    <h1>Lista de usuarios</h1>
    <table>
        <?php foreach($products as $item): ?> <!-- para ver el foreach mas claro se quitan las llaves, se pone : y al final se pone endforeach;-->
        <tr>
            <h1>Lista de usuarios</h1>
            <!-- Al ser array de arrays, del primer elemento array cogemos la posición 0 y 1 -->
            <!--<td>Identificador: <?= $item[0] ?></td>  ?= es lo mismo que echo 
            <td>Descripción: <?= $item[1] ?> </td> 
            <td><a href="show/?id=<?= $item[0] ?>">Ver detalle producto</a></td> -->             
            
        </tr>
        <?php endforeach; ?>
    </table>

    <?php require "../app/views/footer.php" ?>
    
</body>
</html>