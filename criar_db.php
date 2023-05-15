<?php

$sql = "CREATE DATABASE IF NOT EXISTS clientes";

if ($connect->query($sql) === TRUE) {
    echo "Base de dados criada com sucesso!";
} else {
    echo "Erro na criação do banco de dados: " . $connect->error;
}