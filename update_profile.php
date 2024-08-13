<?php
session_start();
include 'admin/includes/db.php';

$username = $_SESSION['username'];

// Handle profile image update
if (isset($_POST['update_image'])) {
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "admin/uploads/";
        $image_name = basename($_FILES["profileImage"]["name"]);
        $target_file = $target_dir . $image_name;
        
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
            // Use mysqli prepared statement
            $stmt = $conn->prepare("UPDATE users SET avatar = ? WHERE username = ?");
            $stmt->bind_param("ss", $image_name, $username);
            $stmt->execute();
            
            if ($stmt->affected_rows > 0) {
                $_SESSION['message'] = 'Profile image updated successfully.';
            } else {
                $_SESSION['error'] = 'No changes made to the profile image.';
            }

            $stmt->close();
        } else {
            $_SESSION['error'] = 'There was an error uploading your file.';
        }
    }
    header('Location: profile.php');
    exit();
}

// Handle password update
if (isset($_POST['update_password'])) {
    $currentPassword = md5($_POST['currentPassword']);
    $newPassword = md5($_POST['newPassword']);
    $confirmPassword = md5($_POST['confirmPassword']);

    // Use mysqli prepared statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $currentPassword === $user['password']) {
        if ($newPassword === $confirmPassword) {
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
            $stmt->bind_param("ss", $newPassword, $username);
            $stmt->execute();
            
            if ($stmt->affected_rows > 0) {
                $_SESSION['message'] = 'Password updated successfully.';
            } else {
                $_SESSION['error'] = 'No changes made to the password.';
            }

            $stmt->close();
        } else {
            $_SESSION['error'] = 'New passwords do not match.';
        }
    } else {
        $_SESSION['error'] = 'Current password is incorrect.';
    }

    header('Location: profile.php');
    exit();
}
?>
