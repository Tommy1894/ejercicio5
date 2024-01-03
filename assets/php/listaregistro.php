<?php

  include('conexion.php');

  $query = "SELECT concesio_registro.id as id, concesio_registro.matricula as matricula, concesio_vehiculo.modelo as modelo, concesio_cliente.cedula as cedcliente, concesio_cliente.nombre as cliente, concesio_registro.serial as serial, concesio_repuesto.nombre as repuesto,concesio_repuesto.cantidad as cantidad, ced_meca,concesio_mecanico.nombre as mecanico FROM concesio_registro inner join concesio_vehiculo on concesio_vehiculo.matricula=concesio_registro.matricula inner JOIN concesio_repuesto on concesio_repuesto.serial=concesio_registro.serial inner join concesio_mecanico on concesio_mecanico.cedula=concesio_registro.ced_meca inner join concesio_cliente on concesio_cliente.cedula=concesio_vehiculo.ced_cliente; ";
  $result = mysqli_query($conec, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    
    $json[] = array(
      'id' => $row['id'],
      'matricula' => $row['matricula'],
      'modelo' => $row['modelo'],
      'cliente'=>$row['cedcliente'],
      'nomcliente' => $row['cliente'],
      'serial' => $row['serial'],
      'repuesto' => $row['repuesto'],
      'cantidad'=>$row['cantidad'],
      'mecanico' => $row['ced_meca'],
      'nommecanico' => $row['mecanico'],
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>