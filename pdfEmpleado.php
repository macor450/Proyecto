<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(90,10,'Empleado',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(17,10,'Nombre',1,0,'C',0);
    $this->Cell(17,10,'rfc',1,0,'C',0);
    $this->Cell(34,10,'email',1,0,'C',0);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

include("model/conexion.php");

$SELECT = "SELECT idEmpleado, nombre, rfc, email";
$datos= mysqli_query ($con,$SELECT);

while ($fila = mysqli_fetch_array($datos))
{
    $pdf->Cell(17,10,$fila ["nombre"],1,0,'B',0);
    $pdf->Cell(17,10,$fila ["rfc"],1,0,'B',0);
    $pdf->Cell(34,10,$fila ["email"],1,0,'B',0);

}
$pdf->Output();
?>