<?php
    include_once('conexion.php');

    $serial = $_POST['serial'];
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $cantidad=$_POST['cantidad'];
    $query="SELECT * FROM concesio_repuesto where serial='$serial'";
    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)
    $query2 = "UPDATE concesio_repuesto SET marca='$marca', nombre='$nombre',
    cantidad='$cantidad' WHERE serial='$serial'";
    $rs2=mysqli_query($conec, $query2) or die('Error: ' . mysqli_error($conec));
    if($rs2){
        echo 'listo';
            
    }else{
            echo 'Error No se actualizo el registro';
    }
?>