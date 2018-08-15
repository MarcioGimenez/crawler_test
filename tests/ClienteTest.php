<?php
require 'src/config.php';

use PHPUnit\Framework\TestCase;

final class ClienteTest extends TestCase
{
  public function testCanBeParseIsArray()
  {
    $cliente = new Cliente();
    $array = $cliente->parseDOM();

    $this->assertArrayHasKey('vigencia', $array[0]);
    $this->assertArrayHasKey('valor_mensal', $array[0]);
  }
}