<?php
// Siguraduhin na walang space sa itaas ng <?php
session_start();
require_once 'db_conn.php';

// I-set ang header para malaman ng JS na JSON ito
header('Content-Type: application/json');

$response = ["status" => "error", "message" => "Invalid Request"];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    if ($id == $_SESSION['user_id']) {
        $response = ["status" => "error", "message" => "You cannot delete yourself!"];
    } else {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $response = ["status" => "success"];
        } else {
            $response = ["status" => "error", "message" => "Database error: " . $conn->error];
        }
    }
}

echo json_encode($response);
exit(); // Siguraduhing tumigil dito ang script
?>