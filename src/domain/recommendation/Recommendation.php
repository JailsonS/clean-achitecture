<?php
namespace Src\domain\recommendation;

use Src\domain\student\Student;


class Recommendation
{
    private Student $indicated;
    private Student $indicative;
    private \DateTimeImmutable $date;

    public function __construct(Student $indicative, Student $indicated)
    {
        $this->indicated = $indicated;
        $this->indicative = $indicative;
        $this->date = new \DateTimeImmutable();
    }
}