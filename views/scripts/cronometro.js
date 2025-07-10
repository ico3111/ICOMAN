function cronometro() {
    const visor = document.getElementById('visor');
    const btnStart = document.getElementById('start');
    const btnPause = document.getElementById('pause');
    const btnStop = document.getElementById('stop');

    let seg = 0;
    let min = 0;
    let hora = 0;
    let intervalo;

    function startTimer() {
        intervalo = setInterval(() => {
            seg++;
            if (seg >= 60) { min++; seg = 0; }
            if (min >= 60) { hora++; min = 0; }

            visor.innerText = `${String(hora).length < 2 ? '0' + hora : hora}:${String(min).length < 2 ? '0' + min : min}:${String(seg).length < 2 ? '0' + seg : seg}`;
        }, 1000);
    }

    btnStart.addEventListener('click', () => {
        if (!intervalo) {
            startTimer();
        }
    });

    btnPause.addEventListener('click', () => {
        clearInterval(intervalo);
        intervalo = null;
    });

    btnStop.addEventListener('click', () => {
        clearInterval(intervalo);
        intervalo = null;
        seg = 0; min = 0; hora = 0;
        visor.innerText = '00:00:00';
    });
}

cronometro();