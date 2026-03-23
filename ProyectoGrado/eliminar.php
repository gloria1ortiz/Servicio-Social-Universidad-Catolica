<?php
session_start();

if(isset($_GET['archivo'])){

    $archivo = $_GET['archivo'];
    $ruta = "uploads/" . $archivo;

    // Borrar archivo físico
    if(file_exists($ruta)){
        unlink($ruta);
    }

    // Borrar de la sesión
    if(($key = array_search($archivo, $_SESSION['archivos'])) !== false){
        unset($_SESSION['archivos'][$key]);
    }

    header("Location: cie.php");
    exit();
}
?>
