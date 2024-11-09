<?php
include 'config.php'; // Inclui a conexão com o banco

// Consulta as informações do aluno (suponha que o ID seja passado via URL)
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$aluno = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Aluno</title>
    <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Aluno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            text-align: center;
            margin-bottom: 1rem;
        }
        .header img {
            max-width: 100%;
            height: auto;
            display: inline-block;
        }
        .navbar {
            display: flex;
            justify-content: space-around;
            background-color: #333;
            padding: 1rem;
            width: 100%;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: block;
        }
        .navbar a:hover {
            background-color: #575757;
            border-radius: 4px;
        }
        .profile-container {
            margin-top: 2rem;
            padding: 2rem;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
            box-sizing: border-box;
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }
        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #ccc;
            margin-right: 2rem;
        }
        .profile-info {
            display: flex;
            flex-direction: column;
        }
        .profile-info h2 {
            margin: 0;
            margin-bottom: 1rem;
        }
        .profile-info p {
            margin: 0.5rem 0;
        }
        .profile-section {
            margin-top: 2rem;
        }
        .profile-section h3 {
            margin-bottom: 1rem;
        }
        .profile-section textarea, .profile-section input, .profile-section select {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .profile-section button {
            padding: 1rem 2rem;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .profile-section button:hover {
            background-color: #575757;
        }
    
        /* Botão de abrir o chat */
        .open-chat-btn {
            padding: 1rem 2rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 1rem;
        }
        .open-chat-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="capa4.png" alt="Imagem de Capa">
    </div>

    <div class="navbar">
        <a href=./home.html>Home</a>
        <a href=./sobre_nos.html>Sobre nós</a>
        <a href=./professores.html>Professores</a>
        <a href=./alunos.html>Alunos</a>
        <a href=./comunidade.html>Comunidade</a>
        <a href=./login.html>Login</a>
    </div>

    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-photo" id="profile-photo"></div>
            <div class="profile-info">
                <h2>Nome do Aluno</h2>
                <p><strong>Email:</strong> aluno@email.com</p>
                <p><strong>Cidade e Estado:</strong> Cidade, Estado</p>
                <p><strong>Idioma Desejado:</strong> Idioma</p>
                <p><strong>Data de Nascimento:</strong> 01/01/2000</p>
            </div>
        </div>

        <!-- Seção para Biografia e Interesses -->
        <div class="profile-section">
            <h3>Biografia e Interesses</h3>
            <textarea id="biografia" rows="6" placeholder="Escreva sobre você, seus interesses e objetivos de aprendizado..."></textarea>
            <button type="submit">Salvar Biografia</button>
        </div>

        <!-- código php para o formulario -->
         
        <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $biografia = $_POST['biografia'];
    $sql = "UPDATE usuarios SET biografia = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $biografia, $id);
    $stmt->execute();
}
?>


        <!-- Seção para Buscar Professores -->
        <div class="profile-section">
            <h3>Buscar Professores</h3>
            <select id="filtro-idioma">
                <option value="">Selecione o Idioma</option>
                <option value="Inglês">Inglês</option>
                <option value="Espanhol">Espanhol</option>
                <option value="Francês">Francês</option>
                <option value="Alemão">Alemão</option>
                <option value="Corenao">Coreano</option>
                <option value="Japonês">Japonês</option>
                <option value="Italiano">Italiano</option>
                <option value="Russo">Russo</option>
                <option value="Norueguês">NorueguÊs</option>
                <option value="Mandarim">Mandarim</option>
                <option value="Holandes">Holandes</option>
                <option value="Grego">Grego</option>
                <option value="Latim">Latim</option>
                <!-- Outros idiomas disponíveis -->
            </select>
            <select id="filtro-cidade">
                <option value="">Selecione a Cidade</option>
                <option value="São Paulo">São Paulo</option>
                <option value="Rio de Janeiro">Rio de Janeiro</option>
                <option value="Curitiba">Curitiba</option>
                <option value="Campinas">Campinas</option>
                <option value="Sorocaba">Sorocaba</option>
                <option value="Piracicaba">Piracicaba</option>
                <option value="Bauru">Bauru</option>
                <option value="Ribeirão Preto">Ribeirão Preto</option>
                <option value="Jaú">Jaú</option>
                <option value="Bocaina">Bocaina</option>
                <option value="Araraquara">Araraquara</option>
                <option value="São Carlos">São Carlos</option>
                <option value="Limeira">Limeira</option>
                <option value="Brasília">Brasília</option>
                <option value="Santos">Santos</option>
                <option value="Guarujá">Guarujá</option>
                <option value="Rio Claro">Rio Claro</option>
                <option value="Matão">Matão</option>
                <option value="Franca">Franca</option>
                <!-- Outras cidades brasileiras -->
            </select>
            <button type="submit">Buscar Professores</button>
        </div>

        <!-- Seção para Agendamento de Aulas -->
        <div class="profile-section">
            <h3>Agendar Aulas</h3>
            <input type="text" id="nome-professor" placeholder="Nome do Professor">
            <input type="datetime-local" id="data-hora" placeholder="Data e Hora da Aula">
            <button type="submit">Agendar Aula</button>
        </div>
    </div>

    <!-- Botão para abrir o chat -->
    <div class="profile-section">
        <button class="open-chat-btn" onclick="window.location.href='./chat.html'">Abrir Chat com professor</button>
    </div>
</body>
</html>
    <!-- Inclua o CSS conforme o exemplo fornecido -->
</head>
<body>
    <!-- Restante do HTML conforme o exemplo fornecido -->
    <div class="profile-info">
        <h2><?php echo htmlspecialchars($aluno['nome']); ?></h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($aluno['email']); ?></p>
        <p><strong>Cidade e Estado:</strong> <?php echo htmlspecialchars($aluno['cidade']); ?></p>
        <p><strong>Idioma Desejado:</strong> <?php echo htmlspecialchars($aluno['idioma_desejado']); ?></p>
        <p><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($aluno['data_nascimento']); ?></p>
    </div>
</body>
</html>
<?php
// Fechar a conexão
$conn->close();
?>
