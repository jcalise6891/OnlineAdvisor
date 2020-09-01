<?php

namespace Model;

use App\model\ConnexionDB;
use PHPUnit\Framework\TestCase;

class ConnexionDBTest extends TestCase
{
    public function testDsnIsValid()
    {
        $this->assertInstanceOf(
            ConnexionDB::class,
            ConnexionDB::fromString(
                'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
                'root',
                'root'
            )
        );
    }

    /**
     * @throws \InvalidArgumentException In case of invalid DSN
     */

    public function testDsnIsInvalid()
    {
        $this->expectException(\InvalidArgumentException::class);
        ConnexionDB::fromString(
            'mysql:host=localhost;dbnames=online_advisor',
            'root',
            'root'
        );
    }
}
