<?php 
namespace Src\gamification\infra\seal;

use Src\gamification\domain\seal\RepositorySeal;

class RepositorySealMemo implements RepositorySeal
{
    private array $seals = [];

    public function add(Seal $seal)
    {
        $this->seals[] = $seal;
    }

    public function studentSealWithCpf(Cpf $cpf)
    {
        return array_filter($this->seals, fn(Seal $seal) => $seal->getCpfStudent() == $cpf);
    }
}