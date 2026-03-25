<?php
session_start();

if(isset($_FILES['archivo']) && isset($_POST['modulo'])){

    $modulo = $_POST['modulo'];

    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    $total = count($_FILES['archivo']['name']);

    for($i = 0; $i < $total; $i++){

        $archivo = $_FILES['archivo']['name'][$i];
        $ruta_temporal = $_FILES['archivo']['tmp_name'][$i];
        $tipo = $_FILES['archivo']['type'][$i];

        if($archivo != ""){

            $archivo_limpio = str_replace(" ", "_", $archivo);
            $nombreNuevo = time() . "_" . $archivo_limpio;

            $ruta_destino = "uploads/" . $nombreNuevo;

            if($tipo == "application/pdf" || 
               $tipo == "image/jpeg" || 
               $tipo == "image/png"){

                if(move_uploaded_file($ruta_temporal, $ruta_destino)){

                    // 👇 GUARDAR ARCHIVO + MÓDULO
                    $_SESSION['evidencias'][] = [
                        'archivo' => $nombreNuevo,
                        'modulo' => $modulo
                    ];
                }
            }
        }
    }

    header("Location: cie.php");
    exit();
}
?>
