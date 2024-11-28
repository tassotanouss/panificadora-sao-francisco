<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encomendas - Panificadora San Francisco</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #fdf3e3;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: justify;
        }
        h1 {
            color: #c47f4e;
            text-align: center;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: white;
            background-color: #c47f4e;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        a:hover {
            background-color: #925a33;
        }
        .encomenda-form {
            background-color: #fff;
            padding: 20px;
            margin-top: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .encomenda-form input,
        .encomenda-form textarea,
        .encomenda-form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .encomenda-form button {
            background-color: #c47f4e;
            color: white;
            cursor: pointer;
        }
        .encomenda-form button:hover {
            background-color: #925a33;
        }
        .produto-item {
            margin: 15px 0;
        }
        .carrinho {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        .carrinho ul {
            list-style-type: none;
            padding: 0;
        }
        .carrinho ul li {
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }
        .carrinho h3 {
            text-align: center;
        }
        .remover {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            margin-left: 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
        .remover:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Encomendas - Panificadora San Francisco</h1>

        <p>Está com fome ou precisa de algo especial? A Panificadora San Francisco oferece deliciosos pães, bolos e muito mais, entregue na sua casa! Faça sua encomenda abaixo:</p>
        
        <!-- Formulário de Encomenda -->
        <div class="encomenda-form">
            <h2>Faça sua encomenda</h2>
            <form action="encomendas.php" method="POST">
                <input type="text" name="nome" placeholder="Seu nome" required>
                <input type="email" name="email" placeholder="Seu e-mail" required>
                <input type="tel" name="telefone" placeholder="Seu telefone" required>
                <textarea name="descricao" placeholder="Descrição do pedido" rows="4" required></textarea>
                <button type="submit">Enviar Encomenda</button>
            </form>
        </div>

        <p>Confira alguns dos produtos disponíveis para encomenda:</p>

        <!-- Produtos disponíveis com botão "Adicionar ao Carrinho" -->
        <div class="produto-item">
            <h3>Pão Artesanal</h3>
            <p>Delicioso pão caseiro feito com fermentação natural, crocante por fora e macio por dentro. Ideal para todas as ocasiões.</p>
            <p><strong>Preço: R$ 0,50</strong></p>
            <button class="adicionar" data-nome="Pão Artesanal" data-preco="15.00">Adicionar ao Carrinho</button>
        </div>
        <div class="produto-item">
            <h3>Bolo de Fubá</h3>
            <p>Bolo fofinho e cheio de sabor, feito com fubá fresquinho, perfeito para um lanche da tarde.</p>
            <p><strong>Preço: R$ 20,00</strong></p>
            <button class="adicionar" data-nome="Bolo de Fubá" data-preco="20.00">Adicionar ao Carrinho</button>
        </div>
        <div class="produto-item">
            <h3>Biscoitos de Polvilho</h3>
            <p>Se você adora um petisco crocante, nossos biscoitos de polvilho são perfeitos. Feitos com carinho e tradição!</p>
            <p><strong>Preço: R$ 10,00</strong></p>
            <button class="adicionar" data-nome="Biscoitos de Polvilho" data-preco="10.00">Adicionar ao Carrinho</button>
        </div>

        <!-- Carrinho -->
        <div class="carrinho">
            <h3>Itens no Carrinho</h3>
            <ul id="carrinho-list">
                <!-- Itens serão adicionados aqui -->
            </ul>
            <p>Total: <span id="total">R$ 0,00</span></p>
        </div>

        <a href="index.php">Voltar ao início</a>
    </div>

    <script>
        // Array para armazenar os itens do carrinho
        let carrinho = [];

        // Função para atualizar a lista do carrinho e o total
        function atualizarCarrinho() {
            const carrinhoList = document.getElementById('carrinho-list');
            const totalElement = document.getElementById('total');
            carrinhoList.innerHTML = ''; // Limpa a lista do carrinho

            let total = 0;
            carrinho.forEach((item, index) => {
                const li = document.createElement('li');
                li.innerHTML = `${item.nome} - R$ ${item.preco} <button class="remover" onclick="removerItem(${index})">Remover</button>`;
                carrinhoList.appendChild(li);
                total += parseFloat(item.preco);
            });

            totalElement.textContent = `R$ ${total.toFixed(2)}`;
        }

        // Função para remover um item do carrinho
        function removerItem(index) {
            carrinho.splice(index, 1); // Remove o item do array
            atualizarCarrinho(); // Atualiza a lista do carrinho
        }

        // Evento de clique para adicionar os itens ao carrinho
        document.querySelectorAll('.adicionar').forEach(button => {
            button.addEventListener('click', function() {
                const nome = this.getAttribute('data-nome');
                const preco = this.getAttribute('data-preco');
                carrinho.push({ nome, preco });
                atualizarCarrinho(); // Atualiza a lista do carrinho e o total
            });
        });
    </script>
</body>
</html>
