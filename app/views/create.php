<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Alta de Producto</h1>

    <form method="post" action="/product/store">

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="id" class="form-control">
    </div>
    <div class="form-group">
        <label>Tipo de Producto</label>
        <select class="custom-select" name="type_id">
            <?php
            foreach($productsTypes as $key => $products){?>
            <option value="<?echo $product->id ?>"><?php echo$product->name?></option>
            ?>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Precio</label>
        <input type="text" name="precio" class="form-control">
    </div>
    <div class="form-group">
        <label>Fecha compra</label>
        <input type="text" name="fecha_compra" class="form-control">
    </div>
    
<button type="submit" class="btn btn-default">Enviar</button>
</form>
</body>
</html>