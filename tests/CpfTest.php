<?php
namespace Tests;

use Src\domain\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{

    public function testCPFComFormatoInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf('0255232214');
    }

    public function testCPFDevePoderSerRepresentadoComoString()
    {
        $cpf = new Cpf('025.523.272-14');
        $this->assertSame('025.523.272-14', (string) $cpf);
    }

}