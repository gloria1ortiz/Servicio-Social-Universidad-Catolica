<?php
session_start();
include("conexion.php");
require('fpdf.php');

$usuario = $_SESSION['usuario'];

/* CONSULTAR DATOS */
$resultado = mysqli_query($conexion, "SELECT * FROM horas WHERE usuario='$usuario'");

/* CREAR PDF */
$pdf = new FPDF();
$pdf->AddPage();

/* TÍTULO */
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Reporte de Horas - Servicio Social',0,1,'C');

$pdf->Ln(5);

/* USUARIO */
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'Usuario: '.$usuario,0,1);

/* ENCABEZADOS */
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Horas',1);
$pdf->Cell(50,10,'Fecha',1);
$pdf->Cell(100,10,'Actividad',1);
$pdf->Ln();

/* DATOS */
$pdf->SetFont('Arial','',12);

$total = 0;

while($fila = mysqli_fetch_assoc($resultado)){
    $pdf->Cell(40,10,$fila['horas'],1);
    $pdf->Cell(50,10,$fila['fecha'],1);
    $pdf->Cell(100,10,$fila['actividad'],1);
    $pdf->Ln();

    $total += $fila['horas'];
}

/* TOTAL */
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Total de horas: '.$total,0,1);

/* DESCARGAR */
$pdf->Output('D','reporte_horas.pdf');
?>
