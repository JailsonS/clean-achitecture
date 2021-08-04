<?php

use Src\shared\domain\event\EventPublisher;
use Src\infra\student\RepositoryStudentMemo;
use Src\academy\domain\student\StudentListnerLog;
use Src\gamification\infra\seal\RepositorySealMemo;
use Src\gamification\application\GenerateBeginnergSeal;
use Src\academy\application\registerStudent\RegisterStudent;
use Src\academy\application\registerStudent\DtoRegisterStudent;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$number = $argv[5];

$publisher = new EventPublisher();

$publisher->addListner(new StudentListnerLog());
$publisher->addListner(new GenerateBeginnergSeal(new RepositorySealMemo()));

$useCase = new RegisterStudent(new RepositoryStudentMemo(), $publisher);

$useCase->exec(new DtoRegisterStudent($cpf, $name, $email));