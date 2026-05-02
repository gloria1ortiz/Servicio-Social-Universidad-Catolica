<?php
session_start();
include("conexion.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $tipo = $_GET['tipo'];

    // BUSCAR ARCHIVO
    $sql = "SELECT archivo FROM evidencias WHERE id='$id'";
    $res = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($res);

    if($fila){
        $archivo = $fila['archivo'];

        // BORRAR ARCHIVO FÍSICO
        $ruta = "uploads/" . $archivo;
        if(file_exists($ruta)){
            unlink($ruta);
        }

        // BORRAR DE LA BD
        mysqli_query($conexion, "DELETE FROM evidencias WHERE id='$id'");
    }

    $_SESSION['mensaje'] = "🗑 Archivo eliminado correctamente";

    // REDIRIGIR SEGÚN MÓDULO
    header("Location: " . $tipo . ".php");
    exit();
}
?>
