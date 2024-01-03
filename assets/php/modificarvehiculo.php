<?php
    include_once('conexion.php');

    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo=$_POST['tipo'];
    $ano = $_POST['ano'];
    $clasificacion = $_POST['clasificacion'];
    $descripcion = $_POST['descripcion'];
    $query2 = "UPDATE concesio_vehiculo SET marca='$marca', modelo='$modelo',
    tipo='$tipo', ano='$ano', clasificacion='$clasificacion', descripcion='$descripcion' WHERE matricula='$matricula'";
    $rs2=mysqli_query($conec, $query2) or die('Error: ' . mysqli_error($conec));
    if($rs2){
        echo 'listo';
        
    }else{
        echo 'Error No se actualizo el registro';
    }
    
    
    
    

?>