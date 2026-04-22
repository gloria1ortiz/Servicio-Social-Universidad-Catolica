<?php
session_start();
include("conexion.php");
require('fpdf.php');

$usuario = $_SESSION['usuario'];

/* CONSULTAR HORAS APROBADAS */
$sql = "SELECT * FROM horas WHERE usuario='$usuario' AND estado='aprobado'";
$resultado = mysqli_query($conexion, $sql);

/* TOTAL HORAS */
$total = 0;
while($fila = mysqli_fetch_assoc($resultado)){
    $total += $fila['horas'];
}

/* VOLVER A CONSULTAR (porque el anterior se consumió) */
$resultado = mysqli_query($conexion, $sql);

/* CREAR PDF */
$pdf = new FPDF();
$pdf->AddPage();

/* LOGO (opcional) */
$pdf->Image('logo.png', 10, 10, 30); // coloca tu logo en la carpeta

$pdf->Ln(20);

/* TÍTULO */
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'CERTIFICADO DE SERVICIO SOCIAL',0,1,'C');

$pdf->Ln(5);

/* TEXTO */
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,8,"Se certifica que el estudiante $usuario ha cumplido con las actividades de Servicio Social, registrando un total de $total horas aprobadas, de acuerdo con los lineamientos institucionales.",0,'C');

$pdf->Ln(10);

/* TABLA */
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10,'Horas',1);
$pdf->Cell(40,10,'Fecha',1);
$pdf->Cell(120,10,'Actividad',1);
$pdf->Ln();

$pdf->SetFont('Arial','',11);

while($fila = mysqli_fetch_assoc($resultado)){
    $pdf->Cell(30,10,$fila['horas'],1);
    $pdf->Cell(40,10,$fila['fecha'],1);
    $pdf->Cell(120,10,utf8_decode($fila['actividad']),1);
    $pdf->Ln();
}

/* TOTAL */
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Total de horas aprobadas: '.$total,0,1);

/* FECHA */
$pdf->Ln(5);
$pdf->Cell(0,10,'Fecha de generación: '.date('d/m/Y'),0,1);

/* FIRMA */
$pdf->Ln(15);
$pdf->Cell(0,10,'_____________________________',0,1,'C');
$pdf->Cell(0,5,'Coordinador Servicio Social',0,1,'C');

/* DESCARGAR */
$pdf->Output('D','Certificado_Servicio_Social.pdf');
?>
