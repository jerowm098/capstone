<?php
session_start();

// Temporary logic: Sa totoong database, dito mo iche-check kung match sila.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Para sa demo: kahit anong input basta may laman, papasukin natin.
    if (!empty($username) && !empty($password)) {
        
        // I-save natin sa Session para mabasa ng Dashboard
        $_SESSION['student_id'] = $username;
        $_SESSION['logged_in'] = true;

        // I-redirect sa Dashboard
        header("Location: studentdashboard.php");
        exit();
    } else {
        header("Location: studentloginhtml.php?error=missing_fields");
        exit();
    }
}
?>