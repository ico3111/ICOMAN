const table = document.getElementById('table');
const sortear = document.getElementById('sortear');
const selectAno = document.getElementById('selectAno');
const selectNivel = document.getElementById('selectNivel');
const selectFase = document.getElementById('selectFase');

function preencheAnos() {
    for (let i=0; i < 14; i++) {
        let option = document.createElement('option');
        option.innerText = 2010 + i;
        selectAno.appendChild(option);
    }
}
preencheAnos();


function sorteia() {
    let ano = selectAno.value === 'random' ? (Math.floor(Math.random() * 19) + 2005) : (Number(selectAno.value));
    let nivel = selectNivel.value === 'random' ? (Math.floor(Math.random() * 3) + 1) : (Number(selectNivel.value));
    let fase = selectFase.value === 'random' ? (Math.floor(Math.random() * 2) + 1) : (Number(selectFase.value));
    let questao = fase === 1 ? (Math.floor(Math.random() * 20) + 1) : (Math.floor(Math.random() * 6) + 1);
    return {ano, nivel, fase, questao};
}

function mostraTabela() {
    table.innerHTML = '';
    let dados = sorteia();
    for (let i = 0; i < 2; i++) {
        let tr = document.createElement('tr');
        for (let j=0; j < 4; j++) {
            if (i === 0) {
                let th = document.createElement('th');
                if(j === 0){th.innerText = 'Ano: ';}
                if(j === 1){th.innerText = 'Nível: ';}
                if(j === 2){th.innerText = 'Fase: ';}
                if(j === 3){th.innerText = 'Questão: ';}
                tr.appendChild(th);
            }
            else {
                let td = document.createElement('td');
                if(j === 0){td.innerText = dados.ano}
                if(j === 1){td.innerText = dados.nivel}
                if(j === 2){td.innerText = dados.fase}
                if(j === 3){td.innerText = dados.questao}
                tr.appendChild(td);
            } 
        }
        table.appendChild(tr);
    }
    const irParaQuestao = document.getElementById('irParaQuestao');
    irParaQuestao.style.display = 'inline';
}

sortear.addEventListener('click', mostraTabela);