<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title></title>
</head>

<body class="bg-secondary-subtle">
    <div class="d-flex justify-content-center mt-5">
        <div class="d-flex justify-align-content-around ">
            <a class="btn btn-outline-success me-2" href="/hqs/formhq">Ver Cadastro</a>
            <a class="btn btn-outline-success me-2" href="/hqs">Ver Lista</a>
        </div>
    </div>
</body>

</html>

<?php

include 'Controller/ControllerHQ.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//echo $url;
//echo "<br>";

switch ($url) {

    case '/':
        echo "🏡";
        break;

    case "/hqs":
        echo "😒";
        ControllerHQ::index();
        break;

    case '/hqs/formhq':
        echo "😂";
        ControllerHQ::form();
        break;

    case '/hqs/formhq/save':
        ControllerHQ::save();
        break;

    case '/hqs/delete':
        ControllerHQ::delete();
        break;

    default:
        echo "<br>erro 404";
        break;
}