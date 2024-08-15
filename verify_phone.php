<?php
session_start();
require_once 'admin/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_code = $_POST['verification_code'];
    $phone_number = $_SESSION['phone_number'];

    // Fetch the stored verification code from the database
    $sql = "SELECT verification_code FROM users WHERE phone_number = ? AND is_verified = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone_number);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($stored_code);
        $stmt->fetch();

        if ($input_code == $stored_code) {
            // Update user to verified
            $update_sql = "UPDATE users SET is_verified = 1 WHERE phone_number = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("s", $phone_number);
            $update_stmt->execute();
            $_SESSION['phone_verified'] = true;
            header("location: success.php"); // Redirect to a success page or dashboard
        } else {
            $error = "Invalid verification code.";
        }
    } else {
        $error = "Phone number not found or already verified.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Phone Verification">
    <meta name="keywords" content="verification, phone">
    <title>Verify Phone - Recipe Generator</title>
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
</head>
<body>
<?php include_once 'includes/preloader.php'; ?>

<?php include_once 'includes/navbar.php'; ?>
<main class="main">
    <section class="section mt-120 mb-100"> 
        <div class="container-sub"> 
            <div class="text-center"> 
                <h2 class="heading-44-medium">Verify Your Phone Number</h2>
                <p class="color-text text-14">We need to verify your phone number to complete the registration.</p>
                <p class="color-text text-14">Your phone number: <?php echo htmlspecialchars($_SESSION['phone_number']); ?></p>
                <?php 
                if (!empty($error)) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label class="form-label" for="verification_code">Enter Verification Code</label>
                        <input class="form-control" id="verification_code" name="verification_code" type="text" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Verify</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/scripts.php'; ?>
</body>
</html>

