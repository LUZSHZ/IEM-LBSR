<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <header>
    <?php
    include_once("include/encabezado.php");
    ?>
  </header>
  <div class="container">
    <p>
      <?php
      echo $_SESSION['nombre'];
      echo " ";
      echo $_SESSION['paterno'];
      ?>
    </p>
  </div>

  <div class="container ">
    <h2>Inicio</h2>
  </div>
  <!-- inicia carrucel-->
  <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../cliente/img/ves8.jpg" class="d-block w-100" alt="fondo1" width="100px" height="800px">
        </div>
        <div class="carousel-item">
          <img src="../cliente/img/ves2.jpg" class="d-block w-100" alt="fondo2" width="300px" height="800px">
        </div>
        <div class="carousel-item">
          <img src="../cliente/img/ves6.jpg" class="d-block w-100" alt="fondo3" width="300px" height="800px">
        </div>
        <div class="carousel-item">
          <img src="../cliente/img/ves7.jpg" class="d-block w-100" alt="fondo2" width="300px" height="800px">
        </div>
        <div class="carousel-item">
          <img src="../cliente/img/ves5.jpg" class="d-block w-100" alt="fondo3" width="300px" height="800px">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- termina carousel-->
  <footer>
    <?php
    include_once("include/pie.php");
    ?>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>