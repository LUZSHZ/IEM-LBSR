<?php
include_once("../servidor/conexion.php");
if(!empty($_GET['id'])){
    $clave = $_GET['id'];
    $consulta = mysqli_query($conexion, "DELETE FROM categoria WHERE idcate= $clave");
    mysqli_close($conexion);
    header("Location:../cliente/categoria.php");

}
?>