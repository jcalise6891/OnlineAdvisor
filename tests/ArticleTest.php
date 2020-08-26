<?php

use App\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testArticleIsValidWithoutImg()
    {
        $this->assertInstanceOf(
            Article::class,
            Article::fromString('user', 'Blah', 5)
        );
    }

    public function testArticleIsValidWithImg()
    {
        $this->assertInstanceOf(
            Article::class,
            Article::fromString('user', 'blah', 6, 'http://tavu.com')
        );
    }

    public function testArticleIsInvalid()
    {
        $this->expectException(\Exception::class);
        Article::fromString('', '', 25);
    }

    public function testStringCannotBeEmpty()
    {
        $this->expectException(\Exception::class);
        Article::fromString('', '', 5);
    }
}
