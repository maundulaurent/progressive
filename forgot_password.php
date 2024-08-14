<?php
session_start();
require_once 'admin/includes/db.php';
require 'vendor/autoload.php'; // Adjust the path if necessary

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $token = bin2hex(random_bytes(50)); // Generate a unique token
        $exp_time = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token expiry time (1 hour from now)

        // Insert token into the password_resets table
        $sql = "INSERT INTO password_resets (email, token, exp_time) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $email, $token, $exp_time);
        $stmt->execute();

        // Send the password reset email using PHPMailer
        $reset_link = "http://yourwebsite.com/reset_password.php?token=" . $token;

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'charlesmaundu16@gmail.com'; // Your Gmail address
            $mail->Password = '0796AAAbb0'; // Your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('no-reply@yourwebsite.com', 'Recipe Website');
            $mail->addAddress($email); // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Hi " . $user['username'] . ",<br><br>";
            $mail->Body   .= "We received a request to reset your password. Click the link below to reset your password:<br><br>";
            $mail->Body   .= "<a href='" . $reset_link . "'>Reset Password</a><br><br>";
            $mail->Body   .= "If you did not request a password reset, please ignore this email.<br><br>";
            $mail->Body   .= "Thanks,<br>Your Website Team";

            $mail->send();
            $_SESSION['success_message'] = "A password reset link has been sent to your email.";
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Failed to send password reset email. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['error_message'] = "No account found with that email address.";
    }
    header("Location: forgot_password.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
</head>
<body>
    <?php include_once 'includes/navbar.php'; ?>

    <main class="main">
        <div class="container">
            <h2>Forgot Password</h2>
            <?php
            if (isset($_SESSION['success_message'])) {
                echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                unset($_SESSION['success_message']);
            }
            if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']);
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Enter your email address:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>

    <?php include_once 'includes/footer.php'; ?>
</body>
</html>
