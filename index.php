<?php


    require_once(dirname(__FILE__)."/vendor/autoload.php");



    use App\Routing\Router;
    use Symfony\Component\HttpFoundation\Request;
    use App\Controller\ErrorController;

    $request = Request::createFromGlobals();

    $url = $request->get('url');

    $router = new Router($url);

    $router->get('/', "Posts#showPostList");

    $router->get('/postAdd', 'Posts#showAddPost');
    $router->get('/post/:id', "Posts#show");


    $router->get('/login', "Login#get_logView");
    $router->get('/signup', 'Login#get_signView');
    $router->get('/logout', 'Login#logOut');

    $router->get('/category', 'Category#show');
    $router->get('/category/:category', 'Category#showCat');


    $router->post('/login/logUser', 'Login#logUser');
    $router->post('/signup/signUser', 'Signup#signUp');

    $router->post('/addPost', 'Posts#addPost');

    try {
        $router->run();
    } catch (\Exception $e) {
        $error = new ErrorController();
        $error->get404($e->getMessage());
    }
