<?php
// cadastro.php

// Configurações de conexão com o banco de dados
$host = "127.0.0.1"; // geralmente localhost
$usuario = "root"; // seu usuário MySQL
$senha = "221094"; // sua senha MySQL
$banco = "banco2"; // o nome do seu banco de dados

// Conectar ao banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber os dados do formulário
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$cidade = $_POST['cidade'];
$idioma_desejado = $_POST['idioma_desejado'] ?? null;
$idioma_ensinado = $_POST['idioma_ensinado'] ?? null;
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha para segurança

// Inserir dados no banco de dados
$sql = "INSERT INTO usuarios (tipo, nome, data_nascimento, cidade, idioma_desejado, idioma_ensinado, email, senha)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $tipo, $nome, $data_nascimento, $cidade, $idioma_desejado, $idioma_ensinado, $email, $senha);

if ($stmt->execute()) {
    echo "Conta criada com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

// Fechar a conexão
$stmt->close();
$conn->close();