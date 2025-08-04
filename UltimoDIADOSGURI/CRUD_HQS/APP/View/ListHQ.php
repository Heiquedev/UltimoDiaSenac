<?php

echo "Aqui deveria ter uma lista.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Lista de Pessoas</title>
</head>

<body class="bg-secondary-subtle">

    <h2 class="d-flex justify-content-center mt-5">Lista de HQ's</h2>
    <div class="d-flex justify-content-center mt-5">
        <table class="table table-striped table-hover w-50">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Gênero</th>
                    <th>Autor</th>
                    <th>Capítulos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php foreach ($model->rows as $item): ?>
                <tbody>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $item->nome ?></td>
                        <td><?= $item->genero ?></td>
                        <td><?= $item->autor ?></td>
                        <td><?= $item->capitulos ?></td>
                        <td>
                            <a class="btn btn-danger" href="/hqs/delete?id=<?= $item->id ?>">Deletar</a>
                            <a class="btn btn-dark" href="/hqs/formhq?id=<?= $item->id ?>">Editar</a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary w-25" href="/hqs/formhq">Adicionar novo HQ</a>
    </div>

    <div class="position-absolute bottom-0 w-100">
        <hr>
        <p class="d-flex justify-content-center">Essa página foi feita pelo dev Heique R. Fuck. Direitos Reservados.</p>
    </div>

</body>

</html>