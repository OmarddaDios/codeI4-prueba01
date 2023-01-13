<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="/categoria/update/<?= $categorias['id'] ?>" method="post">
        <label for="titulo">Tittle</label>
        <input type="text" name="titulo" id="titulo" value="<?= $categorias['titulo'] ?>">
        <br>
        <button type="submit">Send</button>
    </form>
</body>
</html>