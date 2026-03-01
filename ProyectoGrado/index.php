<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Portal Estudiantil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
    <script>
    setTimeout(function(){
        alert("Sesión cerrada por inactividad");
        window.location.href = "logout.php";
    }, 300000); // 5 minutos
</script>
<body>

<div class="login-container">
    <div class="login-header">
        Portal Estudiantil
    </div>

    <div class="login-body">
        <form action="login.php" method="POST">
            <div class="input-group">
                <input type="text" name="identificacion" placeholder=" " required>
                <label>Identificación</label>
            </div>

            <div class="input-group">
                <input type="password" name="contrasena" placeholder=" " required>
                <label>Contraseña</label>
            </div>

            <button type="submit" class="btn-login">ENTRAR</button>
        </form>

        <p class="info-text">
            Si olvidó la contraseña, comuníquese con la oficina de Admisiones y Registro Académico
        </p>

        <div class="links">
            <a href="#">Grado por ventanilla</a>
            <a href="#">grado privado</a>
        </div>
    </div>
</div>

</body>
</html>

