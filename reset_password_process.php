<!-- reset_password_process.php -->
<?php
session_start();
require_once 'admin/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password !== $password_confirm) {
        $_SESSION['error_message'] = "Passwords do not match.";
        header("Location: reset_password.php?token=$token");
        exit();
    }

    // Validate the token again
    $sql = "SELECT email FROM password_resets WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $password_reset = $result->fetch_assoc();
        $email = $password_reset['email'];

        // Hash the new password
        $hashed_password = md5($password);

        // Update the user's password
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $email);
        if ($stmt->execute()) {
            // Delete the used token
            $sql = "DELETE FROM password_resets WHERE token = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $token);
            $stmt->execute();

            $_SESSION['success_message'] = "Your password has been reset successfully.";
            header("Location: login.php");
        } else {
            $_SESSION['error_message'] = "There was an error resetting your password.";
            header("Location: reset_password.php?token=$token");
        }
    } else {
        $_SESSION['error_message'] = "Invalid or expired token.";
        header("Location: forgot_password.php");
    }
}
?>
