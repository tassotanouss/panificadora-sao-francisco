// Função para atualizar o carrinho
function atualizarCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const itensCarrinho = document.getElementById('itens-carrinho');
    const total = document.getElementById('total');
    
    // Limpa a lista de itens do carrinho
    itensCarrinho.innerHTML = '';

    let valorTotal = 0;

    carrinho.forEach(item => {
        const li = document.createElement('li');
        li.textContent = ${item.nome} - R$ ${item.preco};
        itensCarrinho.appendChild(li);
        valorTotal += parseFloat(item.preco);
    });

    total.textContent = Total: R$ ${valorTotal.toFixed(2)};
}

// Função para adicionar item ao carrinho
function adicionarAoCarrinho(id, nome, preco) {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    
    const itemExistente = carrinho.find(item => item.id === id);

    if (!itemExistente) {
        carrinho.push({ id, nome, preco });
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
    }

    atualizarCarrinho();
}

// Event Listener para os botões "Adicionar ao Carrinho"
document.querySelectorAll('.adicionar').forEach(button => {
    button.addEventListener('click', () => {
        const produto = button.parentElement;
        const id = produto.dataset.id;
        const nome = produto.querySelector('h3').textContent;
        const preco = produto.querySelector('p').textContent.split('R$ ')[1];

        adicionarAoCarrinho(id, nome, preco);
    });
});

// Chama a função para carregar o carrinho ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
    atualizarCarrinho();
});
