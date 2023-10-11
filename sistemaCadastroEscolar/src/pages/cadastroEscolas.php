<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Escolas</title>
</head>
<body>
    <h1>Cadastro das escolas</h1>
    <form method="post" action="cadastroEscolas.php">
        <div class="form-input-container">
            <input type="text" name="escola" class="form-input" placeholder="Escola">
            <input type="text" name="endereco" class="form-input" placeholder="Endereço">
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
        $escola = $_POST['escola'];
        $endereco = $_POST['endereco'];

        // Cria uma conexão com o banco de dados
        $conexao = new mysqli($host, $usuario, $senha, $banco);

        // Verifica se a conexão foi bem-sucedida
        if ($conexao->connect_error) {
            die("Conexão falhou: " . $conexao->connect_error);
        }

        // Query SQL para inserir os dados do aluno na tabela "alunos"
        $sql = "INSERT INTO escola (nomeEscola, endereco) VALUES ('$escola', '$endereco')";

        if ($conexao->query($sql) === TRUE) {
            echo "Cadastro da escola bem-sucedido!";
        } else {
            echo "Erro no cadastro do aluno: " . $conexao->error;
        }

        // Fecha a conexão com o banco de dados
        $conexao->close();
    }
    ?>
</body>
</html>
