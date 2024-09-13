<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/login.css" rel="stylesheet" />
        <link href="https://icons.getbootstrap.com/assets/font/bootstrap-icons.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="validar_login.php" method="post">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="nombreUsuario" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="contrasena" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="btn">Ingresar</button>
        </form>
    </div>
</body>
</html>