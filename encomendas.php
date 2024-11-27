<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encomendas - Panificadora San Francisco</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8e2c7;
            color: #5e4b3b;
            line-height: 1.6;
        }

        header {
            background-color: #c47f4e;
            color: #5e4b3b;
            padding: 2rem 0;
            text-align: center;
        }

        header h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        main {
            padding: 3rem;
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .resultados-pesquisa {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .item-resultado {
            background-color: #ffe8b3;
            border-radius: 10px;
            padding: 2rem;
            width: 30%; /* Ajuste para garantir que todos os itens tenham o mesmo tamanho */
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            transition: transform 0.3s;
        }

        .item-resultado:hover {
            transform: scale(1.05); /* Efeito de zoom ao passar o mouse */
        }

        .item-resultado h2 {
            font-size: 1.8rem;
            color: #5e4b3b;
            margin-bottom: 1rem;
        }

        .item-resultado h4 {
            font-size: 1.2rem;
            color: #7f6b56;
            margin-bottom: 1.5rem;
        }

        .btn-add {
            background-color: #f4b800;
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.2rem;
            transition: background-color 0.3s;
            text-transform: uppercase;
        }

        .btn-add:hover {
            background-color: #ff8c00;
        }

        a.btn-back {
            display: inline-block;
            margin: 2rem auto 0;
            padding: 1rem 2rem;
            background-color: #5e4b3b;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-size: 1.2rem;
            transition: background-color 0.3s;
            text-align: center;
        }

        a.btn-back:hover {
            background-color: #3e3426;
        }

        footer {
            background-color: #c47f4e;
            color: #fff;
            text-align: center;
            padding: 1.5rem 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0.5rem 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Encomendas</h1>
    </header>
    <main>
        <section class="resultados-pesquisa">
            <div class="item-resultado">
                <h2>Pão Francês</h2>
                <h4>Tradicional e quentinho, ideal para o café da manhã. Preço: R$0,50/unidade</h4>
                <button class="btn-add">Adicionar ao Carrinho</button>
            </div>
            <div class="item-resultado">
                <h2>Bolo de Chocolate</h2>
                <h4>Um clássico, perfeito para adoçar o dia. Preço: R$25,00/unidade</h4>
                <button class="btn-add">Adicionar ao Carrinho</button>
            </div>
            <div class="item-resultado">
                <h2>Suco Natural</h2>
                <h4>Feito com frutas frescas. Escolha entre laranja, maracujá ou acerola. Preço: R$5,00/300ml</h4>
                <button class="btn-add">Adicionar ao Carrinho</button>
            </div>
            <div class="item-resultado">
                <h2>Biscoito de Polvilho</h2>
                <h4>Crocante e delicioso. Preço: R$10,00/unidade</h4>
                <button class="btn-add">Adicionar ao Carrinho</button>
            </div>
            <div class="item-resultado">
                <h2>Pizza de Frango</h2>
                <h4>Recheada com frango, catupiry e queijo. Preço: R$30,00/unidade</h4>
                <button class="btn-add">Adicionar ao Carrinho</button>
            </div>
            <div class="item-resultado">
                <h2>Folhado de Queijo</h2>
                <h4>Folhadinho com recheio de queijo. Preço: R$7,00/unidade</h4>
                <button class="btn-add">Adicionar ao Carrinho</button>
            </div>
        </section>
        <a href="index.php" class="btn-back">Voltar para a Página Inicial</a>
    </main>
    <footer>
        <p>Redes Sociais: @sanfrancisco</p>
        <p>E-mail: panificadorasanfrancisco@gmail.com</p>
        <p>Telefone: (83) 9808-3575</p>
    </footer>
</body>
</html>
