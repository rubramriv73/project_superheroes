<!doctype html>
    <html lang="es">
        <head> 
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="Rubén Ramírez Rivera">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <title>SuperHeroes</title>
        </head>
        <body>
        <header>
            <?php include('nav_view.php')?>
        </header>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">EVOLUCION</th>
                <th scope='col'>EDITAR</th>
                <th scope='col'>BORRAR</th>
                </tr>
            </thead>
            <tbody>
            <?php

                foreach ($data as $hero) {
                    echo '<tr>';
                    echo "<th scope='row'>".$hero['id']. "</th>";
                    echo "<td>" . $hero['nombre']. " </td>";
                    echo "<td>" . $hero['evolucion']. " </td>";
                    echo "<td><a class='btn btn-success' href='edit/" . $hero['id']."'>Editar</a></td>";
                    echo "<td><a class='btn btn-danger' href='superheroes/del/" . $hero['id']."'>Borrar</a></td>";
                    echo '</tr>';
                }
            ?>
            </tbody>
        </body>
    </html>