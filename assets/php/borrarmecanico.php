<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];

    $query = "DELETE FROM concesio_repuesto WHERE cedula='$cedula'";

    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

    if($rs){
        echo 'Cliente Borrado';
        
    }else{
        echo 'Error No se borro el cliente';
    }


?>
