<?php 
namespace Src\gamification\application;

use Src\shared\domain\event\EventListner;
use Src\gamification\domain\seal\RepositorySeal;

class GenerateBeginnergSeal extends EventListner
{

    private RepositorySeal $repositorySeal;

    public function __construct(RepositorySeal $repositorySeal)
    {
        $this->repositorySeal = $repositorySeal;
    }

    public function hasExecEvent(Event $event): bool
    {
        return $event->name() === 'aluno_matriculado';
    }

    public function reactTo(Event $event): void
    {
        $array = $event->jsonSerialize();
        $cpf = $array['cpfStudent'];

        $seal = new Seal($cpf, 'NOVATO');

        $this->repositorySeal->add($seal);
    }   
}