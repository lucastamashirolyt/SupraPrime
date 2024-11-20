<?php
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $params);
    $user_id = intval($params['id']);

    if ($user_id <= 0) {
        echo json_encode(['success' => false, 'message' => 'ID de usuário inválido.']);
        exit();
    }

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Usuário deletado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao deletar usuário.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
}
?>
