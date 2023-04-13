// função construtora que irá armazenar o nome e os exames da pessoa;
function Cadastro_de_colaborador(nome, exames, empresa, data) {
    this.nome      = nome
    this.exames    = exames
    this.empresa   = empresa;
    this.data      = data;
}

// função que cria a estrutura de linha, coluna e span para representar o texto
function criar_estruturas_tabela(...texto) {
    
    const corpo_tabela = document.querySelector('tbody');
    const nova_linha = document.createElement('tr');
    const nova_coluna = [document.createElement('td'), document.createElement('td')];
    const input = [document.createElement('input'), document.createElement('input')];
    
    corpo_tabela.appendChild(nova_linha);
    
    nova_linha.
        appendChild(nova_coluna[0]).
            appendChild(input[0]).
                innerHTML = texto[0];
    
    nova_linha.
        appendChild(nova_coluna[1]).
            appendChild(input[1]).
                innerHTML = texto[1];
    
    
    input[0].setAttribute('value', `${texto[0]}`);
    input[0].setAttribute('disabled', 'disabled');
    input[1].setAttribute('value', `${texto[1]}`);
    input[1].setAttribute('disabled', 'disabled');
    
}

function inserir_info_finais(nome, exames, empresa, data) {
    const info_finais = document.getElementById('dados');

    const input = [
        document.createElement('input'),
        document.createElement('input'),
        document.createElement('input'),
        document.createElement('input')
    ];
    
    info_finais.appendChild(input[0]);
    info_finais.appendChild(input[1]);
    info_finais.appendChild(input[2]);
    info_finais.appendChild(input[3]);
    
    input[0].setAttribute('type', 'hidden');
    input[0].setAttribute('name', 'nome[]');
    input[0].setAttribute('value', nome);
    input[0].setAttribute('class', 'item-nome');
    
    input[1].setAttribute('type', 'hidden');
    input[1].setAttribute('name', 'exames[]');
    input[1].setAttribute('value', exames);
    input[1].setAttribute('class', 'item-exame');

    input[2].setAttribute('type', 'hidden');
    input[2].setAttribute('name', 'empresa');
    input[2].setAttribute('value', empresa);
    input[2].setAttribute('class', 'item-empresa');

    input[3].setAttribute('type', 'hidden');
    input[3].setAttribute('name', 'data');
    input[3].setAttribute('value', data);
    input[3].setAttribute('class', 'item-data');
}

function formatarData(data) {

    const dataSeparada = { 
        dia: data.substring(8, 10),
        mes: data.substring(5, 7),
        ano: data.substring(0, 4)
    }

    return data = `${dataSeparada.dia}.${dataSeparada.mes}.${dataSeparada.ano}`;
}

function ordem_alfabetica(...item_nome) {
    item_nome.value.sort();
}

const limpar_elemento = e => e.value = '';

const botao      = document.querySelector('#cadastro_de_colaboradores');
const botao_alfa = document.querySelector('#ordem_alfabetica');

// Abaixo consta a definição dos eventos ao clicar nos botões
// Por a lista em ordem alfabética
botao_alfa.addEventListener('click', e => {
    e.preventDefault();

    ordem_alfabetica(document.querySelectorAll('.item-nome'));
});

botao.addEventListener('click', e => {
    e.preventDefault();
    
    formatarData(document.querySelector('#data').value);

    const cadastro = new Cadastro_de_colaborador(
        document.querySelector('#nome').value,
        document.querySelector('#exames').value,
        document.querySelector('#nome_empresa').value,
        formatarData(document.querySelector('#data').value)
    );

    
        
    // Validação. Caso algum input esteja vazio, não será possível o cadastro de uma linha em branco
    if (cadastro.nome == '' || cadastro.exames == '' || cadastro.empresa == '' || cadastro.data == '') {
        alert('Digite corretamente para prosseguir.');
    } else {
        // Cria a estrutura da tabela com o nome e os exames
        criar_estruturas_tabela(cadastro.nome, cadastro.exames);

        // Criação de inputs hidden que são passados para o backend
        inserir_info_finais(cadastro.nome, cadastro.exames, cadastro.empresa, cadastro.data);
    }
        
    // Limpa o valor dos inputs para novo cadastro
    limpar_elemento(document.querySelector('#nome'));
    limpar_elemento(document.querySelector('#exames'));
        
});