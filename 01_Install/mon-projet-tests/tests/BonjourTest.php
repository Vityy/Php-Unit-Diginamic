<?php
require_once __DIR__ .'/../src/Bonjour.php';
use PHPUnit\Framework\TestCase;

class BonjourTest extends TestCase
{
    public function testBonjour(): void
    {
        $greeting = new Bonjour();
        $result = $greeting->direBonjour('Valentin');
        $this->assertEquals('Bonjour Valentin', $result);
    }
}