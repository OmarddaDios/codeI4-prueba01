<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
    <h1>Login</h1>
    <br>
    <?= session('hellothere'); ?>
    <br>
    <?= view('partials/_formerrors.php'); ?>
    <br>
<form action="<?= route_to('usuario.login_post')?>" method="post">
<label for="email">Email/Usuario</label>    
<input type="text" name="email" id="">
<br>
<label for="contrasena">Contrasena</label>    
<input type="password" name="contrasena" id="">
<br>
<input type="submit" value="Enviar">
<br>
<a href="/register">Registrarse</a>
</form>
    
</body>
</html>