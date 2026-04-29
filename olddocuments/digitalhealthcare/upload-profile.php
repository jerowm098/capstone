<!-- part to o kadugtung nito ay ang edit profile tab or ung view-02.1-editprofiletabhtml.php -->

<?php
session_start();
require_once 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $user_id = $_SESSION['user_id'];
    $file = $_FILES['image'];

    // Folder kung saan ise-save ang picture
    $target_dir = "uploads/profile_pics/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $new_filename = "user_" . $user_id . "_" . time() . "." . $file_extension;
    $target_file = $target_dir . $new_filename;

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        // I-update ang database (siguraduhin na may column na 'profile_pix' ang users table mo)
        $sql = "UPDATE users SET profile_pix = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $target_file, $user_id);
        
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "path" => $target_file]);
        } else {
            echo json_encode(["status" => "error", "message" => "Database update failed"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Upload failed"]);
    }
}
?>