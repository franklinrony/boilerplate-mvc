<?php
declare(strict_types=1);

namespace pdes\tests\model\vo;

use pdes\model\vo\Usuario;
use pdes\tests\BaseTestCase;

class UsuarioTest extends BaseTestCase
{
    public function testGetSetNombres(): void
    {
        $usuario = new Usuario();
        $testNombres = "John";
        $usuario->setNombres($testNombres);
        $this->assertSame($testNombres, $usuario->getNombres());
    }

    public function testGetSetApellidos(): void
    {
        $usuario = new Usuario();
        $testApellidos = "Doe";
        $usuario->setApellidos($testApellidos);
        $this->assertSame($testApellidos, $usuario->getApellidos());
    }

    public function testGetSetEdad(): void
    {
        $usuario = new Usuario();
        $testEdad = 30;
        $usuario->setEdad($testEdad);
        $this->assertSame($testEdad, $usuario->getEdad());
    }

    public function testGetSetEmail(): void
    {
        $usuario = new Usuario();
        $testEmail = "john.doe@example.com";
        $usuario->setEmail($testEmail);
        $this->assertSame($testEmail, $usuario->getEmail());
    }

    public function testGetSetUsuario(): void
    {
        $usuario = new Usuario();
        $testUsuario = "johndoe";
        $usuario->setUsuario($testUsuario);
        $this->assertSame($testUsuario, $usuario->getUsuario());
    }

    public function testGetSetPassword(): void
    {
        $usuario = new Usuario();
        $testPassword = "securepassword123";
        $usuario->setPassword($testPassword);
        $this->assertSame($testPassword, $usuario->getPassword());
    }
}
