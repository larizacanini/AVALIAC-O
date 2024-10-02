<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário</title>
        <link rel = "stylesheet" href="style.css">
</head>
<body>
    <h1>Formulário</h1>
    <form action="cadastro.php" method="GET"> 
        <input type="text" id="nome" name="nome" placeholder="Nome" required><br><br>
        <input type="text" id="idade" name="idade" placeholder="Idade" required><br><br>
        <input type="email" id="email" name="email" placeholder="Email" required><br><br>
        <input type="text" id="curso" name="curso" placeholder="Curso" required><br><br>

        <input type="submit" value="Enviar">
</form>
<h2 class="table-title">Tabela de Registros</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Exclusão</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $message = '';
            // Conexão com o banco de dados (09:30)
            $host = 'localhost';
            $db = 'avaliacao';
            $user = 'larissa';
            $pass = '123456789';
            $port = 3307; 
            require_once 'db.php';
            $database = new Database($host, $db, $user, $pass, $port);
            $database->connect();
            $pdo = $database->getConnection();

            // Consulta para buscar alunos (09:32)
            $stmt = $pdo->prepare("SELECT * FROM alunos");
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Exibir alunos na tabela (09:36)
foreach ($alunos as $aluno) {
    echo "<tr>
            <td>" . htmlspecialchars($aluno['nome']) . "</td>
            <td>" . htmlspecialchars($aluno['idade']) . "</td>
            <td>" . htmlspecialchars($aluno['email']) . "</td>
            <td>" . htmlspecialchars($aluno['curso']) . "</td>
            <td><a href='deletar.php?id=" . htmlspecialchars($aluno['id']) . "' class='delete-link' onclick='return confirm(\"Você tem certeza que deseja excluir este aluno?\");'>Excluir</a></td>
          </tr>"; //para deletar um aluno (10:30)
}
            ?>
        </tbody>
    </table>
</body>
</html>
</body>
</html>