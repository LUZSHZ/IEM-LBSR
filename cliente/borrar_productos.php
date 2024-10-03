<?php
include_once("../servidor/conexion.php");
if(!empty($_GET['id'])){
    $clave = $_GET['id'];
    $consulta = mysqli_query($conexion, "DELETE FROM productos WHERE idpro = $clave");
    mysqli_close($conexion);
    header("Location:../cliente/productos.php");

}
?>