<?php

if(isset($_FILES['archivo'])){

    $archivo = $_FILES['archivo']['name'];
    $ruta_temporal = $_FILES['archivo']['tmp_name'];
    $tipo = $_FILES['archivo']['type'];

    // Crear carpeta si no existe
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    // Renombrar archivo
    $nombreNuevo = time() . "_" . $archivo;
    $ruta_destino = "uploads/" . $nombreNuevo;

    // Validar tipo
    if($tipo == "application/pdf" || 
       $tipo == "image/jpeg" || 
       $tipo == "image/png"){

        if(move_uploaded_file($ruta_temporal, $ruta_destino)){
            echo "<h3>✅ Archivo subido correctamente</h3>";
            echo "<br>";
            echo "<a href='pagos.php' class='btn-verde'>⬅ Volver a disponibilidades</a>";
        } else {
            echo "❌ Error al subir archivo";
        }

    } else {
        echo "⚠️ Solo se permiten PDF o imágenes";
    }

} else {
    echo "❌ No se recibió archivo";
}

?>
