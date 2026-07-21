const loja = document.getElementById('loja');
const dinheiro = document.getElementById('dinheiro');
const cidade = document.getElementById('cidade');
const btnDestruir = document.getElementById('btnDestruir');

var dinheiroAcumulado = 5000;

//CRIA A LOJA E SUAS ESTRUTURAS
function criaLoja() {
    estruturas.forEach((estrutura, index) => {
        let span = document.createElement('span');
        span.classList.add('lojaEstrutura');
        span.setAttribute('id', `estrutura${index}`);
        loja.appendChild(span);

        let img = document.createElement('img');
        img.setAttribute('src', './imgs/' + estrutura.imgSrc);
        span.appendChild(img);

        for (let i = 1; i <= 3; i++) {
            let p = document.createElement('p');
            if(i === 1) {p.innerText = `Nome: ${estrutura.nome}`;}
            if(i === 2) {p.innerText = `Valor: ${estrutura.preco}`;}
            if(i === 3) {p.innerText = `Farma: ${estrutura.farma}`;}
            span.appendChild(p);
        }
    });
}
criaLoja()

//TAXA DE FARMAÇAO DA ESTRUTURA
function farmar(quantPseg) {
    setInterval(() => {
        dinheiroAcumulado += quantPseg;
        dinheiro.innerText = dinheiroAcumulado + ' USD';
    }, 1000);
}

//COMPRA/CRIA A ESTRUTURA
function comprarEstrutura(preco, imgSrc, farma) {
    if (dinheiroAcumulado < preco) {return;}

    dinheiroAcumulado -= preco;
    dinheiro.innerText = dinheiroAcumulado + ' USD';

    let img = document.createElement('img');
    img.setAttribute('src', './imgs/' + imgSrc);
    cidade.appendChild(img);
    farmar(farma);
}

//DESTROI A ULTIMA ESTRUTURA
function destruirEstrutura() {
    cidade.removeChild(cidade.lastChild);
}

//DESTRUIR ULTIMA ESTRUTURA
btnDestruir.addEventListener('click', destruirEstrutura);

//ADD EVENT LISTENER -> CRIAR ESTRUTURA
estruturas.forEach((estrutura, index) => {
    document.getElementById(`estrutura${index}`).addEventListener('click', function() { 
        comprarEstrutura(estrutura.preco, estrutura.imgSrc, estrutura.farma);
    });
});