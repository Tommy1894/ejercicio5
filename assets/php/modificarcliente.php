<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad=$_POST['edad'];
    $sexo = $_POST['sexo'];
    $query="SELECT * FROM concesio_cliente where cedula='$cedula'";
    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)
    if($rs->num_rows == 0){
        $query2 = "UPDATE concesio_cliente SET cedula='$cedula', nombre='$nombre',
        apellido='$apellido', edad='$edad', sexo='$sexo' WHERE cedula='$cedula'";
        $rs2=mysqli_query($conec, $query2) or die('Error: ' . mysqli_error($conec));
        if($rs2){
            echo 'listo';
            
        }else{
            echo 'Error No se actualizo el registro';
        }
    }
    else{
        echo "error";
       
    }
    
    

?>