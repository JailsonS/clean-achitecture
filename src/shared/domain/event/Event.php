<?php
namespace Src\shared\domain\event;

use JsonSerializable;

interface Event extends \JsonSerializable
{
    public function moment(): \DateTimeImmutable;
    public function name(): string;
}