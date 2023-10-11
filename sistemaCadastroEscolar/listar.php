<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Dados de conexão com o banco de dados
            $host = "localhost"; // Host do banco de dados
            $usuario = "root"; // Nome de usuário do banco de dados
            $senha = ""; // Senha do banco de dados
            $banco = "sistemaescolar"; // Nome do banco de dados

            // Cria uma conexão com o banco de dados
            $conexao = new mysqli($host, $usuario, $senha, $banco);

            // Verifica se a conexão foi bem-sucedida
            if ($conexao->connect_error) {
                die("Conexão falhou: " . $conexao->connect_error);
            }

            // Consulta SQL para buscar todos os usuários
            $sql = "SELECT id, nome FROM usuario";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $linha["id"] . "</td>";
                    echo "<td>" . $linha["nome"] . "</td>";
                    echo "<td><a href='editar.php?id=" . $linha["id"] . "'>Editar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Nenhum usuário encontrado.</td></tr>";
            }

            // Fecha a conexão com o banco de dados
            $conexao->close();
            ?>
        </tbody>
    </table>
</body>
</html>
