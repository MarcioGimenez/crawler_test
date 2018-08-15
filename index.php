<?php
require 'src/config.php';

$cliente = new Cliente();
$array = $cliente->parseDOM();
array_shift($array);
print_r($array);