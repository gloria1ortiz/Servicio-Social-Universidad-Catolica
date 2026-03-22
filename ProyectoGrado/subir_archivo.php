<?php

if(isset($_FILES['archivo'])){

    // Crear carpeta si no existe
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    $total = count($_FILES['archivo']['name']);

    for($i=0; $i < $total; $i++){

        $archivo = $_FILES['archivo']['name'][$i];
        $ruta_temporal = $_FILES['archivo']['tmp_name'][$i];
        $tipo = $_FILES['archivo']['type'][$i];

        // Limpiar nombre
        $archivo_limpio = str_replace(" ", "_", $archivo);
        $nombreNuevo = time() . "_" . $archivo_limpio;

        $ruta_destino = "uploads/" . $nombreNuevo;

        // Validar tipo
        if($tipo == "application/pdf" || 
           $tipo == "image/jpeg" || 
           $tipo == "image/png"){

            move_uploaded_file($ruta_temporal, $ruta_destino);
        }
    }

    echo "<h3>✅ Evidencias subidas correctamente</h3>";
    echo "<a href='cie.php' class='btn-verde'>⬅ Volver a CIE</a>";

} else {
    echo "❌ No se recibieron archivos";
}

?>
