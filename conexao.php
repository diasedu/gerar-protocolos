<?php

$servidor = 'localhost';
$usuario  = '';
$senha    = '';

$conexao = new msqli($serivor, $usuario, $senha);

if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}

echo 'Conectado com sucesso';