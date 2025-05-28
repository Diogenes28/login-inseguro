<?php
// Conexão com o banco de dados (MAMP padrão)
require_once __DIR__ . '/config.php';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário (sem validação proposital)
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Consulta vulnerável a SQL Injection
$sql = "SELECT * FROM usuarios WHERE usuario =? AND senha =?";

// Mostrar a SQL gerada APENAS para testes (vulnerável a XSS)
if (str_contains($sql, "'") || str_contains($sql, "--") || str_contains($sql, "OR")) {
    echo htmlentities("<p><strong>SQL gerada:</strong> $sql"); // vulnerável a XSS se $sql for malicioso
}

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario =? AND senha =?");
$stmt->bind_param('ss', $usuario, $senha);
$stmt->
 $stmt->bindParam(':senha', $senha);
 $stmt->execute(); // executes the prepared statement
 $stmt->execute();

if ($resultado && $resultado->num_rows > 0) {
    $linha = $resultado->fetch_assoc();
    echo "<h2>Login bem-sucedido! Bem-vindo, ". htmlentities($linha['usuario']). ".</h2>"; // vulnerável a XSS
} else {
    echo "<h2>Usuário ou senha incorretos.</h2>";
    echo "<a href='login.html'>Voltar para o login</a>";
}

$conn->close();
?>
