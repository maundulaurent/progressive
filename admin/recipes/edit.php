<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../../login");
    exit;
}
require_once '../includes/db.php';

$ingredient_id = $_GET['id'];

// Initialize the $ingredient variable
$ingredient = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity'])) {
    $name = $_POST['name']; // We'll use this variable later for checking purposes
    $quantity = $_POST['quantity'];

    // Update the ingredient's quantity (and name if it's not premix)
    if ($name !== 'premix') {
        $sql = "UPDATE recipe_ingredients SET ingredient_name = ?, quantity = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sdi", $name, $quantity, $ingredient_id);
            if ($stmt->execute()) {
                header("location: manage.php?id=" . $_GET['recipe_id']);
                exit;
            } else {
                echo "Error: Could not execute the query. " . $conn->error;
            }
            $stmt->close();
        } else {
            echo "Error: Could not prepare the query. " . $conn->error;
        }
    } else {
        $sql = "UPDATE recipe_ingredients SET quantity = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("di", $quantity, $ingredient_id);
            if ($stmt->execute()) {
                header("location: manage.php?id=" . $_GET['recipe_id']);
                exit;
            } else {
                echo "Error: Could not execute the query. " . $conn->error;
            }
            $stmt->close();
        } else {
            echo "Error: Could not prepare the query. " . $conn->error;
        }
    }
}

// Fetch current ingredient details
$sql = "SELECT ingredient_name, quantity FROM recipe_ingredients WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $ingredient_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $ingredient = $result->fetch_assoc();
    } else {
        echo "No ingredient found with the provided ID.";
        exit;
    }
    $stmt->close();
} else {
    echo "Error: Could not prepare the query. " . $conn->error;
    exit;
}

include '../includes/head.php';
include '../includes/sidebar.php';
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h1>Edit Ingredient: <?= htmlspecialchars($ingredient['ingredient_name']) ?></h1>
            <form action="edit.php?id=<?= $ingredient_id ?>&recipe_id=<?= $_GET['recipe_id'] ?>" method="post">
                <div class="form-group">
                    <label for="name">Ingredient Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($ingredient['ingredient_name']) ?>" <?= ($ingredient['ingredient_name'] === 'premix') ? 'readonly' : '' ?> required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" step="0.000001" value="<?= htmlspecialchars($ingredient['quantity']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Ingredient</button>
            </form>
        </div>
    </section>
</div>

<?php include '../includes/footer.php'; ?>
