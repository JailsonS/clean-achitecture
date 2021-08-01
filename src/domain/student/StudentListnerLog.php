<?php 
namespace Src\domain\student;

use Src\domain\Event;
use Src\domain\EventListner;
use Src\domain\student\StudentRegistered;

class StudentListnerLog extends EventListner
{
    /**
     * @param StudentRegistered $studentRegistered
     */
    public function reactTo(Event $studentRegistered): void
    {
        fprintf(
            STDERR, 
            'Aluno com CPF %s foi matriculado na data %s', 
            (string) $studentRegistered->cpfStudent(),
            $studentRegistered->moment()->format('d/m/Y')
        );
    }

    public function hasExecEvent(Event $event): bool
    {
        return $event instanceof StudentRegistered;
    }
}