<?php
include_once("../servidor/conexion.php");
if (!empty($_POST)) {
  //para validar que los campos no esten vacios
  if (empty($_POST['cam1']) || empty($_POST['cam2']) || empty($_POST['cam3']) || empty($_POST['cam4']) || empty($_POST['cam5']) || empty($_POST['cam6']) || empty($_POST['cam7'])) {
    //alerta para decir que los valores 
    $alert = '<div class="alert alert-primary" role="alert"> 
    Todos los datos son obligatorios
     </div>';
  } else {

    $c1 = $_POST['cam1'];
    $c2 = $_POST['cam2'];
    $c3 = $_POST['cam3'];
    //aplicar md5 hasta el final para encryptar ,metodos xa 16,8, nuevas
    //$c4 = md5( $_POST['cam4']);
    $c4 =  $_POST['cam4'];
    $c5 = $_POST['cam5'];
    $c6 = $_POST['cam6'];
    $c7 = $_POST['cam7'];
    //    $c8 = md5($_POST['cam5']);   // password encriptado

    $_query = mysqli_query($conexion, "SELECT * FROM usuarios where correo = '$c4' ");
    $result = mysqli_fetch_array($_query);
    if ($result > 0) {
      $alert = '<div class="alert alert-danger" role="alert">
    el correo y/o usuario ya existe !!
    </div>
  ';
    } else {
      $consulta = mysqli_query($conexion, "INSERT INTO usuarios(nomusu, apausu, amausu, correo, contra, telefono, idtipo)
                                                       values('$c1', '$c2', '$c3', '$c4', '$c5', $c6, $c7)");

      if ($consulta) {
        $alert = '<div class="alert alert" role="alert">
                  Datos guardados correctamente </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                  Datos guardados incorrectamente </div>';
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-bold-straight/css/uicons-bold-straight.css'>

  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
  <title>USUARIOS</title>
</head>



<body>

  <header>


    <!--ENCABEZADO-->
    <?php include_once("include/encabezado.php"); ?>
    <!--ENCABEZADO-->
  </header>

  <div class="container" style="text-align: center;">
    <h2>ADMINISTRACION DE USUARIOS</h2>


    <!---BOTON PARA USUARIO QUE PUEDE AGREGAR MAS USUARIOS-->
    <?php if ($_SESSION['rol'] == 1) {; ?>
      <button style="background-color:#4E0674; color:white;" class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Agregar Nuevo Producto
    </button>
    <?php } ?>


  </div>



  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido Materno</th>
          <th scope="col">Apellido Paterno</th>

          <!--SOLO SE MUESTRA A CIERTOS USUARIOS-->
          <?php if ($_SESSION['rol'] == 1) {; ?>
            <th scope="col">Correo electronico</th>
            <th scope="col">Telefono</th>
            <th scope="col">Tipo Usuario</th>
            <th scope="col">Acciones</th>
          <?php  } ?>
          <!--SOLO SE MUESTRA A CIERTOS USUARIOS-->
        </tr>

      </thead>

      <tbody>

        <?php include_once("../Servidor/conexion.php");
        $con = mysqli_query(
          $conexion,
          //se llama a traer a todos los valores con los que se va a trabajar
          "SELECT u.idusuario,u.nomusu, u.apausu, u.amausu, u.correo, u.telefono, t.tipousu FROM usuarios u INNER JOIN tipousuario t ON u.idtipo = t.idtipo;"
        );
        $res = mysqli_num_rows($con);
        while ($datos = mysqli_fetch_assoc($con)) {   ?>


          <tr>
            <!-- LAS COLUMNAS SERAN REEMPLAZADAS POR LOS VALORES DE LA BD--->
            <td><?php echo $datos['nomusu'];          ?></td>
            <td><?php echo $datos['apausu'];          ?></td>
            <td><?php echo $datos['amausu'];          ?></td>
            <?php
            //se abre llave (amarilla) para mostrar solo lo que queremos que muestre a tal usuario
            if ($_SESSION['rol'] == 1) {;     ?>
              <td><?php echo $datos['correo'];          ?></td>
              <td><?php echo $datos['telefono'];          ?></td>
              <td><?php echo $datos['tipousu'];          ?></td>
              <?php
            //se abre llave (amarilla) para mostrar solo lo que queremos que muestre a tal usuario
            if ($_SESSION['rol'] == 1) {;     ?>
              <!--BOTON DE EDITAR-->
              <td><a href="../cliente/editar_usuarios.php? id= <?php echo $datos['idusuario'] ?>">
                  <button type="button"  class="btn btn-secondary"><i class="fi fi-rs-edit"></i>
                  </button>
                </a></td>
                <!--BOTON DE BORRAR-->
               <td> <a href="../cliente/borrar_usuarios.php?id=<?php echo $datos['idusuario'] ?>">
                  <button type="button" class="btn btn-danger"><i class="fi fi-rr-trash"></i>
                  </button>
                </a>
              </td>

              <!--SE CIERRA LA LLAVE PARA MOSTRAR A CIERTOS USUARIOS -->
            <?php   } ?>
              

              <!--SE CIERRA LA LLAVE PARA MOSTRAR A CIERTOS USUARIOS -->
            <?php   } ?>

          </tr>

        <?php  } ?>

      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registro de usuarios</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form style="padding:   5px; text-align:left;" method="POST">
            <div>
              <?php echo isset($alert) ? $alert : ""; ?>
            </div>
            <div class="form-group">
              <label for="correo" class="form-label">Nombres</label>
              <input type="text" class="form-control" id="cam1" name="cam1" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
              <label for="contra" class="form-label">Apellido paterno</label>
              <input type="text" class="form-control" id="cam2" name="cam2">
            </div>
            <div class="form-group">
              <label for="contra" class="form-label">Apellido materno</label>
              <input type="text" class="form-control" id="cam3" name="cam3">
            </div>
            <div class="form-group">
              <label for="contra" class="form-label">correo electronico</label>
              <input type="email" class="form-control" id="cam4" name="cam4">
            </div>

            <div class="form-group">
              <label for="contra" class="form-label">Contraseña</label>
              <input type="text" class="form-control" id="cam5" name="cam5">
            </div>

            <div class="form-group">
              <label for="contra" class="form-label">Telefono</label>
              <input type="text" class="form-control" id="cam6" name="cam6">
            </div>
            <div>

              <label for="contra" class="form-label">Seleccione su tipo de usuario</label>
              <select class="form-select" aria-label="Default select example" id="cam7" name="cam7">

                <option selected>Tipo de usuario</option>

                <?php include_once("../Servidor/conexion.php");
                $cone = mysqli_query($conexion, "SELECT * FROM tipousuario ;");
                $res = mysqli_num_rows($cone);
                while ($dat = mysqli_fetch_assoc($cone)) { ?>
                  <option value=<?php echo $dat['idtipo'];  ?>> <?php echo $dat['tipousu'];  ?>
                  </option>
                <?php } ?>
              </select>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar informacion</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--termina modal -->


  <footer>
    <!--PIE-->
    <?php include_once("include/pie.php"); ?>
    <!--PIE-->

  </footer>

</body>





</html>