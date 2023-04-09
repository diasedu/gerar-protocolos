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
    <h1>Alterar protocolo</h1>

    <form action="" method="get">
        <div>
            <label for="nome_empresa">Nome da empresa</label>
            <input type="text" name="nome_empresa" id="nome_empresa" />
        </div>

        <div>
            <label for="data">Data do protocolo</label>
            <input type="date" name="data" id="data" />
        </div>

        <div>
            <label for="a definir">Relação de colaboradores e exames realizados</label>
            <div>
                <span>Nome do colaborador</span>
                <input type="text" name="a definir" /> 
            </div>
            
            <div>
                <span>Exames realizados:</span>
                <input type="text" name="a definir" />
            </div>
            
            <div>
                <button>Alterar</button>
            </div>
        </div>

        <button>Salvar protocolo</button>

    </form>
</body>
</html>