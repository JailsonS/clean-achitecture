<?php
namespace Src\domain\student;

use Src\domain\Cpf;
use Src\domain\Email;
use Src\domain\student\Phone;
use Src\domain\student\Student;


// named constructor pattern
class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;
    private array $phones;

    public function __construct(Cpf $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }

    public static function withCpfNameEmail(string $cpf, string $name, string $email): self
    {
        $cpf = new Cpf($cpf);
        $email = new Email($email);

        return new Student($cpf, $name, $email);
    }

    public function addPhone(string $ddd, string $number): self
    {
        if(count($this->phones) === 2) {
            throw new \DomainException('Aluno já possui 2 telefones!');
        }

        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }

    public function getCpf(): Cpf
    {
        return $this->cpf;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /** @return Phone[] */
    public function getPhones(): array
    {
        return $this->phones;
    }
}