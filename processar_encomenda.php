<?php
include 'conexao.php'; // Inclui a conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar o nome do usuário
    $usuario = $_POST['usuario'];
    
    // Capturar os itens do carrinho enviados via JSON (JavaScript)
    $itensCarrinho = json_decode($_POST['itensCarrinho'], true);

    if (!empty($itensCarrinho)) {
        try {
            $pdo->beginTransaction(); // Inicia a transação
            
            foreach ($itensCarrinho as $item) {
                $nomeItem = $item['nome'];
                $quantidade = $item['quantidade'];
                $preco = $item['preco'];
                $total = $quantidade * $preco;

                // Inserir no banco de dados
                $stmt = $pdo->prepare("INSERT INTO pedidos (item, quantidade, preco, total) 
                VALUES (:item, :quantidade, :preco, :total)");
$stmt->execute([
':item' => $nomeItem,
':quantidade' => $quantidade,
':preco' => $preco,
':total' => $total
]);

            }
            
            $pdo->commit(); // Confirma a transação
            echo "Pedido realizado com sucesso!";
        } catch (PDOException $e) {
            $pdo->rollBack(); // Reverte a transação em caso de erro
            echo "Erro ao salvar o pedido: " . $e->getMessage();
        }
    } else {
        echo "Carrinho vazio. Adicione itens antes de finalizar o pedido.";
    }
} else {
    echo "Requisição inválida.";
}
?>