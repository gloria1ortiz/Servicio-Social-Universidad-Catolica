<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("conexion.php");

/* VALIDAR SESIÓN */
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

/* USUARIO */
$usuario = $_SESSION['usuario'];

/* IMPORTAR FPDF */
require('fpdf.php');

/* CONSULTAR HORAS APROBADAS */
$sql = "SELECT * FROM horas 
        WHERE usuario='$usuario' AND estado='aprobado'";
$resultado = mysqli_query($conexion, $sql);

/* CREAR PDF */
$pdf = new FPDF();
$pdf->AddPage();

/* LOGO (OPCIONAL) */
if(file_exists('logo.png')){
    $pdf->Image('logo.png', 10, 10, 30);
}

$pdf->Ln(20);

/* TÍTULO */
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'REPORTE DE SERVICIO SOCIAL',0,1,'C');

$pdf->Ln(5);

/* USUARIO */
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'Usuario: '.$usuario,0,1);

/* ENCABEZADO TABLA */
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10,'Horas',1);
$pdf->Cell(40,10,'Fecha',1);
$pdf->Cell(120,10,'Actividad',1);
$pdf->Ln();

/* DATOS */
$pdf->SetFont('Arial','',11);

$total = 0;

while($fila = mysqli_fetch_assoc($resultado)){
    $pdf->Cell(30,10,$fila['horas'],1);
    $pdf->Cell(40,10,$fila['fecha'],1);
    $pdf->Cell(120,10,utf8_decode($fila['actividad']),1);
    $pdf->Ln();

    $total += $fila['horas'];
}

/* TOTAL */
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Total de horas aprobadas: '.$total,0,1);

/* FECHA */
$pdf->Cell(0,10,'Fecha: '.date('d/m/Y'),0,1);

/* DESCARGAR PDF */
$pdf->Output('D','Reporte_Horas.pdf');
?>
