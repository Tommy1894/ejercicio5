<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad=$_POST['edad'];
    $sexo = $_POST['sexo'];
    $query2 = "UPDATE concesio_cliente SET nombre='$nombre', apellido='$apellido', edad='$edad', sexo='$sexo' WHERE cedula='$cedula'";
    $rs2=mysqli_query($conec, $query2) or die('Error: ' . mysqli_error($conec));
    echo 'listo';
            

    

?>