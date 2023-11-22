<?php
    include_once('conexion.php');

    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo=$_POST['tipo'];
    $ano = $_POST['ano'];
    $clasificacion = $_POST['clasificacion'];
    $descripcion = $_POST['descripcion'];
    $imagen=$_POST['imagen'];
    $ced_cliente  = $_POST['ced_cliente '];
    $query="SELECT * FROM concesio_vehiculo where matricula='$matricula'";
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