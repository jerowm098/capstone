<?php
session_start();
require_once '../db_conn.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kunin ang JSON data mula sa login.js
    $data = json_decode(file_get_contents('php://input'), true);


    
    if ($data) {
        // Siguraduhin na tama ang spelling ng mysqli_real_escape_string
        $email = mysqli_real_escape_string($conn, $data['email']);
        $password = $data['password'];

        // I-search ang user gamit ang email
        $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // --- DIRECT COMPARISON (PLAIN TEXT) ---
            // Kinukumpara natin ang ininput na password sa password na nasa database
            if ($password === $user['password']) {
                
                // SUCCESS: I-save sa session ang info ng user
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fname'] = $user['fname'];
                $_SESSION['email'] = $user['email'];

                echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
            } else {
                // MALI ANG PASSWORD
                echo json_encode(['status' => 'error', 'message' => 'Incorrect password.']);
            }
        } else {
            // HINDI HANAP ANG EMAIL
            echo json_encode(['status' => 'error', 'message' => 'Email not found.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No data received.']);
    }
    
    exit;

    
}
?>