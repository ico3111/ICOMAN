const teclas = document.getElementsByClassName("tecla");
const palavras = [
  ["I", "O", "I", "O"],
  ["P", "A", "T", "O"],
  ["S", "A", "P", "O"],
  ["M", "A", "T", "O"],
  ["M", "A", "P", "A"],
  ["A", "M", "O", "R"],
  ["R", "A", "T", "O"],
  ["C", "O", "C", "O"],
  ["B", "O", "L", "A"],
  ["N", "A", "B", "O"],
  ["P", "O", "V", "O"],
];
let palavra_sorteada = palavras[Math.floor(Math.random() * 12)];

const letras = [
  document.getElementById("letra1"),
  document.getElementById("letra2"),
  document.getElementById("letra3"),
  document.getElementById("letra4"),
];

const img = document.getElementById("imagem");
let contador = 2;

for (let tecla of teclas) {
  // o for of retorna tipo: array=[10, 20...]; ele retorna exatamente o conteudo: 10, 20...
  tecla.addEventListener("click", function () {
    if (
      this.innerHTML === palavra_sorteada[0] ||
      this.innerHTML === palavra_sorteada[1] ||
      this.innerHTML === palavra_sorteada[2] ||
      this.innerHTML === palavra_sorteada[3]
    ) {
      for (let I in letras) {
        //o for in retorna tipo: se o array tem 6 espacos ele vai mostrar 0 1 2 ... 6
        if (
          this.innerHTML === palavra_sorteada[I] &&
          letras[I].innerHTML === "_"
        ) {
          letras[I].innerHTML = palavra_sorteada[I];
        }
      }
      if (
        letras[0].innerHTML !== "_" &&
        letras[1].innerHTML !== "_" &&
        letras[2].innerHTML !== "_" &&
        letras[3].innerHTML !== "_"
      ) {
        alert("Você ganhou! :D");
        return;
      }
    } else {
      img.src = "imagens/" + contador + ".gif";
      if (contador === 7) {
        alert("Você perdeu :(");
        return;
      } else {
        contador++;
      }
    }
    this.classList.remove("tecla");
    this.classList.add("tecla_usada");
    this.disabled = true; // pra tecla parar de funfa, p cara n farmar erros
  });
}
