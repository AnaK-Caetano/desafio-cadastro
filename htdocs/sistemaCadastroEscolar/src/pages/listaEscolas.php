<!DOCTYPE html>
<html>
<head>
    <title>Lista de Escolas Cadastradas</title>
    <link rel="stylesheet" href="../css/listaEscolas.css">
</head>
<body>
    <main>
    <div class="dash-grid table-container">
        <h1 class="tabela-titulo">Lista de Escolas Cadastradas</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome da Escola</th>
                <th>Endereço</th>
                <th>Professor Vinculado</th>
            </tr>

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

            // Query SQL para selecionar todos os dados da tabela "escola"
            $sql = "SELECT * FROM escola";

            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $linha['id'] . '</td>';
                    echo '<td>' . $linha['nomeEscola'] . '</td>';
                    echo '<td>' . $linha['endereco'] . '</td>';
                    echo '<td>' . $linha['usuario'] . '</td>';
                    echo "<td><a href='editarEscolas.php?id=" . $linha["id"] . "'>Editar</a></td>"; 
                    echo "<td><a href='deletarEscolas.php?id=" . $linha["id"] . "'>Deletar</a></td>"; 
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">Nenhum registro encontrado na tabela escola.</td></tr>';
            }

            // Fecha a conexão com o banco de dados
            $conexao->close();
            ?>
        </table>
        <div class="card-button">
            <a class="voltar-link" href="../pages/db.html">Retornar</a>
        </div>
    </div>
    </main>
</body>
</html>
