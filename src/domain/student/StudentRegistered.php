<?php
namespace Src\domain\student;

use Src\domain\Event;

class StudentRegistered implements Event
{

    private \DateTimeImmutable $moment;
    private Cpf $cpfStudent;

    public function __construct(Cpf $cpfStudent)
    {
        $this->moment = new \DateTimeImmutable();
        $this->cpfStudent = $cpfStudent;
    }

    public function cpfStudent(): Cpf 
    {
        return $this->cpfStudent;
    }

    public function moment(): \DateTimeImmutable
    {
        return $this->moment;
    }
}