<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protocolos de empresas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./estilos/padrao.css">
</head>
<body>
    <h1>Cadastro de usuário</h1>

    <form action="./template_protocolo.php" method="post">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </div>

        <div>
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="sobrenome">
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
        </div>

        <div>
            <label for="tipo_cadastro">Tipo de cadastro</label>
            <select name="tipo_cadastro" id="tipo_cadastro">
                <option value="basico">Básico</option>
                <option value="intermediario">Intermediário</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <button>Cadastrar</button>
        
    </form>
</body>
</html>