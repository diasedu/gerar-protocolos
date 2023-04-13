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
    <h1>Cadastro de protocolos</h1>

    <form>
        <div>
            <label for="nome_empresa">Qual é o nome da empresa?</label>
            <input type="text" id="nome_empresa" />
        </div>

        <div>
            <label for="data">Qual é a data da realização do protocolo?</label>
            <input type="date" id="data"/>
        </div>

        <div>
            <label for="a definir">Cadastre abaixo o nome completo dos colaboradores e os exames realizados:</label>
            <div>
                <span>Nome do colaborador</span>
                <input type="text" id="nome" /> 
            </div>
            
            <div>
                <span>Exames realizados:</span>
                <input type="text" id="exames" />
            </div>
            
            </div>
                <button id="ordem_alfabetica">Colocar em ordem alfabética</button>
                <button id="cadastro_de_colaboradores">Cadastrar colaborador</button>
            <div>
        </div>
    </form>

    <form action="template_protocolo.php" method="post">

        <table>
            <thead>
                <tr>
                    <td>Nome do colaborador</td>
                    <td>Exames</td>
                </tr>
            </thead>
            <tbody>

            </tbody>

            
        </table>

        <div id="dados">

        </div>

        <button>Cadastrar</button>
    </form>

    <script src="./javascript/script.js"></script>   
</body>


</html>