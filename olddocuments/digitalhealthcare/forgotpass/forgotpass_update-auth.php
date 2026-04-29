<?php
require_once '../db_conn.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $email = mysqli_real_escape_string($conn, $data['email']);
    $oldPassword = $data['oldPassword'];
    $newPassword = $data['newPassword'];

    // 1. I-check kung existing ang email at tama ang old password
    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // I-verify kung tugma ang lumang password (Plain text muna base sa loginauth.php mo)
        if ($oldPassword === $user['password']) {
            
            // 2. I-update ang password
            $updateSql = "UPDATE users SET password = '$newPassword' WHERE email = '$email'";
            
            if (mysqli_query($conn, $updateSql)) {
                echo json_encode(['status' => 'success', 'message' => 'Password updated successfully!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update password.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Incorrect old password.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email address not found.']);
    }
}
?>