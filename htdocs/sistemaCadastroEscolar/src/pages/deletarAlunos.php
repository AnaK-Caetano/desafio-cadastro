<?php
$host = "localhost"; 
$usuario = "root";
$senha = ""; 
$banco = "sistemaescolar"; 

$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $idDoAluno = $_GET["id"];
    
    // Consulta SQL para excluir o aluno com base no ID
    $sql = "DELETE FROM aluno WHERE id = $idDoAluno";
    
    if ($conexao->query($sql) === TRUE) {
        echo "Aluno excluído com sucesso.";
    } else {
        echo "Erro ao excluir o aluno: " . $conexao->error;
    }
} else {
    echo "ID do aluno não válido.";
}

// Voltar para a lista de alunos após a exclusão
echo '<br><a href="listaAlunos.php">Voltar para a lista de alunos</a>';
?>
