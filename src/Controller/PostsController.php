<?php

namespace App\Controller;

use App\model\ConnexionDB;
use App\model\PostList;
use App\Entity\Article;
use App\model\AddPost;

use Exception;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class PostsController extends MainController
{
    private Environment $twig;
    private Session $session;
    private Request $request;

    public function __construct()
    {
        $this->twig = parent::getTwig();
        $this->session = new Session();
        $this->request = Request::createFromGlobals();
    }


    /**
     * @param $id
     * @throws Exception if Article is invalid
     */
    public function show($id)
    {
        $article = PostList::retrieveSinglePost($id);
        $comments = PostList::retrieveCommentList($id);

        echo $this->twig->render(
            'post/singlePostView.html.twig',
            ['Article' => $article , 'Comments' => $comments, 'Session'=> $this->session->all()]
        );
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showPostList()
    {
        $articles = PostList::retrievePostList();

        echo $this->twig->render('post/listPostView.html.twig', ['Article' => $articles, 'Session' => $this->session->all()]);
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showAddPost()
    {
        echo $this->twig->render('post/postAddView.html.twig', ['Session' => $this->session->all()]);
    }

    /**
     * @throws Exception
     */
    public function addPost()
    {
        try {
            if (is_string($this->request->get('submit'))) {
                $currentUser = $this->session->get('user');

                $newArticle = new Article(
                    $currentUser->get_UserMail(),
                    $this->request->get('title'),
                    $this->request->get('content'),
                    $this->request->get('category'),
                    $this->request->get('note'),
                );
                $connexion = new ConnexionDB(
                    'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
                    "root",
                    "root"
                );
                $db = $connexion->openCon();
                header('location: ../../../../OnlineAdvisor/');
                return AddPost::AddNewArticle($newArticle, $db);
            } else {
                throw new Exception('Ouech t\'a cru quoi ?');
            }
        } catch (Exception $e) {
            echo 'Exception : ', $e->getMessage(), "<br>";
        }
    }
}
