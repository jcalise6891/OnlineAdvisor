<?php

 require_once(dirname(__FILE__)."/vendor/autoload.php");
    require_once(dirname(__FILE__) . "/assets/php/header.php");

    use App\Routing\Router;

    $router = new Router($_GET['url']);

    $router->get('/', function () {
        require_once('index.php');
    });

    $router->get('/login', function () {
        require_once(__DIR__.'\src\view\loginView.php');
    });

    $router->get('/signup', function () {
        require_once(__DIR__.'\src\view\signupView.php');
    });

    $router->get('/post/:id', function ($id) {
        echo 'display the article number : '.$id;
    });

    $router->run();

 ?>

<?php
require_once "./assets/php/footer.php"
 ?>
