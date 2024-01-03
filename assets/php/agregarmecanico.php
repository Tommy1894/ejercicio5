<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad=$_POST['edad'];
    $sexo = $_POST['sexo'];
    $especialidad= $_POST['especialidad'];
    $query="SELECT * FROM concesio_mecanico where cedula='$cedula'";
    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)
    if($rs->num_rows == 0){
        $query2 = "INSERT INTO concesio_mecanico(cedula,nombre, apellido, sexo, edad, especialidad) VALUES('$cedula','$nombre', '$apellido', '$sexo','$edad','$especialidad')";
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