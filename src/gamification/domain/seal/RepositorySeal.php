<?php 
namespace Src\gamification\domain\seal;


use Src\domain\Cpf;
use Src\gamification\domain\seal\Seal;

interface RepositorySeal
{
    public function add(Seal $seal): void;
    public function studentSealWithCpf(Cpf $cpf);
}