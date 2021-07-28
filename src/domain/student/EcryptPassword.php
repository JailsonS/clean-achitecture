<?php
namespace Src\domain\student;

interface EcryptPassword
{
    public function ecrypt(string $password): string;
    public function verify(string $passwordText, string $passwordEcrypted): bool;
}