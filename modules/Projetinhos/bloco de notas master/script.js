document.addEventListener('DOMContentLoaded', function () {
    let livros = [];

    const criarLivroBtn = document.getElementById('criarLivroBtn');
    criarLivroBtn.addEventListener('click', criarLivro);

    const livrosDiv = document.getElementById('livros');
    const escreverDiv = document.getElementById('escreverDiv');

    function criarLivro() {
        let livroName = prompt("Digite o nome do livro:");
        if (livroName) {
            let livro = {
                name: livroName,
                notas: []
            };
            livros.push(livro);
            carregarLivros();
        }
    }

    function carregarLivros() {
        livrosDiv.innerHTML = '';
        livros.forEach((livro, index) => {
            const livroDiv = document.createElement('div');
            livroDiv.classList.add('livroDiv');
            livroDiv.innerHTML = `<h2>${livro.name}</h2>`;
            
            const notas = document.createElement('ol');
            livro.notas.forEach((nota, notaIndex) => {
                const notaItem = document.createElement('li');
                const notaLink = document.createElement('a');
                notaLink.href = '#';
                notaLink.textContent = nota.name;
                notaLink.addEventListener('click', () => abrirNota(index, notaIndex));
                notaItem.appendChild(notaLink);
                notas.appendChild(notaItem);
            });
            livroDiv.appendChild(notas);
            
            const btnAddNota = document.createElement('button');
            btnAddNota.textContent = 'Adicionar Capítulo';
            btnAddNota.addEventListener('click', () => criarNota(index));
            livroDiv.appendChild(btnAddNota);
            livrosDiv.appendChild(livroDiv);
        });
    }

    function criarNota(livroIndex) {
        let notaName = prompt("Digite o nome do capítulo:");
        if (notaName) {
            livros[livroIndex].notas.push({ name: notaName, content: "" });
            carregarLivros();
        }
    }

    function abrirNota(livroIndex, notaIndex) {
        const nota = livros[livroIndex].notas[notaIndex];
        escreverDiv.innerHTML = '';

        const textarea = document.createElement('textarea');
        textarea.textContent = nota.content;

        const btn = document.createElement('button');
        btn.textContent = 'Salvar nota';
        btn.addEventListener('click', () => {
            nota.content = textarea.value;
            escreverDiv.innerHTML = '';
        });

        escreverDiv.appendChild(textarea);
        escreverDiv.appendChild(btn);
    }

    carregarLivros();
});
