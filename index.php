<?php


    require_once(dirname(__FILE__)."/vendor/autoload.php");



    use App\Routing\Router;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\Session;
    use App\Controller\ErrorController;

    $request = Request::createFromGlobals();
    $url = $request->get('url');

    $router = new Router($url);

    $router->get('/', "Posts#showPostList");

    $router->get('/login', "Login#get_logView");

    $router->get('/signup', 'Login#get_signView');

    $router->get('/postAdd', 'Posts#showAddPost');

    $router->get('/post/:id', "Posts#show");

    $router->get('/post', "Posts#showPostList");

    $router->post('/login/logUser', 'Login#logUser');

    $router->get('/logout', 'Login#logOut');

try {
    $router->run();
} catch (\Exception $e) {

    $error = new ErrorController();
    $error->get404();

}
