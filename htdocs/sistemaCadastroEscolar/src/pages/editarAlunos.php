<!DOCTYPE html>
<html>
<head>
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="../css/editarAlunos.css">
</head>
<body>
<div class="cadastro-container">
    <h1 class="cadastro-title">Editar Aluno</h1>

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

    // Variável para armazenar o ID do aluno
    $idDoAluno = null;

    // Inicializar variáveis
    $nomeAtual = $dataNascimentoAtual = $cpfAtual = $professorAtual = $escolaAtual = '';

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupere o ID do aluno
        $idDoAluno = $_POST["id"];
        // Resto do código para atualizar os campos
        $novoNome = $_POST["novo_nome"];
        $novaDataNascimento = $_POST["nova_dataNascimento"];
        $novoCPF = $_POST["novo_cpf"];
        $novoProfessor = $_POST["novo_professor"];
        $novaEscola = $_POST["nova_escola"];
        
        // Preparar a consulta SQL
        $sql = "UPDATE aluno SET nome = ?, dataNascimento = ?, cpf = ?, professor = ?, escola_id = ? WHERE id = ?";
        
        // Preparar a declaração
        $stmt = $conexao->prepare($sql);
        
        // Verificar se a preparação da declaração foi bem-sucedida
        if ($stmt) {
        // Vincular os parâmetros
        $stmt->bind_param("sssssi", $novoNome, $novaDataNascimento, $novoCPF, $novoProfessor, $novaEscola, $idDoAluno);
        
        // Executar a declaração
        if ($stmt->execute()) {
            echo '<script>alert("Campos atualizados com sucesso.");</script>';
        } else {
            echo '<script>alert("Erro ao atualizar os campos: ' . $stmt->error . '");</script>';
        }
        
        // Fechar a declaração
        $stmt->close();
    } else {
        echo "Erro na preparação da declaração: " . $conexao->error;
    }
}

    // Consulta SQL para buscar os dados do aluno com base no ID
    if (!empty($idDoAluno)) {
        $sql = "SELECT * FROM aluno WHERE id = $idDoAluno";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
            $nomeAtual = isset($linha["nome"]) ? $linha["nome"] : '';
            $dataNascimentoAtual = isset($linha["dataNascimento"]) ? $linha["dataNascimento"] : '';
            $cpfAtual = isset($linha["cpf"]) ? $linha["cpf"] : '';
            $professorAtual = isset($linha["professor"]) ? $linha["professor"] : '';
            $escolaAtual = isset($linha["escola_id"]) ? $linha["escola_id"] : '';
        } else {
            echo "Aluno não encontrado.";
        }
    }
?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-input-container">

        <input type="hidden" name="id" value="<?php echo $idDoAluno; ?>">
        <label for="novo_nome">Atualizar nome do Aluno:</label>
        <input type="text" name="novo_nome" value="<?php echo $nomeAtual; ?>" required>
        <label for="nova_dataNascimento">Atualizar Data de Nascimento:</label>
        <input type="date" name="nova_dataNascimento" value="<?php echo $dataNascimentoAtual; ?>" required>
        <label for="novo_cpf">Atualizar CPF:</label>
        <input type="text" name="novo_cpf" value="<?php echo $cpfAtual; ?>" required>
        <label for="novo_professor">Novo Professor Responsável:</label>
        <input type="text" name="novo_professor" value="<?php echo $professorAtual; ?>" required>
        <label for="nova_escola">Nova Escola Vinculada:</label>
        <select name="nova_escola" id="nova_escola">
            <option value="ETE Porto Digital" <?php if ($escolaAtual == 'ETE Porto Digital') echo "selected"; ?>>ETE Porto Digital</option>
            <option value="ETE Professor Agamemnon Magalhães" <?php if ($escolaAtual == 'ETE Professor Agamemnon Magalhães') echo "selected"; ?>>ETE Professor Agamemnon Magalhães</option>
            <option value="ETE Cícero Dias" <?php if ($escolaAtual == 'ETE Cícero Dias') echo "selected"; ?>>ETE Cícero Dias</option>
            <option value="ETE Dom Bosco" <?php if ($escolaAtual == 'ETE Dom Bosco') echo "selected"; ?>>ETE Dom Bosco</option>
        </select>
    </div>


        <div class="card-button">
            <a class="voltar-link" href="../pages/db.html">Retornar</a>
            <button class="cadastrar-button" type="submit" name="atualizar">Atualizar</button>
        </div>
    </form>
</div>
</body>
</html>