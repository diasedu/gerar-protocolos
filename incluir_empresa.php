<?php
$id     = rand(1, 999999);
$name   = $_POST["name"];
$cnpj   = $_POST["cnpj"];
$email  = $_POST["email"];
$fone   = $_POST["fone"];
$adress = $_POST["adress"];

include_once "./conexao.php";

$new_table = "CREATE TABLE IF NOT EXISTS empresas(
    id INT(6) PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    cnpj CHAR(14) NOT NULL,
    email VARCHAR(50),
    fone INT(11),
    endereco VARCHAR(50)
);";

if ($connect->query($new_table) === TRUE) {
    echo "<script>alert('Tabela empresas criada com sucesso!')</script>";

    $insert_table = "INSERT INTO empresas (id, nome, cnpj, email, fone, endereco) VALUES ('$id', '$name', '$cnpj', '$email', '$fone', '$adress')";

    if($connect->query($insert_table) === TRUE) {
        echo "Empresa cadastrada com sucesso";
    }

} else {
    echo "<script>alert('Não foi possível criar essa tabela, por gentileza, entre em contato com o administrador'";
}


$connect->close();