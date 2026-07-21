let livros = []; //dados do localStorage do navegador (se tiver)
        
//Cria livro ao clicar no btn 'criarLivroBtn'
function criarLivro() {
    let livroName = prompt("Digite o nome do livro:");
    if (livroName) {
        let livro = {name: livroName, notas: []};
        livros.push(livro);
        localStorage.setItem('livros', JSON.stringify(livros)); 
        carregarLivros();
    }
}

//carrega os livros na div livros
function carregarLivros() {
    const livrosDiv = document.getElementById('livros');//pega a div livros 
    livrosDiv.innerHTML = '';//Apaga os elementos html de dentro da div livros

    //para cada livro dentro da let livros (do localStorage):
    livros.forEach((livro, index) => {
        //cria a div de cada livro
        const livroDiv = document.createElement('div');
        livroDiv.classList.add('livroDiv');
        livroDiv.innerHTML = `<h2>${livro.name}</h2>`;

        //lista ordenada para cada anotação
        const notasOl = document.createElement('ol');
        livro.notas.forEach((nota, notaIndex) => {//livros = [livro, livro, livro, ...]; livro = {name: 'x', notas: {name: 'x', content: 'x'}};
            //ol > notaItem > notaLink.
            const notaItem = document.createElement('li');
            const notaLink = document.createElement('a');

            notaLink.href = '#';//sem endereco
            notaLink.innerText = nota.name + '.';//titulo da anotacao (da funcao criar nota)
            notaLink.addEventListener('click', () => abrirNota(index, notaIndex));//qundo clicar vai abrir a anotacao (textarea)

            notaItem.appendChild(notaLink);
            notasOl.appendChild(notaItem);
        });
        livroDiv.appendChild(notasOl);

        //cria btn de add nota
        const btnAddNota = document.createElement('button');
        btnAddNota.innerText = 'Adicionar anotação';
        //funcao dentro de funcao pq senao executa na hora
        btnAddNota.addEventListener('click', () => criarNota(index));
        livroDiv.appendChild(btnAddNota);//coloca o btn na div do livro
        livrosDiv.appendChild(livroDiv);//coloca a div do livro na div dos livros
    });
}

//cria uma anotação
function criarNota(livroIndex) {
    //livros[livroIndex] = livro que se quer fazer anotacao. (linha 46)
    let notaName = prompt("Digite o nome do assunto/anotação: ");
    if (notaName) {
        livros[livroIndex].notas.push({ name: notaName, content: "" });
        localStorage.setItem('livros', JSON.stringify(livros));//salva 
        carregarLivros();//recarrega os livros p essa nota aparecer
    }
}

//abre a nota qualndo clica no link da ol
function abrirNota(livroIndex, notaIndex) {
    const escreverDiv = document.getElementById('escreverDiv'); 
    escreverDiv.innerHTML = '';

    //pega a exata nota e cria o textarea com ela.
    const nota = livros[livroIndex].notas[notaIndex];
    const textarea = document.createElement('textarea');
    textarea.textContent = nota.content;

    //cria btn de salvar a nota
    const btn = document.createElement('button');
    btn.textContent = 'Salvar nota';
    btn.addEventListener('click', () => {
        nota.content = textarea.value;//muda o valor da nota para o conteudo do textarea
        localStorage.setItem('livros', JSON.stringify(livros));//salva
        escreverDiv.innerHTML = '';//apaga o textarea e o botao dps de salvar
    });
    escreverDiv.appendChild(textarea);
    escreverDiv.appendChild(btn);
}

//se carregar o dom:
document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('livros')) {//se existir 'livros' no localstorage ele mete dentro da let livros
        livros = JSON.parse(localStorage.getItem('livros'));//aq ele ta metendo
        carregarLivros();//ja carrega os livros da let livros
    }
    document.getElementById('criarLivroBtn').addEventListener('click', criarLivro);//pega o btn criarlivrobtn e atribui a func nele
});