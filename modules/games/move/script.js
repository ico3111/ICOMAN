const mapBlock = document.getElementsByClassName('map');

const map = [
    0, 0, 0, 0, 0,
    0, 0, 0, 0, 0,
    0, 0, 1, 0, 0,
    0, 0, 0, 0, 0,
    0, 0, 0, 0, 0,
];

function renderizaCobra() {
    map.forEach((block, index) => {
        mapBlock[index].style.backgroundColor = block === 1 ? 'red' : 'white';
    });
}

document.addEventListener('keydown', function(event) {
    const teclaPressionada = event.key;
    const headIndex = map.indexOf(1);

    if (teclaPressionada === 'w' || teclaPressionada === 'W') {
        if (headIndex % 5 !== 0) {
            map[headIndex] = 0;
            map[headIndex - 1] = 1;
            renderizaCobra();
        }
    }

    if (teclaPressionada === 'a' || teclaPressionada === 'a') {
        if (headIndex >= 5) {
            map[headIndex] = 0;
            map[headIndex - 5] = 1;
            renderizaCobra();
        }
    }
    
    if (teclaPressionada === 's' || teclaPressionada === 's') {
        if ((headIndex + 1) % 5 !== 0) {
            map[headIndex] = 0;
            map[headIndex + 1] = 1;
            renderizaCobra();
        }
    }

    if (teclaPressionada === 'd' || teclaPressionada === 'D') {
        if (headIndex < 20) {
            map[headIndex] = 0;
            map[headIndex + 5] = 1;
            renderizaCobra();
        }
    }
});

renderizaCobra();