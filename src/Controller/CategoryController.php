<?php


namespace App\Controller;

use App\model\Category;
use Exception;

use Symfony\Component\HttpFoundation\Session\Session;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class CategoryController extends MainController
{
    private Environment $twig;
    private Session $session;

    public function __construct()
    {
        $this->session = new Session();
        $this->twig = parent::getTwig();
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function show()
    {
        $categoryList = Category::retrieveCategoryList();
        echo $this->twig->render(
            'category/listCategoryView.html.twig',
            [ 'Cat_list' => $categoryList,'Session' => $this->session->all()]
        );
    }

    /**
     * @param string $category
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showCat(string $category)
    {

        $articleFromCat = Category::retrieveSingleCategory($category);
        echo $this->twig->render(
            'category/singleCategoryView.html.twig',
            [ 'Art_fromCat' => $articleFromCat ,'Session' => $this->session->all()]
        );
    }
}
