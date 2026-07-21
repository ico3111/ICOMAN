//Enrico Parolin e Rômulo Girotto

const inputs = document.getElementsByTagName('input');
const tbody = document.getElementById('tbody');

let jogos = [//todas as partidas da tabela. SIM! I did it
    [
        {nome: 'VASCO', jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}, 
        {nome: 'PALMEIRAS', jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}
    ],
    [
        {nome: 'VASCO', jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}, 
        {nome: 'FRAMENGO', pontos: 0, jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}
    ],
    [
        {nome: 'VASCO', jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}, 
        {nome: 'IMORTAL', pontos: 0, jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}
    ],
    [
        {nome: 'PALMEIRAS', jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}, 
        {nome: 'FRAMENGO', jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}
    ],
    [
        {nome: 'PALMEIRAS', jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}, 
        {nome: 'IMORTAL', jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}
    ],
    [
        {nome: 'FRAMENGO', jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}, 
        {nome: 'IMORTAL', jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}
    ]
]

function mostraTabela() {
    tbody.innerHTML = '';
    function geraTabelaFinal() {//Pega todas as partidas e une todos os dados de cada time e une em um
        let tabelaFinal = [
            {nome: 'VASCO', pontos: 0, jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0, aproveitamento: 0},
            {nome: 'PALMEIRAS', pontos: 0, jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0, aproveitamento: 0}, 
            {nome: 'FRAMENGO', pontos: 0, jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0, aproveitamento: 0}, 
            {nome: 'IMORTAL', pontos: 0, jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0, aproveitamento: 0}
        ]
        for (let jogo of jogos) {
            for (let time of jogo) {//soma o grosso
                let timeIdx;
                if (time.nome === 'VASCO') {timeIdx = 0}
                if (time.nome === 'PALMEIRAS') {timeIdx = 1}
                if (time.nome === 'FRAMENGO') {timeIdx = 2}
                if (time.nome === 'IMORTAL') {timeIdx = 3}
            
                tabelaFinal[timeIdx].jogos += time.jogos;
                tabelaFinal[timeIdx].vitorias += time.vitorias;
                tabelaFinal[timeIdx].empates += time.empates;
                tabelaFinal[timeIdx].golsPro += time.golsPro;
                tabelaFinal[timeIdx].golsContra += time.golsContra;
                tabelaFinal[timeIdx].saldo += time.saldo;
            }
        }
        for (let i in tabelaFinal) {//calculos finais
            tabelaFinal[i].pontos = 3*tabelaFinal[i].vitorias + tabelaFinal[i].empates
            tabelaFinal[i].aproveitamento = (tabelaFinal[i].jogos === 0 ? 0 : (100 * tabelaFinal[i].pontos / (3 * tabelaFinal[i].jogos)).toFixed(1))+'%'
        }
        
        return tabelaFinal;
    }
    let tabelaFinal = geraTabelaFinal();
    let ordemDePontos = [...tabelaFinal];//copia a tabela final
    ordemDePontos.sort((b, a) => a.pontos - b.pontos);//ordena no topo os com + pontos

    ordemDePontos.forEach(time => {
        let tr = document.createElement('tr')
        for (let i=0; i < 9; i++) {
            let td = document.createElement('td')
            if (i === 0) {td.innerText = time.nome}
            if (i === 1) {td.innerText = time.pontos; td.style.fontWeight = 'bold'}//negrito nos pontos
            if (i === 2) {td.innerText = time.jogos}
            if (i === 3) {td.innerText = time.vitorias}
            if (i === 4) {td.innerText = time.empates}
            if (i === 5) {td.innerText = time.golsPro}
            if (i === 6) {td.innerText = time.golsContra}
            if (i === 7) {td.innerText = time.saldo}
            if (i === 8) {td.innerText = time.aproveitamento}
            tr.appendChild(td)
        }
        tbody.appendChild(tr)
    });
}

let jogospassados = [false, false, false, false, false, false];//pra saber se essa partida já ocorreu
function informaTabela(golsT1, golsT2, jogo) {
    if (jogospassados[jogo]) {//se já occorreu, ele zera a partida para substituir com os novos valores
        jogos[jogo] = [
            {nome: jogos[jogo][0].nome, jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0},
            {nome: jogos[jogo][1].nome, jogos: 0, vitorias: 0, empates: 0, golsPro: 0, golsContra: 0, saldo: 0}
        ]
    } 
    //TIME1
    jogos[jogo][0].jogos++;
    jogos[jogo][0].golsPro += golsT1;
    jogos[jogo][0].golsContra += golsT2;
    jogos[jogo][0].saldo += golsT1 - golsT2;
    if (golsT1 === golsT2){jogos[jogo][0].empates++};
    if (golsT1 > golsT2){jogos[jogo][0].vitorias++};

    //TIME2
    jogos[jogo][1].jogos++;
    jogos[jogo][1].golsPro += golsT2;
    jogos[jogo][1].golsContra += golsT1;
    jogos[jogo][1].saldo += golsT2 - golsT1;
    if (golsT2 === golsT1){jogos[jogo][1].empates++};
    if (golsT2 > golsT1){jogos[jogo][1].vitorias++}

    jogospassados[jogo] = true;//coloca true pq essa partida acabou de acontecer
    mostraTabela()
}

function coletaDados() {//genial, google: Pode me contratar já!
    for (let i=0; i < 12; i += 2) {//cansei, se vira pra entender
        let jogo; i%2 === 0 ? jogo = i/2 : i;

        inputs[i].addEventListener('input', function() {//times da esquerda
            if (inputs[i+1].value === '') {return;}
            informaTabela(parseInt(inputs[i].value), parseInt(inputs[i+1].value), jogo);
        })
        inputs[i+1].addEventListener('input', function() {//times da direita
            if (inputs[i].value === '') {return;}
            informaTabela(parseInt(inputs[i].value), parseInt(inputs[i+1].value), jogo);
        })
    }
}
mostraTabela()
coletaDados()