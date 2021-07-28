<?php
namespace Src\application\registerStudent;

use Src\domain\student\Student;
use Src\domain\student\RepositoryStudent;
use Src\application\registerStudent\DtoRegisterStudent;

class registerStudent
{
    private RepositoryStudent $respositoryStudent;

    public function __construct(RepositoryStudent $respositoryStudent)
    {
        $this->respositoryStudent = $respositoryStudent;
    }

    public function exec(DtoRegisterStudent $dtoData)
    {
        $student = Student::withCpfNameEmail($dtoData->cpf, $dtoData->name, $dtoData->email);
        $this->respositoryStudent->addStudent($student);
    }
}