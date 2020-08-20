<?php

use App\Connexion;
use PHPUnit\Framework\TestCase;

class ConnexionTest extends TestCase{

    public function testDouble(){

        $this->assertEquals(4,Connexion::double(2));
    }
}
