<?php

$server = 'localhost';
$user   = 'root';
$pass   = '';
$db     = 'clientes';

$connect = new mysqli($server, $user, $pass, $db);

if ($connect->connect_error) {
    die("A conexão falhou, verifique a seguir: " .  $connect->connect_error);
}