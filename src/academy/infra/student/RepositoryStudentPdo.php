<?php
namespace Src\infra\student;

use Src\domain\Cpf;
use Src\domain\student\Student;
use Src\domain\student\StudentNotFound;
use Src\domain\student\RepositoryStudent;

class RepositoryStudentPdo implements RepositoryStudent
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function addStudent(Student $student): void 
    {
        $sql = 'INSERT INTO alunos VALUES (:cpf, :nome, :email)';
        
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':cpf', $student->getCpf());
        $stmt->bindValue(':nome', $student->getName());
        $stmt->bindValue(':email', $student->getEmail());

        $stmt->execute();

        $sql = 'INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno)';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('cpf_aluno',  $student->getCpf());

        /** @var Phone $phone */
        foreach ($student->getPhones as $phone) {
            $stmt->bindValue('ddd', $phone->ddd());
            $stmt->bindValue('numero', $phone->number());
            $stmt->execute();
        }
    }

    public function getStudentByCpf(Cpf $cpf): Student
    {
        $sql = '
            SELECT 
                cpf, nome, email, ddd, numero as numero_telefone
            FROM alunos
            LEFT JOIN telefone ON telefones.cpf_alunos = alunos.cpf 
            WHERE alunos.cpf = ?
        ';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, (string) $cpf);
        $stmt->execute();

        $dataStudent = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        if(count($dataStudent) === 0) {
            throw new StudentNotFound($cpf);
        }

        return $this->mapStudent($dataStudent);

    }

    public function mapStudent(array $dataStudent): Student
    {
        $frow = $dataStudent[0];

        $student = Student::withCpfNameEmail($frow['cpf'], $frow['nome'], $frow['email']);
        $phones = arrat_filter($dataStudent, fn ($row) => $row['ddd'] !== null && $row['numero_telefone'] !== null);
        
        foreach($phones as $rowphone) {
            $student->addPhone($rowphone['ddd'], $rowphone['numero_telefone']);
        }

        return $student;
    }

    /** @return Student[] */
    public function getAll(): array
    {
        $sql = '
            SELECT 
                cpf, nome, email, ddd, numero as numero_telefone
            FROM alunos
            LEFT JOIN telefone ON telefones.cpf_alunos = alunos.cpf 
        ';

        $stmt = $this->connection->query($sql);
        $dataStudent = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if(count($dataStudent) === 0) {
            throw new \DomainException('Não foi possível recuperar os dados!');
        }

        $students = [];
        foreach ($dataStudent as $rowdata) {
            if(!array_key_exists($rowdata['cpf'], $students)) {
                $students[$rowdata['cpf']] = Student::withCpfNameEmail($rowdata['cpf'], $rowdata['nome'], $rowdata['email']);
            }

            $students[$rowdata['cpf']]->addPhone($rowdata['ddd'], $rowdata['numero_telefone']);
        }


    }
}