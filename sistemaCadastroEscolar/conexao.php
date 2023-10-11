<?php
// Dados de conexão com o banco de dados
$host = "localhost"; // Host do banco de dados
$usuario = "root"; // Nome de usuário do banco de dados
$senha = ""; // Senha do banco de dados
$banco = "sistemaescolar"; // Nome do banco de dados

// Cria uma conexão com o banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}



// Agora você pode realizar operações no banco de dados, como consultas SQL, inserções, atualizações, etc.

// Quando terminar, é importante fechar a conexão
$conexao->close();
?>
