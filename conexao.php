<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "carrinho_compras";

try {
    // Conectar ao banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Definir o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Opcional: Testa a conexão executando uma simples consulta (opcional, mas útil para depuração)
    $pdo->query("SELECT 1");

    echo "Conexão bem-sucedida ao banco de dados '$dbname'.<br>";
} catch (PDOException $e) {
    // Mensagem de erro caso não consiga se conectar
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
?>
