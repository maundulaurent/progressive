<?php
session_start();
include 'admin/includes/db.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST request
    $recipe_name = $_POST['recipe_name'] ?? '';
    $ingredients = json_decode($_POST['ingredients'], true) ?? [];
    $description = $_POST['description'] ?? '';

    // check if user is logged in and get username
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        $response['message'] = 'User is not logged in.';
        echo json_encode($response);
        exit();
    }
    // Validate inputs
    if (empty($recipe_name) || empty($ingredients)) {
        $response['message'] = 'Recipe name or ingredients are missing.';
        echo json_encode($response);
        exit();
    }

    // Prepare and execute the query to save the recipe
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=recipe', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert recipe into database
        $stmt = $pdo->prepare("INSERT INTO saved_recipes (name, ingredients, description, type, username) VALUES (?, ?, ?, 'shared', ?)");
        $stmt->execute([$recipe_name, json_encode($ingredients), $description, $username]);

        $response['success'] = true;
        $response['message'] = 'Recipe shared successfully!';
    } catch (PDOException $e) {
        $response['message'] = 'Database error: ' . $e->getMessage();
    }

    echo json_encode($response);
}
?>
