<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Alunos</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <form method="post" action="cadastroAlunos.php">
        <div class="form-input-container">
            <input type="text" name="nome" class="form-input" placeholder="Nome">
            <input type="date" name="dataNascimento" class="form-input" placeholder="Data de Nascimento">
            <input type="text" name="cpf" class="form-input" placeholder="CPF">
            <button type="submit" name="cadastrar">Cadastre agora</button>
        </div>
    </form>

    <?php
    if (isset($_POST['cadastrar'])) {
        // Dados de conexão com o banco de dados
        $host = "localhost"; // Host do banco de dados
        $usuario = "root"; // Nome de usuário do banco de dados
        $senha = ""; // Senha do banco de dados
        $banco = "sistemaescolar"; // Nome do banco de dados

        // Dados do formulário
        $nome = $_POST['nome'];
        $dataNascimento = $_POST['dataNascimento'];
        $cpf = $_POST['cpf'];

        // Cria uma conexão com o banco de dados
        $conexao = new mysqli($host, $usuario, $senha, $banco);

        // Verifica se a conexão foi bem-sucedida
        if ($conexao->connect_error) {
            die("Conexão falhou: " . $conexao->connect_error);
        }

        // Query SQL para inserir os dados do aluno na tabela "alunos"
        $sql = "INSERT INTO aluno (nome, dataNascimento, cpf) VALUES ('$nome', '$dataNascimento', '$cpf')";

        if ($conexao->query($sql) === TRUE) {
            echo "Cadastro do aluno bem-sucedido!";
        } else {
            echo "Erro no cadastro do aluno: " . $conexao->error;
        }

        // Fecha a conexão com o banco de dados
        $conexao->close();
    }
    ?>
</body>
</html>
