const filmes = document.getElementById('filmes');
const generos = document.getElementById('generos');
const adicionar = document.getElementById('adicionar');
const modal = document.getElementById('modal');
const table = document.getElementById('table');
let filmeSelecionado = true;



function filme() {
    filmeSelecionado = true;
    adicionar.innerHTML = '';
    generos.style.backgroundColor = 'rgb(150,8,8)';
    filmes.style.backgroundColor = 'red';
    adicionar.innerHTML = 'Adicionar um novo Filme';
    modal.style.display = 'none';
    modal.innerHTML = '';
}   
filmes.addEventListener('click', filme);
filme();

generos.addEventListener('click', function genero() {
    filmeSelecionado = false;
    adicionar.innerHTML = '';
    filmes.style.backgroundColor = 'rgb(150,8,8)';
    generos.style.backgroundColor = 'red';
    adicionar.innerHTML = 'Adicionar um novo Gênero de filme';
    modal.style.display = 'none';
    modal.innerHTML = '';
})



function botaoConfirmar() {
    let btn = document.createElement('button');
    btn.classList.add('btn');
    btn.innerText = 'Confirmar';
    return btn;
}
function divBotoes(){
    let botoes = document.createElement('span');
    modal.appendChild(botoes);

    let btnC = document.createElement('button');
    btnC.classList.add('btn');
    btnC.innerText = 'Cancelar';
    botoes.appendChild(btnC)

    btnC.addEventListener('click', function(){
        modal.innerHTML = '';
        modal.style.display = 'none';
        mostraTabela();
    });
    return botoes;
}




let seusFilmes = [];
let seusGeneros = [];

function adicionarFilme() {
    modal.style.display = 'flex';
    modal.innerHTML = '';

    let inputs = [];
    for (let i = 0; i < 3; i++) {
        if (i === 1) {
            let select2 = document.createElement('select');
            for(j of seusGeneros){
                let option = document.createElement('option');
                option.innerText = j; option.value = j;
                select2.appendChild(option);
            }
            inputs.push(select2);
            modal.appendChild(select2);
        }
        else{
            let input;
            input = document.createElement('input');
            if (i === 0) input.setAttribute('placeholder', 'Nome do filme');
            if (i === 2) {input.setAttribute('placeholder', 'Ano do filme'); input.setAttribute('type', 'number')};
            inputs.push(input);
            modal.appendChild(input);
        }
    }

    let botoes = divBotoes();
    let btn = botaoConfirmar();
    botoes.appendChild(btn);
    btn.addEventListener('click', function () {
        seusFilmes.push({
            nome: inputs[0].value,
            genero: inputs[1].value,
            ano: inputs[2].value,
        });
        modal.innerHTML = '';
        modal.style.display = 'none';
        mostraTabela();
    });
}
 

function alterarFilme(tr) {
    modal.style.display = 'flex';
    modal.innerHTML = '';

    let inputs = [];
    for (let i = 0; i < 3; i++) {
        if (i === 1) {
            let select2 = document.createElement('select');
            for(j of seusGeneros){
                let option = document.createElement('option');
                option.innerText = j; option.value = j;
                select2.appendChild(option);
            }
            inputs.push(select2);
            modal.appendChild(select2);
        }
        else{
            let input;
            input = document.createElement('input');
            if (i === 0) input.setAttribute('placeholder', 'Nome do filme');
            if (i === 2) {input.setAttribute('placeholder', 'Ano do filme'); input.setAttribute('type', 'number')};
            inputs.push(input);
            modal.appendChild(input);
        }
    }

    let posicao = tr.rowIndex - 1; 
    inputs[0].value = seusFilmes[posicao].nome;
    inputs[1].value = seusFilmes[posicao].genero;
    inputs[2].value = seusFilmes[posicao].ano;

    let botoes = divBotoes();
    let btn = botaoConfirmar();
    botoes.appendChild(btn);
    btn.addEventListener('click', function () {
        seusFilmes[posicao].nome = inputs[0].value;
        seusFilmes[posicao].genero = inputs[1].value;
        seusFilmes[posicao].ano = inputs[2].value;
    
        modal.innerHTML = '';
        modal.style.display = 'none';
        mostraTabela();
    });
}


function removerFilme(tr){
    let posicao = tr.rowIndex - 1;
    seusFilmes.splice(posicao, 1);       
    mostraTabela();
}



function adicionarGenero() {
    modal.style.display = 'flex';
    modal.innerHTML = '';

    let input = document.createElement('input');
    input.setAttribute('placeholder', 'Nome do gênero de filme');
    modal.appendChild(input);

    let botoes = divBotoes();
    let btn = botaoConfirmar();
    botoes.appendChild(btn);
    btn.addEventListener('click', function () {
        seusGeneros.push(input.value);
        modal.innerHTML = '';
        modal.style.display = 'none';
        mostraTabela()
    });
}


function alterarGenero(tr){
    modal.style.display = 'flex';
    modal.innerHTML = '';

    let posicao = tr.rowIndex - 1;

    let indexFilmes = seusFilmes.reduce((acumulado, valor, index) => {
        if (valor.genero === seusGeneros[posicao]) {return [...acumulado, index];}
        return acumulado;
    }, []);

    let input;
    input = document.createElement('input');
    input.setAttribute('placeholder', 'Nome do gênero');
    modal.appendChild(input);

    input.value = seusGeneros[posicao];

    let botoes = divBotoes();
    let btn = botaoConfirmar();
    botoes.appendChild(btn);
    btn.addEventListener('click', function () {
        seusGeneros[posicao] = input.value;

        for (let i = 0; i < indexFilmes.length; i++) {
            let index = indexFilmes[i];
            seusFilmes[index].genero = input.value;
        }

        modal.innerHTML = '';
        modal.style.display = 'none';
        mostraTabela();
    });
}


function removerGenero(tr) {
    let posicao = tr.rowIndex - 1;
    if(seusFilmes.some(a => a.genero === seusGeneros[posicao])){alert('ainda existe filmes usando este genero, delete eles antes deste.'); return;}
    seusGeneros.splice(posicao, 1);       
    mostraTabela();
}



adicionar.addEventListener('click', function() {
    if (filmeSelecionado === true){adicionarFilme()}
    if (filmeSelecionado === false){adicionarGenero()}
})



function botoesDeleteAlterar(td, tr){
    let btnAlterar = document.createElement('button');
    btnAlterar.setAttribute('class', 'botoesAlterar');
    btnAlterar.innerText = 'Alterar';
    td.appendChild(btnAlterar);
    btnAlterar.addEventListener('click', function(){
        if (filmeSelecionado) {alterarFilme(tr)}
        else {alterarGenero(tr)}
    });

    let btnDelete = document.createElement('button');
    btnDelete.setAttribute('class', 'botoesDeletar');
    btnDelete.innerText = 'Deletar';
    td.appendChild(btnDelete);
    btnDelete.addEventListener('click', function(){
        if (filmeSelecionado) {removerFilme(tr)}
        else {removerGenero(tr)}
    });
}



function mostraTabela() {
    
    if ((seusFilmes.length === 0 && filmeSelecionado === true) || (seusGeneros.length === 0 && filmeSelecionado === false)){
    table.style.display = 'none'; return;}else{table.style.display = 'table'}
        
    table.innerHTML = '';

    let thead = document.createElement('thead');
    table.appendChild(thead);
    let tbody = document.createElement('tbody');
    table.appendChild(tbody);

    if (filmeSelecionado){
        thead.innerHTML = '<tr><th>Nome dos filmes</th><th>Nomes dos gêneros dos filmes</th><th>Ano de lançamento dos filmes</th><th>ACOES</th></tr>';
        for (let i in seusFilmes) {
            let tr = document.createElement('tr');
            tbody.appendChild(tr);
            for (let j = 0; j < 4; j++) {
                let td = document.createElement('td');
                tr.appendChild(td);

                if (j === 0) td.innerText = seusFilmes[i].nome;
                if (j === 1) td.innerText = seusFilmes[i].genero;
                if (j === 2) td.innerText = seusFilmes[i].ano;
                if (j === 3) botoesDeleteAlterar(td, tr);
            }
        }
    }else{
        thead.innerHTML = '<tr><th>Nome dos gêneros de filme</th><th>Acoes</th></tr>';
        for(let i in seusGeneros){
            let tr = document.createElement('tr');
            tbody.appendChild(tr);
            for (let j=0; j < 2; j++){
                let td = document.createElement('td');
                if (j === 0) td.innerText = seusGeneros[i];
                if (j === 1) botoesDeleteAlterar(td, tr);
                tr.appendChild(td);
            }
        }
    }
}

filmes.addEventListener('click', mostraTabela);
generos.addEventListener('click', mostraTabela);