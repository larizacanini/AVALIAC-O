<?php
$message = '';
$host = 'localhost';
$db = 'avaliacao'; 
$user = 'larissa';
$pass = '123456789';
$port = 3307; 
require_once 'db.php';

$database = new Database($host, $db, $user, $pass, $port);
$database->connect();
$pdo = $database->getConnection();

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    
    // Excluindo aluno (10:20)
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        $message = '<div class="success-message">Aluno excluído com sucesso!</div>';
    } else {
        $message = '<div class="error-message">Erro ao excluir aluno.</div>';
    }
} else {
    $message = '<div class="error-message">ID do aluno não especificado.</div>';
}

echo $message; // Exibe a mensagem
// Redirecionar de volta para a página principal (10:22)
header("Location: index.php");
exit();
?>