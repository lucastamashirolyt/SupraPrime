<?php
// FILE: testInclude.php

// Definir o caminho absoluto para o arquivo config.php
$configPath = __DIR__ . '/../backend/api/config.php'; // Ajuste se necessário

// Verifica se o arquivo de configuração existe
if (!file_exists($configPath)) {
    die("Arquivo de configuração não encontrado: {$configPath}");
}

// Inclui o arquivo de configuração
include($configPath);

// Verifica se a conexão com o banco de dados foi estabelecida
if (!isset($conn)) {
    die("Conexão com o banco de dados não está definida.");
}

echo "Inclusão bem-sucedida! Conexão estabelecida.";
?>