<?php

require('./fpdf.php');
include_once('../assets/php/conexion.php');
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
      $this->Cell(100, 10, utf8_decode("REPORTE DE REPUESTOS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(255, 255, 255); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(30);
      $this->Cell(35, 10, utf8_decode('SERIAL'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('MARCA'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('CANTIDAD'), 1, 1, 'C', 1);
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
$query = "SELECT * FROM concesio_repuesto";
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
foreach ($data as $row) {
    $pdf->Cell(30);
    $pdf->Cell(35, 10, utf8_decode($row['serial']), 1, 0, 'C'); // Centra la cédula
    $pdf->Cell(35, 10, utf8_decode($row['nombre']), 1, 0, 'C'); // Centra el nombre
    $pdf->Cell(35, 10, utf8_decode($row['marca']), 1, 0, 'C'); // Centra el apellido
    $pdf->Cell(35, 10, utf8_decode($row['cantidad']), 1, 1, 'C'); // Centra el apellido
    $N_contador++;
}


$pdf->Output('Clientes.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
