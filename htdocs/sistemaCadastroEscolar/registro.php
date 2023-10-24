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

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$datanasc = $_POST['datanasc'];
$escola = $_POST['escola'];

// Query SQL de inserção
$sql = "INSERT INTO usuario (nome, cpf, dataNasc, escola, senha) VALUES ('$nome', '$cpf', '$datanasc', '$escola', '$senha')";

// Executa a query de inserção
if ($conexao->query($sql) === TRUE) {
    echo "Inserção bem-sucedida!";
} else {
    echo "Erro na inserção: " . $conexao->error;
}

// Fecha a conexão com o banco de dados
$conexao->close();

// Redireciona à 
header("Location: index.html");
?>
