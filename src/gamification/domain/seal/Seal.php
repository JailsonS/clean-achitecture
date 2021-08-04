<?php
namespace Src\domain\seal;

class Seal
{
    private Cpf $cpf;
    private string $name;

    public function __construct(Cpf $cpfStudent, string $name)
    {
        $this->cpf = $cpfStudent;
        $this->name = $name;
    }

    public function getCpfStudent(): Cpf
    {
        return $this->cpf;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}