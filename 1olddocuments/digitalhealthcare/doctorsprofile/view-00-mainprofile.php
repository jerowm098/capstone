<?php
session_start();
require_once '../db_conn.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/loginhtml.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Kunin ang data sa database
$sql = "SELECT * FROM users WHERE id = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    // 1. Kuhanin ang raw data mula sa database
    $raw_fname = $user['first_name'] ?? $user['firstname'] ?? $user['fname'] ?? "User";
    $raw_lname = $user['last_name']  ?? $user['lastname']  ?? $user['lname'] ?? "";
    $email = $user['email'] ?? "";
    $phone = $user['contact_num'] ?? "";
    
    // 2. FUNCTION: Gawing Capital ang first letters (ucwords) at siguraduhing lowercase ang iba (strtolower)
    // Halimbawa: "jEROME" -> "Jerome" | "jerome mallari" -> "Jerome Mallari"
    $fname = ucwords(strtolower(trim($raw_fname)));
    $lname = ucwords(strtolower(trim($raw_lname)));

    // Birthday logic from create-account table columns
    $bMonth = $user['birth_month'] ?? "";
    $bDay = $user['birth_day'] ?? "";
    $bYear = $user['birth_year'] ?? "";
    /* $birthday = "$bMonth $bDay, $bYear"; */

    // Build a proper date string (Year-Month-Day)
    $date_string = "$bYear-$bMonth-$bDay";

    $db_password = $user['password'] ?? "";

    // Convert to "September 11, 1998"
    if (!empty($bMonth) && !empty($bDay) && !empty($bYear)) {
        $birthday = date("F j, Y", strtotime($date_string));
    } else {
        $birthday = "Not Set";
    }

    
    $gender = strtolower(trim($user['gender'] ?? "male"));




    
// --- SPECIALTY LOGIC (expertise from database) ---
// Kunin ang expertise mula sa database column
$raw_expertise = $user['expertise'] ?? "General Practitioner";

// Lilinisin natin ang format (halimbawa: "cardiologist" -> "Cardiologist")
$expertise = ucwords(strtolower(trim($raw_expertise)));

// Optional: Magdagdag ng suffix kung MD/PhD (kung wala pa sa input)
if (!str_contains($expertise, 'MD, PhD')) { $expertise .= " | MD, PhD"; }



    
} else {
    $fname = "User";
    $lname = "";
    $gender = "male";
}







// --- AGE CALCULATION LOGIC ---
if (!empty($bMonth) && !empty($bDay) && !empty($bYear)) {
    // Create a date string in YYYY-MM-DD format
    $birthDate = "$bYear-$bMonth-$bDay";
    
    // Create DateTime objects for the birthday and today
    $dob = new DateTime($birthDate);
    $now = new DateTime();
    
    // Calculate the difference
    $diff = $now->diff($dob);
    
    // Get the year difference
    $age = $diff->y;
} else {
    $age = "N/A";
}



// --- IMAGE LOGIC (Female with hair) ---
// --- GENDER & AVATAR LOGIC ---
// 1. I-set ang Title base sa gender
if ($gender === "female") {
    $title = "Dra.";
} else {
    $title = "Dr.";
}

// 2. I-set ang Avatar (Priority: Uploaded Photo > Gender Default)
// Idinagdag natin ang file_exists para siguradong valid ang file na ipapakita
if (!empty($user['profile_pix']) && file_exists($user['profile_pix'])) {
    // Kung may uploaded photo sa DB at nage-exist ang file, ito ang gagamitin
    $avatar_url = $user['profile_pix'];
} else {
    // Kung wala o hindi mahanap ang file, gagamit ng default icon base sa gender
    if ($gender === "female") {
        $avatar_url = "https://cdn-icons-png.flaticon.com/512/6833/6833591.png"; 
    } else {
        $avatar_url = "https://cdn-icons-png.flaticon.com/512/3135/3135715.png";
    }
}

// Specialty Logic
if (!isset($_SESSION['user_specialty'])) {
    $specs = ["Cardiologist | MD, PhD", "Neurologist | MD", "Pediatrician | MD, PhD", "Surgeon | MD"];
    $_SESSION['user_specialty'] = $specs[array_rand($specs)];
}
$display_spec = $_SESSION['user_specialty'];
?>