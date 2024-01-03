<?php
    include_once('conexion.php');
    date_default_timezone_set('America/Caracas');
    $matricula = $_POST['matricula'];
    $serial = $_POST['serial'];
    $ced_meca=$_POST['cedula'];
    $cantidad = $_POST['cantidad'];
    $fecha = date('Y-m-d H:i:s');
    $fechastamp = strtotime($fecha);
    $query="SELECT * FROM concesio_mecanico where cedula='$ced_meca'";
    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)
    if($rs->num_rows !=0){
        $query3="SELECT * FROM concesio_vehiculo where matricula='$matricula'";
        $rs3 = mysqli_query($conec, $query3) or die('Error: ' . mysqli_error($conec));
        if($rs3->num_rows !=0){
            $query4="SELECT * FROM concesio_repuesto where serial='$serial'";
            $rs4 = mysqli_query($conec, $query4) or die('Error: ' . mysqli_error($conec));
            if($rs4->num_rows !=0){
                $query2 = "INSERT INTO concesio_registro(matricula, ced_meca, serial, cantidad, fecha,fecha_stamp) VALUES('$matricula', '$ced_meca', '$serial', '$cantidad','$fecha','$fechastamp')";
                $rs2=mysqli_query($conec, $query2) or die('Error: ' . mysqli_error($conec));
                if($rs2){
                    echo 'listo';
                    
                }else{
                    echo 'Error No se agrego el registro';
                }
            }
            else{
                echo "El repuesto no existe";
            }
        }
        else{
            echo "El vehiculo no existe";
        }
    }
    else{
        echo "El mecanico no existe";
       
    }
    
    

?>