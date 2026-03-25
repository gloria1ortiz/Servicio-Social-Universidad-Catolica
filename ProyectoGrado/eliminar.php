<?php
session_start();

if(isset($_GET['archivo'])){

    $archivo = $_GET['archivo'];

    // BORRAR DEL ARRAY
    foreach($_SESSION['evidencias'] as $key => $e){
        if($e['archivo'] == $archivo){
            unset($_SESSION['evidencias'][$key]);
        }
    }

    // BORRAR ARCHIVO FÍSICO
    $ruta = "uploads/" . $archivo;
    if(file_exists($ruta)){
        unlink($ruta);
    }

    $_SESSION['mensaje'] = "🗑 Archivo eliminado correctamente";
}

header("Location: cie.php");
exit();
