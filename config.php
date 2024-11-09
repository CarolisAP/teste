<?php
// config.php - Configuração da conexão com o banco de dados

$host = "127.0.0.1"; // Host do banco de dados
$usuario = "root";   // Usuário do banco de dados
$senha = "221094"; // Senha do banco de dados
$banco = "banco2"; // Nome do banco de dados

// Conectar ao banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
