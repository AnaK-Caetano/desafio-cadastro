<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="../css/listaAlunos.css">
   
</head>

<body>
    <main>

    <div class="dash-grid table-container">
        <div class="tabela-titulo">
          <h1>Lista de Alunos vinculados</h1>
        </div>
        <?php
        // Conexão com o banco de dados (substitua pelos seus próprios dados)
        
        $host = "localhost"; 
        $usuario = "root";
        $senha = ""; 
        $banco = "sistemaescolar";

        $conn = new mysqli($host, $usuario, $senha, $banco);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Consulta SQL para selecionar todos os alunos
        $sql = "SELECT * FROM aluno";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='tabela'>";
            echo "<tr><th>ID</th><th>Nome</th><th>Data de Nascimento</th><th>CPF</th><th>Professor Responsável</th><th>Escola Vinculada</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["dataNascimento"] . "</td>";
                echo "<td>" . $row["cpf"] . "</td>";
                echo "<td>" . $row["professor"] . "</td>";
                echo "<td>" . $row["escola_id"] . "</td>";
                echo "<td><a href='editarAlunos.php?id=" . $row["id"] . "'>Editar</a></td>"; 
                echo "<td><a href='deletarAlunos.php?id=" . $row["id"] . "'>Deletar</a></td>"; 
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum aluno encontrado.";
        }

        // Feche a conexão com o banco de dados
        $conn->close();
        ?>

        <div class="card-button">
            <a class="voltar-link" href="../pages/db.html">Retornar</a>
        </div>
    </div>

    </main>
</body>
</html>