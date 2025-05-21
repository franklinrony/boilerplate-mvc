<?php
declare(strict_types=1);

namespace pdes\tests\paquete_a;

use pdes\paquete_a\ArchivoA;
use pdes\tests\BaseTestCase;

class ArchivoATest extends BaseTestCase
{
    public function testGetSetName(): void
    {
        $archivoA = new ArchivoA();
        $testName = "Test Name";
        $archivoA->setName($testName);
        $this->assertSame($testName, $archivoA->getName());
    }

    public function testGetSetApellidos(): void
    {
        $archivoA = new ArchivoA();
        $testApellidos = "Test Apellidos";
        $archivoA->setApellidos($testApellidos);
        $this->assertSame($testApellidos, $archivoA->getApellidos());
    }
}
