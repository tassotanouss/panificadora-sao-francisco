<?php
// Configuração do banco de dados
$host = "localhost";
$username = "root";
$password = "";
$dbname = "carrinho_compras";

try {
    // Conectar ao MySQL (sem especificar o banco de dados inicialmente)
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Criar banco de dados se não existir
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $pdo->exec($sql);
    echo "Banco de dados '$dbname' criado com sucesso!<br>";
    
    // Conectar ao banco de dados recém-criado
    $pdo->exec("USE $dbname");

    // Criar tabela pedidos, se não existir
    $sql = "CREATE TABLE IF NOT EXISTS pedidos (
        item VARCHAR(255) NOT NULL,
        quantidade INT NOT NULL,
        preco DECIMAL(10, 2) NOT NULL,
        total DECIMAL(10, 2) NOT NULL,
        data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    echo "Tabela 'pedidos' criada com sucesso!<br>";

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
