<?php

namespace Tests;

use Src\domain\Cpf;
use Src\domain\Email;
use PHPUnit\Framework\TestCase;
use Src\domain\student\Student;

class StudentTest extends TestCase
{
    private Student $student;

    protected function setup(): void
    {
        $this->student = new Student(
            $this->createStub(Cpf::class),
            '',
            $this->createStub(Email::class),
        );
    }

    public function testAdicionarMaisDe2TelefonesDeveLancarExcecao()
    {
        $this->expectException(\DomainException::class);

        $this->student->addPhone('91', '988477731');
        $this->student->addPhone('91', '988477737');
        $this->student->addPhone('91', '988477738');
    }

    public function testAdicionar1TelefoneDeveFuncionar()
    {
        $this->student->addPhone('91', '988477731');

        $this->assertCount(1, $this->student->getPhones());
    }

    public function testAdicionar2TelefoneDeveFuncionar()
    {
        $this->student->addPhone('91', '988477731');
        $this->student->addPhone('91', '988477751');

        $this->assertCount(2, $this->student->getPhones());
    }
}