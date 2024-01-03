<?php

  include('conexion.php');

  $query = "SELECT * FROM concesio_repuesto";
  $result = mysqli_query($conec, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    
    $json[] = array(
      'serial' => $row['serial'],
      'nombre' => $row['nombre'],
      'cantidad' => $row['cantidad'],
      'imagen' => $row['imagen'],
      'marca'=>$row['marca']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>