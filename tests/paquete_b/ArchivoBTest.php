<?php
declare(strict_types=1);

namespace pdes\tests\paquete_b;

use pdes\paquete_b\ArchivoB;
use pdes\tests\BaseTestCase;

class ArchivoBTest extends BaseTestCase
{
    public function testGetSetA(): void
    {
        $archivoB = new ArchivoB();
        $testValue = "Test Value A";
        $archivoB->setA($testValue);
        $this->assertSame($testValue, $archivoB->getA());
    }
}
