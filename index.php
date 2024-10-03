<?php
$alert = "";
session_start();
if (!empty($_SESSION['activa'])) {
    header('location:cliente/inicio.php');
} else {
    if (!empty($_POST)) {
        //valida  que  correo y contraseña  estan vacios
        if (empty($_POST['correo']) || empty($_POST['contra'])) {
            $alert = '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            Correo y/o contraseña  son obligatorios
                        </div>
                    </div>';
        } else { //cuando  si se  ingresen  datos
            require_once('servidor/conexion.php');
            $usuario = mysqli_real_escape_string($conexion, $_POST['correo']);
            $pass = mysqli_real_escape_string($conexion, $_POST['contra']);
            $query = mysqli_query(
                $conexion,
                "select * from usuarios where correo='$usuario' AND contra='$pass'"
            );
            mysqli_close($conexion);
            $resultado = mysqli_num_rows($query);
            if ($resultado > 0) {
                $dato = mysqli_fetch_array($query);
                //creamos  variables de  tipo sesión  para  tener  los datos  disponibles
                $_SESSION['activa'] = true;
                $_SESSION['nombre'] = $dato['nomusu'];
                $_SESSION['paterno'] = $dato['apausu'];
                $_SESSION['materno'] = $dato['amausu'];
                $_SESSION['rol'] = $dato['idtipo'];
                header('location: cliente/inicio.php');
            } else {
                $alert = '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                     Usuario y/o contraseña incorrecta!!!
                </div>
            </div>';
                session_destroy();
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="container" style="background-color: blueviolet; margin-top:230px;">
    <div class="row" style="background-color: purple; text-align:center;">
      <div class="col" style="background-color:aqua">
        <img src="cliente/img/logo-removebg-preview.png" height="400px" width="400px">
      </div>
      <div class="col" style="background-color:#4E0674;">
        <div class="row">
          <h1 style="color: white; padding: 20px;">AUTENTIFICACIÓN</h1>
        </div>
        <form style="padding: 30px;" method="POST">
          <div>
            <?php echo isset($alert)? $alert:"" ?>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:aqua;">Usuario</label>
            <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" style="width:300px; margin-left:140px;" name="correo">
            <div id="emailHelp" class="form-text" style="color:white;">No olvides ingresar tus datos.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" style="color:aqua;">Contraseña</label>
            <input type="password" class="form-control" id="contra" style="width:300px; margin-left:140px" name="contra">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-left:120px;">
            <label class="form-check-label" for="exampleCheck1" style="color:aqua; text-align:center;">Check me out</label>
          </div>
          <a href="../inicio.php"><button type="submit" class="btn btn-primary" style="background-color:aqua; color:#4E0674;">Iniciar Sesión</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>