<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['rememberMe']); // Chine-check kung naka-tick ang box

    if (!empty($username) && !empty($password)) {
        
        // --- REMEMBER ME LOGIC START ---
if ($remember) {
    // Save ID and Password (Note: Saving plain text passwords is not recommended for live sites)
    setcookie('remembered_student_id', $username, time() + (86400 * 30), "/");
    setcookie('remembered_password', $password, time() + (86400 * 30), "/"); 
} else {
    // Delete both cookies
    setcookie('remembered_student_id', '', time() - 3600, "/");
    setcookie('remembered_password', '', time() - 3600, "/");
}
        // --- REMEMBER ME LOGIC END ---

        $_SESSION['student_id'] = $username;
        $_SESSION['logged_in'] = true;

        header("Location: studentdashboard.php");
        exit();
    } else {
        header("Location: studentloginhtml.php?error=missing_fields");
        exit();
    }
}
?>