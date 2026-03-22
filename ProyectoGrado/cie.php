<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CIE</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="dashboard-container">

    <div class="dashboard-header">
        Módulo CIE
    </div>

    <div class="dashboard-body">

        <h3>Tareas disponibles</h3>

        <ul>
            <li>Migración de cursos</li>
            <li>Revisión de diseños</li>
            <li>Apoyo en contenidos educativos</li>
        </ul>

  <p><strong>Adjuntar evidencia:</strong></p>

          
<form action="subir_archivo.php" method="POST" enctype="multipart/form-data">

    <br><br>

    <button type="submit" class="btn-verde">
        Subir evidencias
    </button>

</form>

    <label class="btn-verde">
        Seleccionar archivos
        <input type="file" name="archivo[]" multiple hidden required>
    </label>

    <br><br>

</form>

       <?php if(isset($archivo_subido)){ ?>
    <p>📄 Archivo subido:</p>
    <a href="uploads/<?php echo $archivo_subido; ?>" target="_blank" class="btn-verde">
        Ver evidencia
    </a>
<?php } ?> 

                <a href="pagos.php" class="btn-volver">Volver a disponibilidades</a>
    </div>

</div>

</body>
</html>

  
