//ELEMENTOS HTML PARA MANIPUL
const cookie = document.getElementById('cookie');
const pontos = document.getElementById('pontos');
const cursores = document.getElementById('cursores');

//PONTOS (COOKIES)
var pontosAcumulados = 0;

//CLICAR NO COOKIE MANUALMENTE
function clicarCookie() {
    pontosAcumulados++;
    pontos.innerText = 'Pontos acumulados: ' + pontosAcumulados;
}

//ACIONA UM INTERVALO DE 1 SEG PARA FARMAR OS COOKIES COM UM CURSOR
function farmar(quantPseg) {
    setInterval(() => {
        pontosAcumulados += quantPseg;
        pontos.innerText = 'Pontos acumulados: ' + pontosAcumulados;
    }, 1000)//1000 MILISEGUNDOS = 1 SEG
}

//COMPRAR CURSOR
function comprarCursor(preco, imgSrc, farma) {
    if (pontosAcumulados < preco) {return;}//GARANTIR QUE NÃO COMPRE SEM TER PONTOS O SUFICIENTE

    pontosAcumulados -= preco;//GASTA PONTOS
    pontos.innerText = 'Pontos acumulados: ' + pontosAcumulados;//ATUALIZA O PLACAR

    //ADICIONA A IMAGEM DO CURSOR ATRAVÉS DE PARÂMETRO (imgSrc)
    let img = document.createElement('img');
    img.setAttribute('src', './imgs/'+imgSrc);
    cursores.appendChild(img);
    farmar(farma);
}

//ADICIONA OS ADDEVENTLISTENER
cookie.addEventListener('click', clicarCookie);//COOKIE MANUAL
for (let i = 1; i <= 8; i++) {//8 CURSORES DA LOJA
    document.getElementById(`cursor${i}`).addEventListener('click', function() { 
        comprarCursor(10**(i+1), `${i}.gif`, 10**(i-1));//MATEMÁTICA PARA OTIMIZAR O CODE
    });
}

//FINAL DO JOGO (QUANDO COMPRA O CURSOR 9)
document.getElementById('cursor9').addEventListener('click', function() {
    if (pontosAcumulados < 1000000000000) {return;}//SEGURANÇA DNV
    document.body.innerHTML = '';//LIMPA O HTML DENTRO DO BODY

    //ADICIONA A MENSAGEM DE WIN
    let h1 = document.createElement('h1');
    h1.setAttribute('id', 'ganhaste');
    h1.innerText = 'GANHASTE.';
    document.body.appendChild(h1);
});
//FIM, ESPERO QUE TENHA FICADO UM BOM CÓDIGO!