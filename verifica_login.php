<?php
// Conexão com o banco de dados
require_once __DIR__ . '/config.php';

// Conecta ao banco usando mysqli
$conn = new mysqli($host, $user, $pass, $db);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário via POST
$usuario = $_POST['usuario'];
$senha   = $_POST['senha'];

/*
 * 🚨 VULNERABILIDADE: SQL Injection
 * Os dados do usuário estão sendo inseridos diretamente na query SQL
 * sem nenhum tipo de validação ou preparo.
 */
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

/*
 * 🧪 VISUALIZAÇÃO DA INJEÇÃO
 * Mostra a query gerada se detectarmos possíveis tentativas de ataque (ex: ' OR 1=1 --)
 * Isso é útil para testes e demonstrações.
 */
if (str_contains($usuario, "'") || str_contains($usuario, "--") || str_contains($usuario, "OR")) {
    echo "<p><strong>SQL gerada:</strong> $sql</p>";
}

// Executa a query no banco de dados
$resultado = $conn->query($sql);

// Se encontrar um usuário com os dados fornecidos
if ($resultado && $resultado->num_rows > 0) {
    $linha = $resultado->fetch_assoc();
    
    // Mostra mensagem de sucesso
    echo "<h2>Login bem-sucedido! Bem-vindo, " . htmlspecialchars($linha['usuario']) . ".</h2>";
} else {
    // Caso contrário, exibe erro genérico
    echo "<h2>Usuário ou senha incorretos.</h2>";
    echo "<a href='login.html'>Voltar para o login</a>";
}

// Fecha a conexão com o banco
$conn->close();
?>
