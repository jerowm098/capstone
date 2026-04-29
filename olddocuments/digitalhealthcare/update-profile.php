<?php
session_start();
require_once 'db_conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // 1. Kuhanin ang mga basic info
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $raw_contact = trim($_POST['contact_num']);
    $contact_num = "+639" . $raw_contact; 
    $gender = trim($_POST['gender']);
    $email = trim($_POST['email']);
    $expertise = trim($_POST['expertise']);
    $birth_month = $_POST['birth_month'];
    $birth_day = $_POST['birth_day'];
    $birth_year = $_POST['birth_year'];

    // 2. PASSWORD LOGIC: I-check kung may bagong password na nilagay
    $new_password = $_POST['new_password'];
    $is_updating_password = !empty($new_password);

    if ($is_updating_password) {
        // Kung may bagong password, isama sa SQL query
        $sql = "UPDATE users SET 
                fname = ?, lname = ?, contact_num = ?, gender = ?, 
                email = ?, expertise = ?, birth_month = ?, 
                birth_day = ?, birth_year = ?, password = ? 
                WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        // Note: 's' ang dagdag para sa password string
        $stmt->bind_param("sssssssiiis", 
            $fname, $lname, $contact_num, $gender, 
            $email, $expertise, $birth_month, 
            $birth_day, $birth_year, $new_password, $user_id
        );
    } else {
        // Kung walang bagong password, gamitin ang lumang SQL mo
        $sql = "UPDATE users SET 
                fname = ?, lname = ?, contact_num = ?, gender = ?, 
                email = ?, expertise = ?, birth_month = ?, 
                birth_day = ?, birth_year = ? 
                WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssiii", 
            $fname, $lname, $contact_num, $gender, 
            $email, $expertise, $birth_month, 
            $birth_day, $birth_year, $user_id
        );
    }

    // 3. I-execute at mag-redirect
    if ($stmt->execute()) {
        $_SESSION['user_specialty'] = $expertise . " | MD, PhD";
        header("Location: doctorsprofile/view-00-mainprofilehtml.php?status=success");
        exit();
    } else {
        header("Location: doctorsprofile/view-00-mainprofilehtml.php?status=error");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: login/loginhtml.php");
    exit();
}
?>