<!doctype html>
<html lang="es">

<head>
  <?php require "../app/views/parts/head.php" ?>
</head>

<body>

  <!-- !! COMPLETAR !! -->
  
  <?php require "../app/views/parts/header.php" ?>

  <main role="main" class="container">
    <div class="starter-template">

    <h1>Alta de jugador</h1>
    
    <!-- No se poner create y update en el mismo formulario sin hacer distinción-->
    <form method="post" action="/jugador/store" enctype="multipart/form-data">
      
      <input type="hidden" name="id" value="<?php echo $jugador->id ?>">
      
      <label for="nombre">Nombre</label><br> 
      <input type="text" name="nombre" id="nombre" value="<?php echo $jugador->nombre ?>">
      <br>

      <label for="fNacimiento">F. nacimiento</label><br>  
      <input type="text" name="fNacimiento" id="fNacimiento" value="<?php echo $jugador->nacimiento?>">
      <br><br><br>

      <select name="posicion" id="posicion">
        <option value="Delantero">Delantero</option>
        <option value="Defensa">Defensa</option>
        <option value="Centrocampista">Centrocampista</option>
        <option value="Portero">Portero</option>
      </select>
      <br><br><br>

      <label for="foto">Foto:</label><br>
      <input type="file" name="foto" id="foto">
      <br><br>
      <button type="submit" class="btn btn-default" name="envio">Enviar</button>

    </form>    
  </div>

  </main><!-- /.container -->
  <?php require "../app/views/parts/footer.php" ?>

</body>
<?php require "../app/views/parts/scripts.php" ?>

</html>