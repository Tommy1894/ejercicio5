<?php

require('./fpdf.php');
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
      $this->Cell(18, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('MATRICULA'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('MODELO'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('CED CLI'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('CLIENTE'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('SERIAL'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('REPUESTO'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('CED MEC'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('MECANICO'), 1, 1, 'C', 1);
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
$query = "SELECT concesio_registro.id as id, concesio_registro.matricula as matricula, concesio_vehiculo.modelo as modelo, concesio_cliente.cedula as cedcliente, concesio_cliente.nombre as cliente, concesio_registro.serial as serial, concesio_repuesto.nombre as repuesto,concesio_repuesto.cantidad as cantidad, ced_meca,concesio_mecanico.nombre as mecanico FROM concesio_registro inner join concesio_vehiculo on concesio_vehiculo.matricula=concesio_registro.matricula inner JOIN concesio_repuesto on concesio_repuesto.serial=concesio_registro.serial inner join concesio_mecanico on concesio_mecanico.cedula=concesio_registro.ced_meca inner join concesio_cliente on concesio_cliente.cedula=concesio_vehiculo.ced_cliente; ";
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
$pdf->SetFont('Arial', '', 10);
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
foreach ($data as $row) {
    $pdf->Cell(18, 10, utf8_decode($row['id']), 1, 0, 'C');
    $pdf->Cell(20, 10, utf8_decode($row['matricula']), 1, 0, 'C'); // Centra la cédula
    $pdf->Cell(20, 10, utf8_decode($row['modelo']), 1, 0, 'C'); // Centra el nombre
    $pdf->Cell(20, 10, utf8_decode($row['cedcliente']), 1, 0, 'C'); // Centra el apellido
    $pdf->Cell(20, 10, utf8_decode($row['cliente']), 1, 0, 'C'); 
    $pdf->Cell(20, 10, utf8_decode($row['serial']), 1, 0, 'C');
    $pdf->Cell(20, 10, utf8_decode($row['repuesto']), 1, 0, 'C'); // Centra el apellido
    $pdf->Cell(20, 10, utf8_decode($row['cantidad']), 1, 0, 'C'); 
    $pdf->Cell(20, 10, utf8_decode($row['ced_meca']), 1, 0, 'C');  
    $pdf->Cell(20, 10, utf8_decode($row['mecanico']), 1, 1, 'C'); 
}


$pdf->Output('Compras.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
