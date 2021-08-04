<?php
namespace Src\academy\application\registerStudent;

class DtoRegisterStudent
{
    public string $cpf;
    public string $name;
    public string $email;

    public function __construct(string $cpf, string $name, string $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }
    
}