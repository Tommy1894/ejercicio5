<?php

  include('conexion.php');

  $query = "SELECT matricula, marca, modelo,tipo,ano,clasificacion,descripcion,imagen,ced_cliente  FROM concesio_vehiculo";
  $result = mysqli_query($conec, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    if($row['sexo']=="M"){
        $sexo="Masculino";
    }
    else{
        $sexo="Femenino";
    }
    $json[] = array(
      'cedula' => $row['cedula'],
      'nombre' => $row['nombre'],
      'apellido' => $row['apellido'],
      'sexo' => $sexo,
      'edad'=>$row['edad']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>