<?php
namespace Tests;

use Src\domain\student\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testTelefoneDeveSerRepresentadoPorString()
    {
        $phone = new Phone('91', '988477739');
        $this->assertSame('(91) 988477739', (string) $phone);
    }
}