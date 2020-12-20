<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\User;

class UserTest extends TestCase
{
    public function testUser()
    {
        $usuario = new User();
        $usuario->setEmail('mail@prueba.com');
        $usuario->setPassword('password');
        $usuario->setAdministrador(TRUE);
        $this->assertEquals($usuario->getAdministrador(), TRUE);
    }
    
    public function testRoles()
    {
        $usuario = new User();
        $usuario->setEmail('mail@prueba.com');
        $usuario->setPassword('password');
        $usuario->setAdministrador(TRUE);
        $this->assertContains('ROLE_ADMIN', $usuario->getRoles());
    }
}
