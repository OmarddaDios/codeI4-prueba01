<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>
<body>
    <h1>Listado de Peliculas</h1>
    <br>
    <?= view('partials/_session.php'); ?>
    <br>
    <a href="/dashboard/pelicula/new/">Crear</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Opciones</th>
        </tr>
     <?php foreach ($peliculas as $key => $value) : ?>
        <tr>
            <td><?= $value['id'] ?></td>
            <td><?= $value['titulo'] ?></td>
            <td><?= $value['descripcion'] ?></td>
            
            <td>
                <a href="/dashboard/pelicula/show/<?= $value['id'] ?>">Show</a>
                <a href="/dashboard/pelicula/edit/<?= $value['id'] ?>">Edit</a>
                <form action="/dashboard/pelicula/delete/<?= $value['id'] ?>" method="post">
                    <button type="submit">Delete</button>
                </form>
            </td>
            <?php endforeach ?>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
</body>
</html>