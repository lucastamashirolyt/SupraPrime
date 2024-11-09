<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: login.php'); // Redireciona para a página de login se não for administrador
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Usuários</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Gerenciar Usuários</h1>
    <!-- Add your user management code here -->
</body>
</html>