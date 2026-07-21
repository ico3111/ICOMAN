const cleanBoard = document.getElementById('cleanBoard');
const newTaskBtn = document.getElementById('newTask');
const difficulty = document.getElementById('difficulty');
const deleteTask = document.getElementById('delete');
const main = document.getElementById('main');

let dados = [];

function createElement(elementP, parentNodeP) {
    const element = document.createElement(`${elementP}`);
    parentNodeP.appendChild(element);
    return element;
}

function criarCheckbox(tr, td) {
    const input = createElement('input', td);
    input.setAttribute('type', 'checkbox');
    input.addEventListener('change', function() {
        tr.style.textDecoration = input.checked ? 'line-through' : 'none';
    });
    return input;
}


function deleteLastTask() {
    dados.splice((dados.length - 1), 1);
    carregarTabela();
}

function carregarTabela() {
    main.innerHTML = '';
    const h1 = createElement('h1', main);
    h1.innerText = 'Task Board :)';
    const table = createElement('table', main);

    const headerRow = createElement('tr', table);
    ['L.Day', 'Subject', 'Topic', 'Mark'].forEach(text => {
        createElement('th', headerRow).innerText = text;
    });

    dados.forEach(linha => {
        const tr = createElement('tr', table);
        tr.style.color = `${difficulty.value}`;
        linha.forEach((element, index) => {
            const td = createElement('td', tr);
            td.innerText = element;
            if (index === 2) {
                const checkboxTd = createElement('td', tr);
                criarCheckbox(tr, checkboxTd);
            }
        });
    });
}

function newTask() {
    const table = document.querySelector('table');
    const tr = createElement('tr', table);
    tr.style.color = `${difficulty.value}`;
    const dadosTr = [];
    
    for (let i = 0; i < 4; i++) {
        const td = createElement('td', tr);
        if (i === 3) {
            criarCheckbox(tr, td);
        } else {
            const input = createElement('input', td);
            input.addEventListener('blur', function() {
                td.innerHTML = '';
                td.innerText = input.value;
                dadosTr[i] = input.value;
                if (dadosTr.length === 3) {
                    dados.push(dadosTr);
                    carregarTabela();
                }
            });
        }
    }
}

newTaskBtn.addEventListener('click', newTask);
deleteTask.addEventListener('click', deleteLastTask);
cleanBoard.addEventListener('click', function() {
    dados = [];
    carregarTabela();
});

carregarTabela();