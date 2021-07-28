<?php
namespace Src\infra\student;

use Src\domain\student\EcryptPassword;

class EcryptPasswordMd5 implements EcryptPassword
{
    public function ecrypt(string $password): string 
    {
        return md5($password);
    }
    public function verify(string $passwordText, string $passwordEcrypted): bool
    {
        return md5($passwordText) === $passwordEcrypted;
    }
}