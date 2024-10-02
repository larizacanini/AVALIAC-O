<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $host = 'localhost';
        $db = 'avaliacao'; //nome do banco (09:05)
        $user = 'larissa';
        $pass = '123456789';
        $port = 3307; 
        require_once 'db.php'; //arquivo de conexão (09:10)
        $database = new Database($host, $db, $user, $pass, $port);
        $database->connect(); //permite a conexão (09:10)
        $pdo = $database->getConnection(); //varialvel pdo de consulta
    ?>
    </head>
</body>
<?php
        if (isset($_GET['nome']) && isset($_GET['idade']) && isset($_GET['email'])  && isset($_GET['curso'])) { //vai receber os dados do formulário (09:14)
         $nome = htmlspecialchars($_GET['nome']);
         $idade = htmlspecialchars($_GET['idade']);
         $email = htmlspecialchars($_GET['email']);
         $curso = htmlspecialchars($_GET['curso']); 


         $stmt = $pdo->prepare("INSERT into alunos (nome, idade, email, curso) values ('$nome', '$idade', '$email', '$curso');"); //codigo mysql de inserção dos dados recebidos do form (09:22)
         $stmt->execute();
         header("Location: index.php");
    
        } else{
            echo"Nenhum dado encontrado.";
        }


