<?php
session_start();

if(isset($_FILES['archivo'])){

    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    foreach($_FILES['archivo']['name'] as $key => $nombre){

        $tmp = $_FILES['archivo']['tmp_name'][$key];
        $nombre_limpio = str_replace(" ", "_", $nombre);
        $nuevo_nombre = time() . "_" . $nombre_limpio;

        $ruta = "uploads/" . $nuevo_nombre;

        if(move_uploaded_file($tmp, $ruta)){

            $_SESSION['evidencias'][] = [
                "modulo" => $_POST['modulo'],
                "archivo" => $nuevo_nombre
            ];

        }
    }

    $_SESSION['mensaje'] = "✅ Archivo(s) subido(s) correctamente";
}

header("Location: cie.php");
exit();
