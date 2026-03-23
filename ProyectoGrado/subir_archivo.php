<?php
session_start();

if (isset($_FILES['archivo'])) {
    // Crear carpeta uploads si no existe
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    $archivo = $_FILES['archivo'];
    $nombre = $archivo['name'];
    $tmp = $archivo['tmp_name'];
    $tipo = $archivo['type'];

    if ($nombre != "") {
        $nombre_limpio = str_replace(" ", "_", $nombre);
        $nombre_nuevo = time() . "_" . $nombre_limpio;
        $ruta_destino = __DIR__ . "/uploads/" . $nombre_nuevo;

        $tipos_permitidos = ["application/pdf", "image/jpeg", "image/png"];
        if (in_array($tipo, $tipos_permitidos)) {
            if (move_uploaded_file($tmp, $ruta_destino)) {
                // Guardar en sesión
                if (!isset($_SESSION['archivos'])) {
                    $_SESSION['archivos'] = [];
                }
                $_SESSION['archivos'][] = $nombre_nuevo;
                $_SESSION['mensaje'] = "✅ Archivo subido correctamente.";
            } else {
                $_SESSION['mensaje'] = "❌ Error al mover el archivo.";
            }
        } else {
            $_SESSION['mensaje'] = "⚠️ Tipo de archivo no permitido (solo PDF, JPG, PNG).";
        }
    } else {
        $_SESSION['mensaje'] = "❌ No se seleccionó ningún archivo.";
    }
} else {
    $_SESSION['mensaje'] = "❌ No llegaron archivos.";
}

// Redirigir de vuelta al módulo CIE
header("Location: cie.php");
exit();
?>
