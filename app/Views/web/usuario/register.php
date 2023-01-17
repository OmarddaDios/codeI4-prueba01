<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de sesion</title>
</head>
<body>
    <h1>Registro</h1>
    <br>

    <br>
     <?= view('partials/_formerrors.php'); ?> 
    <br>
<form action="<?= route_to('usuario.register_post')?>" method="post">
<label for="usuario">Usuario</label>    
<input type="text" name="usuario" id="">
<br>
<label for="email">Email</label>    
<input type="text" name="email" id="">
<br>
<label for="contrasena">Contrasena</label>    
<input type="password" name="contrasena" id="">
<input type="submit" value="Enviar">

</form>
    
</body>
</html>