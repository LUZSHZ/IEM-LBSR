<?php
include_once("../servidor/conexion.php");

// Actualizar categoría
if (!empty($_POST)) {
    $alert = "";

    // Validación de campos vacíos
    if (empty($_POST['nc1'])) {
        $alert = '<div class="alert alert-danger" role="alert">Todos los campos son requeridos</div>';
    } else {
        // Recogiendo datos del formulario
        $idcate = $_GET['id'];
        $nc1 = $_POST['nc1'];

        // Query para actualizar datos de la categoría
        $sql_update = mysqli_query($conexion, "UPDATE categoria SET categorias='$nc1' WHERE idcate='$idcate'");

        if ($sql_update) {
            // Redirigir con parámetro de éxito
            header("Location: ../cliente/categoria.php");
            exit();
        } else {
            $alert = '<div class="alert alert-danger" role="alert">Error al actualizar la categoría</div>';
        }
    }
}

// Mostrar datos de la categoría
if (empty($_REQUEST['id'])) {
    header("Location: ../cliente/categoria.php");
    exit();
}

$idcate = intval($_REQUEST['id']);
$sql = mysqli_query($conexion, "SELECT * FROM categoria WHERE idcate = $idcate");
$result_sql = mysqli_num_rows($sql);

if ($result_sql == 0) {
    header("Location:categoria.php");
    exit();
} else {
    if ($data = mysqli_fetch_array($sql)) {
        $nc1 = $data['categorias'];
    }
}
?>
<?php include_once "../cliente/include/encabezado.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post"style="padding: 60px;" >
                <?php echo isset($alert) ? $alert : ''; ?>
                <input type="hidden" name="id" value="<?php echo $idcate; ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" style="color:#4E0674;">Nombre</label>
                    <input type="text" placeholder="Nombre de la categoria" class="form-control" name="nc1" id="nc1" value="<?php echo htmlspecialchars($nc1); ?>" required>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='categoria.php'">Cancelar</button>
                <button style="background-color:#4E0674; color:white;" type="submit" class="btn btn-secondary"><i class="fas fa-user-edit"></i> Actualizar Categoría</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?php include_once "include/pie.php"; ?>