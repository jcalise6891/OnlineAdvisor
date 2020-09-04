<?php

namespace App\Controller;

use App\model\PostList;
use Exception;

use Symfony\Component\HttpFoundation\Session\Session;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class PostsController extends MainController
{
    private Environment $twig;
    private $session;

    public function __construct()
    {
        $this->twig = parent::getTwig();
        $this->session = new Session();
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
}
