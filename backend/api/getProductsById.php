<?php

header('Content-Type: application/json');

// Start output buffering
// ob_start(); // Optional: Remove if not needed

// Disable error display
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

// Log errors to a file
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log');

// Include the configuration file
include_once('config.php');

// Check if 'id' parameter is present and valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT id, nome, preco, imagem FROM produtos WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if product exists
        if ($result->num_rows > 0) {
            $produto = $result->fetch_assoc();
            echo json_encode([
                'success' => true,
                'produto' => [
                    'id' => $produto['id'],
                    'nome' => $produto['nome'],
                    'preco' => floatval($produto['preco']),
                    'imagem' => $produto['imagem']
                ]
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Produto não encontrado.']);
        }

        $stmt->close();
    } else {
        // Error preparing the statement
        error_log("Erro na preparação da consulta: " . $conn->error);
        echo json_encode(['success' => false, 'message' => 'Erro interno do servidor.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID do produto não fornecido ou inválido.']);
}

// Close the connection
$conn->close();