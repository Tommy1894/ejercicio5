<?php

require('./fpdf.php');
require('../phpqrcode/qrlib.php');
include_once('../assets/php/conexion.php');
date_default_timezone_set('America/Caracas');
class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {  
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('ICAR PLUS'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

     

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 0, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE REPARACIONES "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(255, 255, 255); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 10);
      // $this->Cell(70, 10, utf8_decode('CARACTERÍSTICAS'), 1, 0, 'C', 1);
      // $this->Cell(25, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();
$id=$_GET["id"];
$query="SELECT concesio_registro.id as id, concesio_registro.fecha_stamp as fecha, concesio_registro.matricula as matricula, concesio_vehiculo.modelo as modelo,concesio_vehiculo.marca as marca,concesio_vehiculo.tipo as tipo,concesio_vehiculo.imagen as imgvehi, concesio_cliente.cedula as cedcliente, concesio_cliente.nombre as cliente, concesio_cliente.sexo as sexo,concesio_registro.serial as serial, concesio_repuesto.nombre as repuesto,concesio_repuesto.cantidad as cantidad,concesio_repuesto.imagen as imgrep, ced_meca,concesio_mecanico.nombre as mecanico,concesio_mecanico.sexo as sexmeca FROM concesio_registro inner join concesio_vehiculo on concesio_vehiculo.matricula=concesio_registro.matricula inner JOIN concesio_repuesto on concesio_repuesto.serial=concesio_registro.serial inner join concesio_mecanico on concesio_mecanico.cedula=concesio_registro.ced_meca inner join concesio_cliente on concesio_cliente.cedula=concesio_vehiculo.ced_cliente where id='$id'";
$result = mysqli_query($conec, $query);
if(!$result) {
   die('Query Failed'. mysqli_error($connection));
}
$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
/* TABLA */
// $pdf->Cell(18, 10, utf8_decode("N°"), 1, 0, 'C', 0);
// $pdf->Cell(20, 10, utf8_decode("numero"), 1, 0, 'C', 0);
// $pdf->Cell(30, 10, utf8_decode("nombre"), 1, 0, 'C', 0);
// $pdf->Cell(25, 10, utf8_decode("precio"), 1, 0, 'C', 0);
// $pdf->Cell(70, 10, utf8_decode("info"), 1, 0, 'C', 0);
// $pdf->Cell(25, 10, utf8_decode("total"), 1, 1, 'C', 0);
$N_contador = 1;
$dir='../temp/';
$filename=$dir.'qr.png';
$tamano=2;
$level = 'L'; //Precisión Baja
$framSize = 3; //Tamaño en blanco

foreach ($data as $row) {
   if($row['sexo']=="M"){
      $sexo="Masculino";
  }
  else{
      $sexo="Femenino";
  }
  if($row['sexmeca']=="M"){
      $sexo2="Masculino";
  }
  else{
      $sexo2="Femenino";
  }
  $fecha=date('d-m-Y H:i:s',$row['fecha']);
  $contenido= "ID:".$row['id']."\nFecha de Registro:".$fecha."\nMatricula del vehiculo:".$row['matricula']."\nModelo del vehiculo:".$row['modelo']."\nTipo de vehiculo:".$row['tipo']."\nCedula del cliente:".$row['cedcliente']."\nNombre del cliente:".$row['cliente']."\nSexo del cliente:".$sexo."\nSerial del repuesto:".$row['serial']."\nNombre del repuesto:".$row['repuesto']."\nCantidad de repuestos usados:".$row['cantidad']."\nCedula del mecanico:".$row['ced_meca']."\nNombre del mecanico:".$row['mecanico']."\nSexo del mecanico:".$sexo2;
   $pdf->SetX(93); 
   QRcode::png($contenido, $filename, $level, $tamano, $framSize); 
   $pdf->Image('../temp/qr.png');
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("ID:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['id']), 1, 1, 'C'); 
   $pdf->SetX(60);
   
   $pdf->Cell(50, 10, utf8_decode("Fecha de Registro:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($fecha), 1, 1, 'C');
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Matricula del vehiculo:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['matricula']), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Modelo del vehiculo:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['modelo']), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Tipo de vehiculo:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['tipo']), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Cedula del cliente:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['cedcliente']), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Nombre del cliente:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['cliente']), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Sexo del cliente:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($sexo), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Serial del repuesto:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['serial']), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Nombre del repuesto:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['repuesto']), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Cantidad de repuestos usados:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['cantidad']), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Cedula del mecanico:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['ced_meca']), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Nombre del mecanico:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($row['mecanico']), 1, 1, 'C'); 
   $pdf->SetX(60);
   $pdf->Cell(50, 10, utf8_decode("Sexo del mecanico:"), 1, 0, 'L');
   $pdf->Cell(50, 10, utf8_decode($sexo2), 1, 1, 'C'); 


$pdf->Output('RegistroId.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
}