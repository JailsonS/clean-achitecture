<?php

use Src\domain\student\Student;
use Src\infra\student\RepositoryStudentMemo;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$number = $argv[5];

$student = Student::withCpfNameEmail($cpf, $name, $email)->addPhone($ddd, $number);

$repository = new RepositoryStudentMemo();
$repository->addStudent($student);