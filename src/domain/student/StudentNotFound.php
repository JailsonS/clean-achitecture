<?php
namespace Src\domain\student;

use Src\domain\Cpf;

class StudentNotFound extends \DomainException
{
    public function __construct(Cpf $cpf)
    {   
        parent::__construct("Aluno com CPF $cpf não encontrado!");
    }
}