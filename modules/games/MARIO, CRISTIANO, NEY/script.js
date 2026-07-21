const map = document.getElementById("map");
const obstaculo = document.getElementById("obstaculo");
const personagem = document.getElementById("personagem");
const pontos = document.getElementById("pontos");

//movimenta o obstaculo
let obstaculoPosition = 938; //938 por causa do tamanho do obstaculo
let obstaculoVelocidade = 8; // comeca andando só um
let pontosContagem = 0; // ...
let spawnobstaculo = true; // gambiarra no codigo
const intervalo = setInterval(function () {
  // Se a posicao do obstaculo é menor q 0 e o cac pode spawna:
  if (obstaculoPosition <= 0 && spawnobstaculo === true) {
    spawnobstaculo = false; // agra n pode mais spawna
    obstaculoVelocidade += 0.5; // vai acrescentar 0.1 na velo do cac
    pontosContagem++; // +1 pt
    if (pontosContagem === 20) {
      personagem.src = "./imgs/cristino rondo.jpg";
      obstaculo.src = "./imgs/messi.jpg";

      map.style.backgroundColor = "red";
    }
    if (pontosContagem === 30) {
      personagem.src = "./imgs/ninino nei.jpg";
      obstaculo.src = "./imgs/taça.jpg";

      map.style.backgroundColor = "yellow";
    }
    if (pontosContagem > 70) {
      alert("ganhou");
      map.innerHTML = "";
    }
    pontos.innerText = `Pontos: ${pontosContagem}`; // atualiza os pts
    // depois de um tempo indefinido o cac volta p comeco
    setTimeout(function () {
      obstaculoPosition = 938;
      spawnobstaculo = true;
    }, Math.floor(Math.random() * 4) * 1000);
  }

  //faz o obstaculo andar
  obstaculoPosition -= obstaculoVelocidade;
  obstaculo.style.left = `${obstaculoPosition}px`;

  // consulta se o bro morreu
  if (
    obstaculoPosition > 0 &&
    obstaculoPosition < 125 &&
    personagemJump === false
  ) {
    alert("GAME OVER :(");
    clearInterval(intervalo);
  }
}, 16); //60 fps

//personagem's jump
let personagemJump = false;
document.addEventListener("keydown", function jump(event) {
  if (event.keyCode === 32) {
    // chat gpt me ensinou
    personagemJump = true;
    personagem.style.bottom = `120px`;

    setTimeout(function () {
      personagemJump = false;
      personagem.style.bottom = `0px`;
    }, 1000);
  }
});

document.body.addEventListener("click", () => {
  personagemJump = true;
  personagem.style.bottom = `120px`;

  setTimeout(function () {
    personagemJump = false;
    personagem.style.bottom = `0px`;
  }, 1000);
});

//fim :)
