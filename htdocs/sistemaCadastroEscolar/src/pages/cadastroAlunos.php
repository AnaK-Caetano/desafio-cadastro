<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="../css/cadastroAlunos.css">

</head>
<body>
<div class="cadastro-container">
            <h1 class="cadastro-title">Cadastro de Alunos</h1>
            <form method="post" action="cadastroAlunos.php">
                <div class="form-input-container">
                    <label for="nome"> Nome do Aluno: </label>
                    <input type="text" name="nome" class="form-input" placeholder="Nome" required>
                    <label for="dataNascimento">Data de nascimento: </label>
                    <input type="date" name="dataNascimento" class="form-input" placeholder="Data de Nascimento" required>
                    <label for="cpf">CPF: </label>
                    <input type="text" name="cpf" class="form-input" placeholder="CPF" required>
                    <label for="professor_id">Professor Responsável: </label>
                    <select name="professor_id" id="professor_id">
                        <option value="Maria do rosário">Maria do Rosário</option>
                        <option value="Sandra Chacon">Sandra Chacon</option>
                        <option value="Pedro Albino">Pedro Albino</option>
                        <option value="João Carvalho">João Carvalho</option>
                    </select>
                    <label for="escola_id">Escola vinculada: </label>
                    <select name="escola_id" id="escola_id">
                        <option value="ETE Porto Digital">ETE Porto Digital</option>
                        <option value="ETE Professor Agamemnon Magalhães">ETE Professor Agamemnon Magalhães</option>
                        <option value="ETE Cícero Dias">ETE Cícero Dias</option>
                        <option value="ETE Dom Bosco">ETE Dom Bosco</option>
                        <option value="Outra">Outra</option>
                    </select>
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
        $nome = $_POST['nome'];
        $dataNascimento = $_POST['dataNascimento'];
        $cpf = $_POST['cpf'];
        $professor = $_POST['professor_id'];
        $escola = $_POST['escola_id'];

        
        $conexao = new mysqli($host, $usuario, $senha, $banco);

        // Verifica se a conexão foi bem-sucedida
        if ($conexao->connect_error) {
            die("Conexão falhou: " . $conexao->connect_error);
        }

        // Query SQL para inserir os dados do aluno na tabela "alunos"
        $sql = "INSERT INTO aluno (nome, dataNascimento, cpf, professor, escola_id) VALUES ('$nome', '$dataNascimento', '$cpf', '$professor', '$escola')";
        
        if ($conexao->query($sql) === TRUE) {
            echo'<script>alert("Cadastro do aluno bem-sucedido!");</script>';

        } else {
            echo '<script>alert("Erro no cadastro do aluno: ' . $conexao->error . '");</script>';
        }

        $conexao->close();
        }
    ?>
</body>
</html>
