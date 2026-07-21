const input1 = document.getElementById('input1');
const input2 = document.getElementById('input2');
const btn = document.getElementById('botao');
const tbody = document.getElementById('tbody');

btn.addEventListener('click', function (){
    let tr = document.createElement('tr');

    let nome = document.createElement('td');
    nome.innerText = input1.value;
    let sobrenome = document.createElement('td');
    sobrenome.innerText = input2.value;
    let acoes = document.createElement('td');

    //cria o btn apagar
    let apagar = document.createElement('button');
    apagar.innerText = 'apagar';
    acoes.appendChild(apagar);
    apagar.classList.add('deletar'); 

    
    tbody.appendChild(tr);
    tr.appendChild(nome);
    tr.appendChild(sobrenome);
    tr.appendChild(acoes);
    
    //apagar o tr
    let apagares = document.getElementsByClassName('deletar')
    for (i in apagares) {
        apagares[i].addEventListener('click', function(){
            this.parentNode.parentNode.innerHTML = '';
        });
    }
});