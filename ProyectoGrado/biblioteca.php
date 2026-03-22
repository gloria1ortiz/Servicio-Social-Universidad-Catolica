<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="dashboard-container">

    <div class="dashboard-header">
        Módulo Biblioteca
    </div>

    <div class="dashboard-body">

        <h3>Tareas disponibles</h3>

        <ul>
            <li>Entrega de libros</li>
            <li>Organización de estanterías</li>
            <li>Cuidado de la biblioteca</li>
        </ul>
 <p><strong>Adjuntar evidencia:</strong></p>

        <form action="subir_archivo.php" method="POST" enctype="multipart/form-data">
            
            <label class="btn-verde">
    Seleccionar archivo
    <input type="file" name="archivo" hidden required>
</label>
      
<form action="subir_archivo.php" method="POST" enctype="multipart/form-data">
    
    <label>Subir evidencia (PDF o imagen):</label><br><br>
    
    <input type="file" name="archivo" required><br><br>
    
    <button type="submit">Subir evidencia</button>

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
