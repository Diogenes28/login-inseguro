<?php
// Conexão com o banco de dados
require_once __DIR__ . '/config.php';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// ============================================================
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
$stmt->bind_param("ss", $usuario, $senha);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado && $resultado->num_rows > 0) {
    $linha = $resultado->fetch_assoc();
    echo "<h2>Bem-vindo, " . htmlspecialchars($linha['usuario']) . "!</h2>"; // ⚠️ XSS aqui
} else {
    echo "<h2>Usuário ou senha incorretos.</h2>";
    echo "<a href='login.html'>Voltar</a>";
}

$conn->close();
?>