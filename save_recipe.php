<?php
session_start();
include 'admin/includes/db.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['username'])) {
        $response['message'] = 'User not logged in.';
        echo json_encode($response);
        exit();
    }

    $username = $_SESSION['username'];
    $recipe_name = $_POST['recipe_name'] ?? '';
    $ingredients = $_POST['ingredients'] ?? '';
    $description = $_POST['description'] ?? '';
    $type = $_POST['type'] ?? 'saved';

    // Validate inputs
    if (empty($recipe_name) || empty($ingredients)) {
        $response['message'] = 'Recipe name or ingredients are missing.';
        echo json_encode($response);
        exit();
    }

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=recipe', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert recipe into database
        $stmt = $pdo->prepare("INSERT INTO saved_recipes (name, ingredients, description, type, username) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$recipe_name, $ingredients, $description, $type, $username]);

        $response['success'] = true;
        $response['message'] = 'Recipe saved successfully!';
    } catch (PDOException $e) {
        $response['message'] = 'Database error: ' . $e->getMessage();
    }

    echo json_encode($response);
}
?>
