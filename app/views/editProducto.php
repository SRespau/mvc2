<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Edición de producto</h1>

    <form method="post" action="/product/update">
        <input type="hidden" name="id" value="<?php echo $product->id ?>">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="<?php echo $product->name ?>">
        </div>

    <div class="form-group">
        <label>Precio</label>
        <input type="text" name="surname" class="form-control" value="<?php echo $product->price ?>">
    </div>

    <div class="form-group">
        <label>F. cumpleaños</label>
        <input type="text" name="birthdate" class="form-control" value="<?php echo $product->birthdate ?>">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo $product->email ?>" >
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
    </form>
</body>
</html>