 <?php 
     session_start();
    

?> 
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
  <div class="container" style="text-align: center; background-color:darkgrey;">
    <div class="row">
      <div class="col-3">
        <img src="img/logo-removebg-preview.png" height="200px" width="200px">
      </div>
      <div class="col" style="margin-top:70px;">
        <div class="btn-group" role="group" aria-label="Basic outlined example">
          <?php
          if ($_SESSION['rol'] == 1) {
          ?>
            <a href="inicio.php"> <button type="button" class="btn btn-outline-primary" style="color: #4E0674;">Inicio</button> </a>
            <a href="usuarios.php"> <button type="button" class="btn btn-outline-primary" style="color: #4E0674;">Usuarios</button></a>
            <a href="categoria.php"> <button type="button" class="btn btn-outline-primary" style="color: #4E0674;">Categorias</button></a>
            <a href="productos.php"> <button type="button" class="btn btn-outline-primary" style="color: #4E0674;">Productos</button></a>
            <a href="promociones.php"> <button type="button" class="btn btn-outline-primary" style="color: #4E0674;">Promociones</button></a>
            <a href="reportes.php"> <button type="button" class="btn btn-outline-primary" style="color: #4E0674;">Reportes</button></a>
            <a href="salir.php"> <button type="button" class="btn btn-outline-Success" style="color: #4E0674;">Salir</button></a>
          <?php
          }
          ?>

          <?php
          if ($_SESSION['rol'] == 2) {
          ?>
           <a href="usuarios.php"> <button type="button" class="btn btn-outline-primary" style="color: #4E0674;">Usuarios</button></a>
           
            <a href="inicio.php"> <button type="button" class="btn btn-outline-primary" style="color: #4E0674;">Inicio</button> </a>
            <a href="productos.php"> <button type="button" class="btn btn-outline-primary" style="color: #4E0674;">Productos</button></a>
            <a href="promociones.php"> <button type="button" class="btn btn-outline-primary" style="color: #4E0674;">Promociones</button></a>
            <a href="salir.php"> <button type="button" class="btn btn-outline-Success" style="color: #4E0674;">Salir</button></a>
          <?php
          }
          ?>
        </div>
      </div>

    </div>

  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>