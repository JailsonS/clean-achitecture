<?php
namespace Src\infra\student;

use Src\domain\Cpf;
use Src\domain\student\Student;
use Src\domain\student\StudentNotFound;
use Src\domain\student\RepositoryStudent;

class RepositoryStudentMemo implements RepositoryStudent
{
    private array $students = [];


    public function addStudent(Student $student): void 
    {
        $this->students[] = $student;
    }

    public function getStudentByCpf(Cpf $cpf): Student
    {
        $filtered = array_filter(
            $this->students, 
            fn (Student $student) => $student->getCpf() === $cpf
        );

        if(count($filtered) === 0) {
            throw new StudentNotFound($cpf);
        }

        /*
        if(count($filtered) > 1) {
            throw new \Exception();
        }
        */

        return $filtered[0];
    }

    /** @return Student[] */
    public function getAll(): array
    {
        return $this->students;
    }
}