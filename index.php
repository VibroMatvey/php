<?php
require 'shared/Manager.php';
require 'shared/Router.php';

$manager = new Manager();
$router = new Router($_SERVER['REQUEST_URI']);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/index.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.js"></script>
    <title><?= $router->getTitle() ?></title>
</head>
<body>
<div style="background: #eeeeee" class="h-100">
    <main class="container-lg h-100 bg-white">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
        </ul>
        <?php
        $router->getRoute()
        ?>
    </main>
</div>
</body>
</html>
