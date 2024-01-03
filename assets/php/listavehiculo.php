<?php

  include('conexion.php');

  $query = "SELECT matricula, marca, modelo,tipo,ano,clasificacion,descripcion,imagen,ced_cliente  FROM concesio_vehiculo";
  $result = mysqli_query($conec, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    
    $json[] = array(
      'matricula' => $row['matricula'],
      'marca' => $row['marca'],
      'modelo' => $row['modelo'],
      'tipo' => $row['tipo'],
      'ano'=>$row['ano'],
      'clasificacion' => $row['clasificacion'],
      'descripcion' => $row['descripcion'],
      'imagen' => $row['imagen'],
      'ced_cliente' => $row['ced_cliente']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>