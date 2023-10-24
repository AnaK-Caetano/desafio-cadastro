<?php
$host = "localhost"; 
$usuario = "root";
$senha = ""; 
$banco = "sistemaescolar"; 

// Cria uma conexão com o banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Verifica se um ID de escola foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query SQL para excluir a escola com base no ID
    $sql = "DELETE FROM escola WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo '<script>alert("Escola excluída com sucesso!");</script>';
    } else {
        echo '<script>alert("Escola excluída com sucesso!");</script>';
    }
}

echo '<br><a class"botao-retorno" href="listaEscolas.php">Voltar para a lista de escolas</a>';
// Fecha a conexão com o banco de dados
$conexao->close();
?>