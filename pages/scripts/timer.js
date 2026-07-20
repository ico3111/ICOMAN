function timer() {
  const visor = document.getElementById("visor2");
  const inptSeg = document.getElementById("inptSeg");
  const inptMin = document.getElementById("inptMin");
  const inptHour = document.getElementById("inptHour");
  const btnStart = document.getElementById("start2");
  const btnPause = document.getElementById("pause2");
  const btnStop = document.getElementById("stop2");

  let intervalo;
  let seg = 0;
  let min = 0;
  let hora = 0;
  let isPaused = false;

  function startTimer() {
    intervalo = setInterval(() => {
      if (seg === 0 && min === 0 && hora === 0) {
        clearInterval(intervalo);
        visor.innerHTML =
          '<input type="text" id="inptHour" class="timerInput" placeholder="00">:<input type="text" id="inptMin" class="timerInput" placeholder="00">:<input type="text" id="inptSeg" class="timerInput" placeholder="00">';
        return;
      }

      if (seg === 0) {
        seg = 59;
        if (min === 0) {
          min = 59;
          hora--;
        } else {
          min--;
        }
      } else {
        seg--;
      }

      visor.innerText = `${hora.toString().padStart(2, "0")}:${min.toString().padStart(2, "0")}:${seg.toString().padStart(2, "0")}`;
    }, 1000);
  }

  btnStart.addEventListener("click", () => {
    if (!intervalo) {
      if (!isPaused) {
        hora = parseInt(inptHour.value) || 0;
        min = parseInt(inptMin.value) || 0;
        seg = parseInt(inptSeg.value) || 0;
      }
      startTimer();
    }
  });

  btnPause.addEventListener("click", () => {
    clearInterval(intervalo);
    intervalo = null;
    isPaused = true;
  });

  btnStop.addEventListener("click", () => {
    clearInterval(intervalo);
    intervalo = null;
    seg = 0;
    min = 0;
    hora = 0;
    visor.innerHTML =
      '<input type="text" id="inptHour" class="timerInput" placeholder="00">:<input type="text" id="inptMin" class="timerInput" placeholder="00">:<input type="text" id="inptSeg" class="timerInput" placeholder="00">';
    isPaused = false;
  });
}

timer();

inptMin.addEventListener("input", function () {
  let value = parseInt(this.value);
  if (value > 59) this.value = 59;
  if (value < 0 || isNaN(value)) this.value = "00";
});

inptSeg.addEventListener("input", function () {
  let value = parseInt(this.value);
  if (value > 59) this.value = 59;
  if (value < 0 || isNaN(value)) this.value = "00";
});
