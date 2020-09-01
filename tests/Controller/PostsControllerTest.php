<?php

namespace Controller;

use App\Controller\PostsController;
use PHPUnit\Framework\TestCase;

class PostsControllerTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testIDisInvalid()
    {
        $this->expectException(\InvalidArgumentException::class);
        PostsController::show('test');
    }
}
