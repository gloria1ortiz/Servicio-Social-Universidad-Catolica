<?php

if(isset($_FILES['archivo'])){

    $archivo = $_FILES['archivo']['name'];
    $ruta_temporal = $_FILES['archivo']['tmp_name'];
    $tipo = $_FILES['archivo']['type'];

    // Renombrar archivo (opcional pero recomendado)
    $nombreNuevo = time() . "_" . $archivo;

    if (!file_exists("uploads")) {
    mkdir("uploads", 0777, true);
}
    // Ruta donde se guarda
    $ruta_destino = "uploads/" . $nombreNuevo;

    // VALIDACIÓN DE TIPO
    if($tipo == "application/pdf" || 
       $tipo == "image/jpeg" || 
       $tipo == "image/png"){

        if(move_uploaded_file($ruta_temporal, $ruta_destino)){
            echo "Archivo subido correctamente<br><br>";
            echo "<a href='pagos.php'>Volver</a>";
        } else {
            echo "Error al subir archivo";
        }

    } else {
        echo "Solo se permiten PDF o imágenes";
    }
    if(file_exists($ruta_destino)){
    unlink($ruta_destino); // borra el anterior
}
<form action="subir_archivo.php" method="POST" enctype="multipart/form-data">

    <label class="btn-verde">
        Seleccionar archivo
        <input type="file" name="archivo" hidden required>
    </label>

    <br><br>

    <button type="submit" class="btn-verde">
        Subir evidencia
    </button>

</form>
}

?>
