<?php
header('Content-Type: application/json');
require_once 'database_connection.php'; // Adjust the path as needed

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Perform database query to get product by ID
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $produto = mysqli_fetch_assoc($result);
        echo json_encode(['success' => true, 'produto' => $produto]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Produto não encontrado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID do produto não fornecido.']);
}
?>