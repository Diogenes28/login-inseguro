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

// =========================================
// ❌ VULNERABILIDADE: SQL Injection
// A entrada do usuário é inserida diretamente na SQL sem validação
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
$resultado = $conn->query($sql);


// ============================================================1
1

// ❌ VULNERABILIDADE: XSS
// Se o valor no banco tiver código malicioso, ele será exibido sem escape
if ($resultado && $resultado->num_rows > 0) {
    $linha = $resultado->fetch_assoc();
    echo "<h2>Bem-vindo, " . $linha['usuario'] . "!</h2>"; // ⚠️ XSS aqui
} else {
    echo "<h2>Usuário ou senha incorretos.</h2>";
    echo "<a href='login.html'>Voltar</a>";
}

// ✅ CORREÇÃO — Substitua a linha de exibição por:
/*
echo "<h2>Bem-vindo, " . htmlspecialchars($linha['usuario']) . "!</h2>";
*/

$conn->close();
?>