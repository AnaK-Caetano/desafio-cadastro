<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <?php
    // Dados de conexão com o banco de dados (mesmos dados usados na página de listagem)
    $host = "localhost"; // Host do banco de dados
    $usuario = "root"; // Nome de usuário do banco de dados
    $senha = ""; // Senha do banco de dados
    $banco = "sistemaescolar"; // Nome do banco de dados

    // Verifica se o ID do usuário foi passado pela URL
    if (isset($_GET['id'])) {
        $idDoUsuario = $_GET['id'];

        // Cria uma conexão com o banco de dados
        $conexao = new mysqli($host, $usuario, $senha, $banco);

        // Verifica se a conexão foi bem-sucedida
        if ($conexao->connect_error) {
            die("Conexão falhou: " . $conexao->connect_error);
        }

        // Consulta SQL para buscar os dados do usuário com base no ID
        $sql = "SELECT nome FROM usuario WHERE id = $idDoUsuario";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
            $nomeAtual = $linha["nome"];
        } else {
            echo "Usuário não encontrado.";
        }

        // Fecha a conexão com o banco de dados
        $conexao->close();
    } else {
        echo "ID do usuário não especificado.";
    }
    ?>
    <form method="post" action="atualizar.php">
        <input type="hidden" name="id" value="<?php echo $idDoUsuario; ?>">
        <div class="form-input-container">
            <input type="text" name="nome" class="form-input" placeholder="Nome" value="<?php echo $nomeAtual; ?>">
            <input type="submit" name="atualizar" value="Atualizar">
        </div>
    </form>
</body>
</html>
