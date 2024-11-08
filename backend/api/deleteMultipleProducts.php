<?php
// FILE: deleteMultipleProducts.php
header('Content-Type: application/json');
include('../config.php'); // Certifique-se de que o caminho está correto

// Obter os dados JSON enviados via POST
$input = json_decode(file_get_contents('php://input'), true);

if(isset($input['ids']) && is_array($input['ids'])){
    $ids = array_map('intval', $input['ids']); // Sanitiza os IDs

    // Converte o array de IDs em uma string separada por vírgulas
    $ids_str = implode(',', $ids);

    // Prepara a consulta SQL para deletar os produtos
    $sql = "DELETE FROM produtos WHERE id IN ($ids_str)";

    if($conn->query($sql) === TRUE){
        echo json_encode(['success' => true, 'message' => 'Produtos removidos com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao remover produtos: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Dados inválidos fornecidos.']);
}

$conn->close();
?>