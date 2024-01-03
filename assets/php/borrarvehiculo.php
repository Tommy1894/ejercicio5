<?php
    include_once('conexion.php');

    $matricula = $_POST['matricula'];

    $query = "DELETE FROM concesio_vehiculo WHERE matricula='$matricula'";

    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

    if($rs){
        echo 'Vehiculo Borrado';
        
    }else{
        echo 'Error No se borro el vehiculo';
    }


?>
