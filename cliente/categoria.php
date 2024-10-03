<?php

include "../servidor/conexion.php";

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nc1'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    El campo es obligatorio.
                </div>';
    } else {
        $nc1 = mysqli_real_escape_string($conexion, $_POST['nc1']);

        // Comprobar si la categoría ya existe
        $query = mysqli_query($conexion, "SELECT * FROM categoria WHERE categorias = '$nc1'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        La categoría ya existe
                    </div>';
        } else {
            // Insertar nueva categoría
            $consulta = mysqli_query($conexion, "INSERT INTO categoria (categorias) VALUES('$nc1')");
            if ($consulta) {
                $alert = '<div class="alert alert-success" role="alert">
                       Categoría registrada!!!
                    </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al guardar la información: ' . mysqli_error($conexion) . '
                    </div>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <title>Administración de Categorías</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <!--ENCABEZADO-->
    <?php include_once("include/encabezado.php"); ?>
    <!--ENCABEZADO-->

    <div class="container" style="text-align:center">
        <h2>Administración de Categorías</h2>
        <!-- Button trigger modal -->
        <button style="background-color:#4E0674; color:white;" class="btn btn-secondary"type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Nueva Categoría
        </button>

        <table class="table" style="width: 500px; height:200px; margin-left:400px;">
            <thead>
                <tr>
                    <th scope="col">Categoría</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_query($conexion, "SELECT * FROM categoria");
                while ($datos = mysqli_fetch_assoc($con)) {
                ?>
                    <tr>
                        <td><?php echo $datos['categorias'] ?></td>
                        <td><a href="../cliente/editar_categoria.php?id=<?php echo $datos['idcate']; ?>"><button type="button" class="btn btn-secondary"><i class="fi fi-rs-edit"></i></button></a></td>

                        <td><a href="../cliente/borrar_categoria.php?id=<?php echo $datos['idcate']; ?>"><button type="button" class="btn btn-danger"><i class="fi fi-rr-trash"></i></button></a></td>
                    <?php
                }
                    ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de Categorías</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form style="padding: 30px;" method="POST">
                        <div>
                            <?php echo isset($alert) ? $alert : ""; ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="color:#4E0674;">Categoría</label>
                            <input type="text" class="form-control"  name="nc1" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-secondary" style="background-color:#4E0674; color:white;">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--termina modal-->
    
    <!--FOOTER-->
    <footer>
        <?php include_once("include/pie.php"); ?>
    </footer>
    <!--FOOTER-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>