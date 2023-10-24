<?php
$host = "localhost"; 
$usuario = "root"; 
$senha = ""; 
$banco = "sistemaescolar"; 


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
        header("Location: src/pages/db.html");    
    } else {
        echo "Senha incorreta!"; 
    }
} else {
    echo "Usuário não encontrado."; 
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
