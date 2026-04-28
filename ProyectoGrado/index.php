<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Portal Estudiantil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="login-container">
    <div class="login-header">Portal Estudiantil</div>
    <div class="login-body">
       <form method="POST" action="ProyectoGrado/login.php">
    
    <input type="text" name="identificacion" placeholder="Identificación" required>
    
    <input type="password" name="password" placeholder="Contraseña" required>
    
    <button type="submit" name="login">ENTRAR</button>

</form>
        <p class="info-text">
            Si olvidó la contraseña, comuníquese con la oficina de Admisiones y Registro Académico
        </p>
    </div>
</div>

</body>
</html>
