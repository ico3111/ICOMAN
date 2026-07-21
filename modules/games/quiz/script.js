const pergunta = document.getElementById('pergunta');
const opcoes = document.getElementsByClassName('botao');
const vitoria = document.getElementById('vitoria');

let perguntas_respostas = [
    ['De quem é a famosa frase "Penso, logo existo?"',
    'Platão', 'Galileu Galilei', 'Descartes',
    'Sócrates', 'Descartes'],

    ['De onde é a invenção do chuveiro elétrico?',
    'França', 'Inglaterra', 'Brasil', 'Austrália', 'Brasil'],

    ['Quais são: o menor e o maior país do mundo?',
    'Vaticano e Rússia', 'Nauru e China', 'Mônaco e Canadá', 'São Marino e Índia', 'Vaticano e Rússia'],

    ['Qual o nome do presidente do Brasil que ficou conhecido como Jango?',
    'Jânio Quadros', 'Getúlio Vargas', 'João Figueiredo', 'João Goulart', 'Jânio Quadros'],
];
let botoes = [
    document.getElementById('botao1'),
    document.getElementById('botao2'),
    document.getElementById('botao3'),
    document.getElementById('botao4'),
];


let pergunta_escolhida = perguntas_respostas[Math.floor(Math.random() * perguntas_respostas.length)];

pergunta.innerText = pergunta_escolhida[0];
for(let i=0; i<botoes.length; i++){
    botoes[i].innerText = pergunta_escolhida[i + 1];
}


for(i in opcoes){
    opcoes[i].addEventListener('click', function (){
        vitoria.classList.add('aparecer');
        if(this.innerHTML === pergunta_escolhida[5]){
            vitoria.innerText = 'PARABENS, VC GANHOU';
            vitoria.classList.add('ganhou');
            this.classList.add('escolha_certa');
        }else{
            vitoria.innerText = 'PARABENS, VC PERDEU';
            vitoria.classList.add('perdeu');
            this.classList.add('escolha_errada');
        }
        return;
    });
}