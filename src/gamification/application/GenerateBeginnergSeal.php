<?php 
namespace Src\gamification\application;

use Src\shared\domain\event\EventListner;

class GenerateBeginnergSeal extends EventListner
{
    public function hasExecEvent(Event $event): bool
    {
        return $event->name() === 'aluno_matriculado';
    }

    public function reactTo(Event $event): void
    {

    }
}