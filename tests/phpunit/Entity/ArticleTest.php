<?php

namespace Entity;

use App\Entity\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testArticleIsValidWithoutImg()
    {
        $this->assertInstanceOf(
            Article::class,
            Article::fromString('user', 'titre', 'blah', 'truck', 5)
        );
    }

    public function testArticleIsValidWithImg()
    {
        $this->assertInstanceOf(
            Article::class,
            Article::fromString('user', 'titre', 'blah', 'truck', 5, 'http://www.tavu.jpg')
        );
    }

    public function testArticleIsInvalid()
    {
        $this->expectException(\Exception::class);
        Article::fromString('', '', '', '', 25);
    }

    public function testStringCannotBeEmpty()
    {
        $this->expectException(\Exception::class);
        Article::fromString('', '', '', '', 5);
    }
}
