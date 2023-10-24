<!DOCTYPE html>
<html>
<head>
    <title>Editar Escola</title>
    <link rel="stylesheet" href="../css/editarEscolas.css">
</head>
<body>
    
    <div class="cadastro-container">
        <h1 class="cadastro-title">Editar Escola</h1>

        <?php
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "sistemaescolar";

        $conexao = new mysqli($host, $usuario, $senha, $banco);

        // Verifica se a conexão foi bem-sucedida
        if ($conexao->connect_error) {
            die("Conexão falhou: " . $conexao->connect_error);
        }

        // Verifica se um ID de escola foi passado via GET
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Query SQL para selecionar os dados da escola com base no ID
            $sql = "SELECT * FROM escola WHERE id = $id";

            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                $linha = $resultado->fetch_assoc();
                $escola = $linha['nomeEscola'];
                $endereco = $linha['endereco'];
                $professor = $linha['usuario'];
            } else {
                echo "Escola não encontrada.";
                exit;
            }
        } else {
            echo "ID de escola não fornecido.";
            exit;
        }

        // Verifica se o formulário de edição foi enviado
        if (isset($_POST['editar'])) {
            $escola_editada = $_POST['escola'];
            $endereco_editado = $_POST['endereco'];
            $professor_editado = $_POST['professor'];

            // Query SQL para atualizar os dados da escola
            $sql = "UPDATE escola SET nomeEscola = '$escola_editada', endereco = '$endereco_editado', usuario = '$professor_editado' WHERE id = $id";

            if ($conexao->query($sql) === TRUE) {
                echo '<script>alert("Escola editada com sucesso!");</script>';
            } else {
                echo "Erro na edição da escola: " . $conexao->error;
            }
        }

        // Fecha a conexão com o banco de dados
        $conexao->close();
        ?>

        <form method="post" action="editarEscolas.php?id=<?php echo $id; ?>">
            <div class="form-input-container">
                <label for="escola"> Nome da escola: </label>
                <input type="text" name="escola" class="form-input" value="<?php echo $escola; ?>" required>
                <label for="endereco"> Endereço: </label>
                <input type="text" name="endereco" class="form-input" value="<?php echo $endereco; ?>" required>
                <label for="professor"> Professor Vinculado: </label>
                <input type="text" name="professor" class="form-input" value="<?php echo $professor; ?>" required>
            </div>
            <div class="card-button">
            <a class="voltar-link" href="../pages/db.html">Retornar</a>
            <button class="cadastrar-button" type="submit" name="atualizar">Atualizar</button>
        </div>
        </form>
    </div>
</body>
</html>
