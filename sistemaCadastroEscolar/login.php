<?php
// Dados de conexão com o banco de dados
$host = "localhost"; // Host do banco de dados
$usuario = "root"; // Nome de usuário do banco de dados
$senha = ""; // Senha do banco de dados
$banco = "sistemaescolar"; // Nome do banco de dados

// Dados fornecidos pelo usuário
// Esta é a senha fornecida pelo usuário

// Cria uma conexão com o banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
$nome = $_POST['nome'];
$senha = $_POST['senha'];

// Consulta SQL para obter a senha do usuário
$sql = "SELECT senha FROM usuario WHERE senha = '$senha'";

$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $senhaArmazenada = $row["senha"];
        
    // Verifica se a senha inserida pelo usuário corresponde à senha armazenada
    if ($senha === $senhaArmazenada) {
        header("Location: src/pages/dashboard.html");    
    } else {
        echo "Senha incorreta!"; // A senha está incorreta
    }
} else {
    echo "Usuário não encontrado."; // O usuário não foi encontrado
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
