<div class="login-container">

    <div class="login-header">
        CIE
    </div>

    <div class="login-body">

        <p>Migración de cursos y revisión de contenidos</p>

        <!--  AQUÍ VA EL FORMULARIO -->
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

        <!--  BOTÓN DE VOLVER -->
        <div style="text-align:center; margin-top:20px;">
            <a href="pagos.php" class="btn-volver">⬅ Volver a disponibilidades</a>
        </div>
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
    </div>
</div>
