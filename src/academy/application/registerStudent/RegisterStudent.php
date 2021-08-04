<?php
namespace Src\academy\application\registerStudent;

use Src\domain\EventPublisher;
use Src\domain\student\Student;
use Src\domain\student\RepositoryStudent;
use Src\domain\student\StudentListnerLog;
use Src\application\registerStudent\DtoRegisterStudent;

class registerStudent
{
    private RepositoryStudent $respositoryStudent;
    private EventPublisher $publisher;

    public function __construct(RepositoryStudent $respositoryStudent)
    {
        $this->respositoryStudent = $respositoryStudent;
        $this->publisher = new EventPublisher();
        $this->publisher->addListner(new StudentListnerLog());
    }

    public function exec(DtoRegisterStudent $dtoData)
    {
        $student = Student::withCpfNameEmail($dtoData->cpf, $dtoData->name, $dtoData->email);
        $this->respositoryStudent->addStudent($student);

        $this->publisher->publish(new RegisteredStudent($student->getCpf()));
    }
}