//Enrico Parolin e Rômulo Girotto

const modelo = [1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8];
let tab = [];
let cartasViradas = [];
let bloquearInput = false;

const app = document.getElementById('app');

const init = () => {
    app.innerHTML = "";
    const btn = document.createElement('button');
    btn.setAttribute('type','button');
    btn.setAttribute('id','comecar');
    btn.innerText = 'Começar';
    btn.addEventListener('click', () => {
        btn.parentNode.removeChild(btn);
        geraTabuleiroInicial();
    });
    app.appendChild(btn);
}

const geraTabuleiroInicial = () => {
    tab = [];
    const novo = [...modelo];

    while(novo.length > 0) {
        const idx = Math.floor(Math.random() * novo.length);
        const [n] = novo.splice(idx, 1);
        tab.push(n);
    }

    tab.forEach(n => {
        const btn = document.createElement('button');
        btn.setAttribute('type','button');
        btn.setAttribute('id', n);
        btn.innerText = '?';
        btn.addEventListener('click', virarCarta);
        app.appendChild(btn);
    });
}

const virarCarta = function () {
    if (bloquearInput) return;
    const carta = this;
    const cartaId = carta.getAttribute('id');

    if (cartasViradas.length < 2 && carta.innerText === '?' && carta !== cartasViradas[0]) {
    cartasViradas.push(carta);
    carta.innerText = cartaId;

    if (cartasViradas.length === 2) {
        bloquearInput = true;
            if (cartasViradas[0].getAttribute('id') === cartasViradas[1].getAttribute('id')) {
                setTimeout(function () {
                    cartasViradas.forEach(carta => carta.classList.add('card-flipped', 'correct'));
                    cartasViradas = [];
                    bloquearInput = false;
                }, 1000);
            } else {
                setTimeout(function () {
                    cartasViradas[0].innerText = '?';
                    cartasViradas[1].innerText = '?';
                    cartasViradas.forEach(carta => carta.classList.remove('card-flipped', 'correct'));
                    cartasViradas = [];
                    bloquearInput = false;
                }, 1000);
            }
        }
    }
}

init();