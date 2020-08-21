<?php 
    require_once "./vendor/autoload.php";
    require_once "./src/assets/php/header.php";

    use App\Router;

    $router = new Router($_GET['url']);

    $router->get('/login',function(){

    });

 ?>

<?php
    require_once "./src/assets/php/footer.php"
 ?>
