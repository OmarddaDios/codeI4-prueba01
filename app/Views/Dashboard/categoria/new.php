<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En blanco</title>
</head>
<body>
    <br>
    <?= view('partials/_formerrors.php') ?>
    <form action="/dashboard/categoria/create" method="post">
        <label for="id">ID</label>    
        <input type="number" name="id" id="ID" value="<?= old('id')?>">
        <br>
        <label for="titulo">Tittle</label>
        <input type="text" name="titulo" id="titulo" value="<?= old('titulo')?>">
        <br>
        <button type="submit">Send</button>
    </form>
</body>
</html>