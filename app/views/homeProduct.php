<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "../app/views/head.php" ?>  
</head>
<body>
    <?php require "../app/views/header.php" ?> 
    <h1>Lista de usuarios</h1>

    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Type Id</th>
            <th>Precio</th>
            <th>Fecha Compra</th>
            <th></th>
        </tr>

    <?php foreach ($products as $key => $product) { ?>
        <tr>
            <td><?php echo $product->id ?></td>
            <td><?php echo $product->name ?></td>
            <td><?php echo $product->type_id ?></td>
            <td><?php echo $product->price ?></td>
            <td><?php echo $product->fecha_compra ?></td>
            <td>
                <a href="/user/show/<?php echo $product->id ?>" class="btn btn-primary">Ver </a>
            </td>
        </tr>
  <?php } ?>
</table>

    <?php require "../app/views/footer.php" ?>
    
</body>
</html>
