const div = document.getElementById('div');
const input = document.getElementById('input');
const btnInicio = document.getElementById('inicio');
const btnFinal = document.getElementById('final');
const btnDelete = document.getElementById('limpar');
const ul = document.getElementById('ul');

var  array = [];

function mostrarLista() {
    ul.innerHTML = '';
	array.forEach(element => {
		let li = document.createElement('li');
        li.innerText = element;
        ul.appendChild(li);
	})
}

btnInicio.addEventListener('click', () => {array.unshift(input.value); mostrarLista();})
btnFinal.addEventListener('click', () => {array.push(input.value); mostrarLista();})
btnDelete.addEventListener('click', () => {array = []; mostrarLista();})