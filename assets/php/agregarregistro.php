<?php
    include_once('conexion.php');

    $ced_cliente = $_POST['ced_cliente'];
    $matricula = $_POST['matricula'];
    $serial = $_POST['serial'];
    $ced_meca=$_POST['ced_meca'];
    $cantidad = $_POST['cantidad'];
    $query="SELECT * FROM concesio_cliente where cedula='$cedula'";
    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)
    if($rs->num_rows == 0){
        $query2 = "INSERT INTO concesio_cliente(cedula, nombre, apellido, sexo, edad) VALUES('$cedula', '$nombre', '$apellido', '$sexo','$edad')";
        $rs2=mysqli_query($conec, $query2) or die('Error: ' . mysqli_error($conec));
        if($rs2){
            echo 'listo';
            
        }else{
            echo 'Error No se agrego el registro';
        }
    }
    else{
        echo "error";
       
    }
    
    

?>