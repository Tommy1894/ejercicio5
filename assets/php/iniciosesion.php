<?php
include_once('conexion.php');
$query = "SELECT * FROM concesio_admin";
$rs = mysqli_query($conec, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
$fila = mysqli_fetch_array($rs);
$error = "";
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
if($usuario == $fila[0] && $contrasena == $fila[1]){
    echo "listo";
} else{
    echo "error";
}

?>