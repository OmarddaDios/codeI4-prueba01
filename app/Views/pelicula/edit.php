<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emdit</title>
</head>
<body>
    <form action="/pelicula/update/<?= $pelicula['id'] ?>" method="post">
        <label for="titulo">Tittle</label>
        <input type="text" name="titulo" id="titulo" value="<?= $pelicula['titulo'] ?>">
        <br>
        <label for="descripcion">Description</label>
        <input type="textarea" name="descripcion" id="descripcion" value="<?= $pelicula['descripcion'] ?>">
        <br>
        <button type="submit">Send</button>
    </form>
</body>
</html>