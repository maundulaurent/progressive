<!-- reset_password.php -->
<?php
session_start();
require_once 'admin/includes/db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validate the token
    $sql = "SELECT * FROM password_resets WHERE token = ? AND exp_time > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $password_reset = $result->fetch_assoc();
        $email = $password_reset['email'];
    } else {
        $_SESSION['error_message'] = "Invalid or expired token.";
        header("Location: forgot_password.php");
        exit();
    }
} else {
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
    <title>Reset Password</title>
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
</head>
<body>
    <?php include_once 'includes/navbar.php'; ?>

    <main class="main">
        <div class="container">
            <h2>Reset Password</h2>
            <?php
            if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']);
            }
            ?>
            <form action="reset_password_process.php" method="post">
                <div class="form-group">
                    <label for="password">Enter new password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm new password:</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
                </div>
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    </main>

    <?php include_once 'includes/footer.php'; ?>
</body>
</html>
