<?php
require_once '../db_conn.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data) {
        // 1. Pag-sanitize ng Email at Validation
        $email = mysqli_real_escape_string($conn, $data['email']);

        if (!preg_match("/^[a-zA-Z0-9._%+-]+@(gmail|yahoo|outlook|hotmail)\.(com|gov)$/i", $email)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email provider. Please use Gmail, Yahoo, Outlook, or Hotmail.']);
            exit;
        }
        
        // 2. Pag-sanitize ng iba pang inputs kasama ang bagong Contact
        $fname = mysqli_real_escape_string($conn, $data['fname']);
        $lname = mysqli_real_escape_string($conn, $data['lname']);
        $contact = mysqli_real_escape_string($conn, $data['contact']); // Mula sa JS 'contact'
        $gender = mysqli_real_escape_string($conn, $data['gender']);
        $expertise = mysqli_real_escape_string($conn, $data['expertise']); // <--- ADD THIS LINE
        $password = mysqli_real_escape_string($conn, $data['password']); 
        $month = mysqli_real_escape_string($conn, $data['bMonth']);
        $day = mysqli_real_escape_string($conn, $data['bDay']);
        $year = mysqli_real_escape_string($conn, $data['bYear']);

        // 3. Check kung existing email
        $checkEmail = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $checkEmail);

        if (mysqli_num_rows($result) > 0) {
            echo json_encode(['status' => 'error', 'message' => 'Email is already in use.']);
            exit;
        }

        /**
         * 4. INSERT QUERY 
         * Inayos ang arrangement: contact_num, gender, email
         */
        $sql = "INSERT INTO users (fname, lname, contact_num, gender, email, expertise, password, birth_month, birth_day, birth_year) 
                VALUES ('$fname', '$lname', '$contact', '$gender', '$email', '$expertise', '$password', '$month', '$day', '$year')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(['status' => 'success', 'message' => 'Account created!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . mysqli_error($conn)]);
        }
    }
    exit;
}
?>