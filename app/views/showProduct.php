<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    <h1>Detalle del producto <?php echo $product->id ?></h1>
        <ul>
            <li><strong>Nombre: </strong><?php echo $user->name ?></li>
            <li><strong>Apellidos: </strong><?php echo $user->surname ?></li>
            <li><strong>Email: </strong><?php echo $user->email ?></li>
            <li><strong>F. nacimiento: </strong><?php echo $user->birthdate ?></li>
        </ul>
</body>
</html>
