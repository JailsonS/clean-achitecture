<?php
namespace Src\infra\student;

use Src\domain\student\EcryptPassword;

class EcryptPasswordPhp implements EcryptPassword
{
    public function ecrypt(string $password): string 
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }
    public function verify(string $passwordText, string $passwordEcrypted): bool
    {
        return password_verify($passwordText, $passwordEcrypted);
    }
}