<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En blanco</title>
</head>
<body>
    <form action="/pelicula/create" method="post">
        <label for="titulo">Tittle</label>
        <input type="text" name="titulo" id="titulo">
        <br>
        <label for="descripcion">Description</label>
        <input type="textarea" name="descripcion" id="descripcion">
        <br>
        <button type="submit">Send</button>
    </form>
</body>
</html>