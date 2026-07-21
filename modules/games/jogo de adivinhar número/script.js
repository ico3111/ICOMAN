const botao = document.getElementById('botao');

botao.addEventListener('click', function(){
    if (botao.innerHTML === 'open') {
        botao.innerHTML = 'close';
        botao.classList.remove('open');
        botao.classList.add('close');
    } else if (botao.innerHTML === 'close') {
        botao.innerHTML = 'open';
        botao.classList.remove('close');
        botao.classList.add('open');
    }
});
