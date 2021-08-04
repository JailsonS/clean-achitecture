<?php
namespace Src\academy\domain\student;

use Src\domain\Cpf;
use Src\domain\student\Student;

interface RepositoryStudent
{
    public function addStudent(Student $student): void;
    
    public function getStudentByCpf(Cpf $cpf): Student;

    /** @return Student[] */
    public function getAll(): array;
}