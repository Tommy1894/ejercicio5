<?php
//Si se quiere subir una imagen
require_once("conexion.php");
if (isset($_POST['subir'])) {
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
   //Recogemos el archivo enviado por el formulario
   $archivo = $_FILES['archivo']['name'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['archivo']['type'];
      $tamano = $_FILES['archivo']['size'];
      $temp = $_FILES['archivo']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, '../../img_vehi/'.$archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('../../img_vehi/'.$archivo, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            $query = "INSERT INTO concesio_vehiculo(matricula, imagen) VALUES('b', '$archivo')";

            $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)
        
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            echo '<p><img src="../../img_vehi/'.$archivo.'"></p>';
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }
   }
}
?>
    

?>