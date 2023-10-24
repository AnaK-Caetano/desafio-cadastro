<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Escolas</title>
    <link rel="stylesheet" href="../css/cadastroEscolas.css">
</head>
<body>
    <div class="cadastro-container">
        <h1 class="cadastro-title" >Cadastro das escolas</h1>
        <form method="post" action="cadastroEscolas.php">
            <div class="form-input-container">
                <label for="escola"> Nome da escola: </label>
                <input type="text" name="escola" class="form-input" placeholder="Escola">
                <label for="endereco"> Endereço: </label>
                <input type="text" name="endereco" class="form-input" placeholder="Endereço">
                <label for="professor"> Professor Vinculado </label>
                <input type="text" name="professor" class="form-input" placeholder="Professor">
                <div class="card-button">
                    <a class="voltar-link" href="../pages/db.html">Retornar</a>    
                    <button class="cadastrar-button" type="submit" name="cadastrar">Cadastre</button>
                </div>
            </div>
        </form>

    </div>

    <?php
    if (isset($_POST['cadastrar'])) {
        $host = "localhost"; 
        $usuario = "root";
        $senha = ""; 
        $banco = "sistemaescolar"; 

        // Dados do formulário
        $escola = $_POST['escola'];
        $endereco = $_POST['endereco'];
        $professor = $_POST['professor'];

        // Cria uma conexão com o banco de dados
        $conexao = new mysqli($host, $usuario, $senha, $banco);

        // Verifica se a conexão foi bem-sucedida
        if ($conexao->connect_error) {
            die("Conexão falhou: " . $conexao->connect_error);
        }

        // Query SQL para inserir os dados do aluno na tabela "alunos"
        $sql = "INSERT INTO escola (nomeEscola, endereco, usuario) VALUES ('$escola', '$endereco', '$professor')";

        if ($conexao->query($sql) === TRUE) {
            echo '<script>alert("Cadastro da escola bem-sucedido!");</script>';
        } else {
            echo "Erro no cadastro da escola: " . $conexao->error;
        }

        $conexao->close();
    }
    ?>
</body>
</html>