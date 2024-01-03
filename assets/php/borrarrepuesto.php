<?php
    include_once('conexion.php');

    $serial = $_POST['serial'];

    $query = "DELETE FROM concesio_repuesto WHERE serial='$serial'";

    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

    if($rs){
        echo 'Repuesto Borrado';
        
    }else{
        echo 'Error No se borro el repuesto';
    }


?>
