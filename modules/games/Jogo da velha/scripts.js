let jogador = 'X'
let jogadas = 0
const botoes = document.getElementsByClassName('botao')
for(let botao of botoes){
    botao.addEventListener('click', function(){
        if (this.innerHTML !== "&nbsp;") return;
        jogadas++
        this.innerText = jogador
        let venceu = false

        if (jogadas >= 5){
            if (botoes[0].innerText === jogador &&
                botoes[0].innerText === botoes[1].innerText && 
                botoes[0].innerText === botoes[2].innerText) {
                    venceu = true;
                }

            if (botoes[3].innerText === jogador &&
                botoes[3].innerText === botoes[4].innerText && 
                botoes[3].innerText === botoes[5].innerText) {
                    venceu = true;
                }
            
            if (botoes[6].innerText === jogador &&
                botoes[6].innerText === botoes[7].innerText && 
                botoes[6].innerText === botoes[8].innerText) {
                    venceu = true;
                }
            
            if (botoes[0].innerText === jogador && 
                botoes[0].innerText === botoes[3].innerText && 
                botoes[0].innerText === botoes[6].innerText) {
                    venceu = true;
                }

            if (botoes[1].innerText === jogador &&
                botoes[1].innerText === botoes[4].innerText && 
                botoes[1].innerText === botoes[7].innerText) {
                    venceu = true;
                }
            
            if (botoes[2].innerText === jogador &&
                botoes[2].innerText === botoes[5].innerText && 
                botoes[2].innerText === botoes[8].innerText) {
                    venceu = true;
                }

            if (botoes[0].innerText === jogador &&
                botoes[0].innerText === botoes[4].innerText && 
                botoes[0].innerText === botoes[8].innerText) {
                    venceu = true;
                }
            
            if (botoes[2].innerText === jogador &&
                botoes[2].innerText === botoes[4].innerText && 
                botoes[2].innerText === botoes[6].innerText) {
                    venceu = true;
                }

        }
        if (venceu) {
            alert(jogador + ' venceu a partida')
        }else if (jogadas === 9) {
            alert('Deu Velha!')
        }
        jogador = jogador === 'X' ? 'O' : 'X'
    })
}