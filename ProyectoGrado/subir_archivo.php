<?php
if(isset($_FILES['archivo'])){

    $archivo = $_FILES['archivo']['name'];
    $ruta_temporal = $_FILES['archivo']['tmp_name'];

    // Carpeta donde se guardará
    $ruta_destino = "uploads/" . $archivo;

    // Mover archivo
    if(move_uploaded_file($ruta_temporal, $ruta_destino)){
        echo "Archivo subido correctamente<br>";
        echo "<a href='pagos.php'>Volver</a>";
    } else {
        echo "Error al subir archivo";
    }
}
?>
