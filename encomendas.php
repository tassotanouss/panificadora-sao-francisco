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
        .carrinho-form {
            margin-top: 20px;
            text-align: center;
        }
        .carrinho-form input,
        .carrinho-form button {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        .carrinho-form button {
            background-color: #c47f4e;
            color: white;
            cursor: pointer;
        }
        .carrinho-form button:hover {
            background-color: #925a33;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Encomendas - Panificadora San Francisco</h1>

        <p>Está com fome ou precisa de algo especial? A Panificadora San Francisco oferece deliciosos pães, bolos e muito mais, entregue na sua casa! Faça sua encomenda abaixo:</p>

        <div class="produto-item">
            <h3>Pão Artesanal</h3>
            <p>Delicioso pão caseiro feito com fermentação natural, crocante por fora e macio por dentro. Ideal para todas as ocasiões.</p>
            <p><strong>Preço: R$ 0,50</strong></p>
            <p>Quantidade: <input type="number" class="quantidade" min="1" value="1"></p>
            <button class="adicionar" data-nome="Pão Artesanal" data-preco="0.50">Adicionar ao Carrinho</button>
        </div>
        <div class="produto-item">
            <h3>Bolo de Fubá</h3>
            <p>Bolo fofinho e cheio de sabor, feito com fubá fresquinho, perfeito para um lanche da tarde.</p>
            <p><strong>Preço: R$ 20,00</strong></p>
            <p>Quantidade: <input type="number" class="quantidade" min="1" value="1"></p>
            <button class="adicionar" data-nome="Bolo de Fubá" data-preco="20.00">Adicionar ao Carrinho</button>
        </div>
        <div class="produto-item">
            <h3>Biscoitos de Polvilho</h3>
            <p>Se você adora um petisco crocante, nossos biscoitos de polvilho são perfeitos. Feitos com carinho e tradição!</p>
            <p><strong>Preço: R$ 10,00</strong></p>
            <p>Quantidade: <input type="number" class="quantidade" min="1" value="1"></p>
            <button class="adicionar" data-nome="Biscoitos de Polvilho" data-preco="10.00">Adicionar ao Carrinho</button>
        </div>

        <div class="carrinho">
            <h3>Itens no Carrinho</h3>
            <ul id="carrinho-list"></ul>
            <p>Total: <span id="total">R$ 0,00</span></p>

            <div class="carrinho-form">
                <form id="carrinho-form">
                    <!-- Campo oculto para enviar o nome do usuário -->
                    <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>">

                    <button type="submit">Finalizar Pedido</button>
                </form>
            </div>
        </div>

        <a href="index.php">Voltar ao início</a>
    </div>

    <script>
        let carrinho = [];

        function atualizarCarrinho() {
            const carrinhoList = document.getElementById('carrinho-list');
            const totalElement = document.getElementById('total');
            carrinhoList.innerHTML = '';

            let total = 0;
            carrinho.forEach((item, index) => {
                const li = document.createElement('li');
                li.innerHTML = `${item.nome} (x${item.quantidade}) - R$ ${(item.preco * item.quantidade).toFixed(2)}
                <button class="remover" onclick="removerItem(${index})">Remover</button>`;
                carrinhoList.appendChild(li);
                total += parseFloat(item.preco * item.quantidade);
            });

            totalElement.textContent = `R$ ${total.toFixed(2)}`;
        }

        function removerItem(index) {
            carrinho.splice(index, 1);
            atualizarCarrinho();
        }

        document.querySelectorAll('.adicionar').forEach(button => {
            button.addEventListener('click', function () {
                const nome = this.getAttribute('data-nome');
                const preco = this.getAttribute('data-preco');
                const quantidade = this.parentElement.querySelector('.quantidade').value;

                carrinho.push({ nome, preco, quantidade });
                atualizarCarrinho();
            });
        });

        document.getElementById('carrinho-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const usuario = document.getElementById('usuario').value;
            const itensCarrinho = carrinho.map(item => ({
                nome: item.nome,
                preco: item.preco,
                quantidade: item.quantidade
            }));

            const formData = new FormData();
            formData.append("usuario", usuario);
            formData.append("itensCarrinho", JSON.stringify(itensCarrinho));

            fetch("processar_encomenda.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    // Redireciona para a página clientesid.php após o pedido ser finalizado com sucesso
                    window.location.href = "clientesid.php";
                })
                .catch(error => console.error("Erro ao enviar o pedido:", error));
        });
    </script>
</body>
</html>
