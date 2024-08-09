<?php
session_start();
include 'admin/includes/db.php';

// Fetch data from the form submission
$recipe_id = isset($_POST['recipe_id']) ? intval($_POST['recipe_id']) : 0;
$selected_quantity = isset($_POST['selected_quantity']) ? floatval($_POST['selected_quantity']) : 0;
$ingredient_ids = isset($_POST['ingredient_ids']) ? $_POST['ingredient_ids'] : [];
$ingredient_quantities = isset($_POST['ingredient_quantities']) ? $_POST['ingredient_quantities'] : [];
$ingredient_prices = isset($_POST['ingredient_prices']) ? $_POST['ingredient_prices'] : [];

$ingredients = [];
foreach ($ingredient_ids as $index => $id) {
    $ingredients[] = [
        'id' => intval($id),
        'quantity' => floatval($ingredient_quantities[$index]),
        'price' => floatval($ingredient_prices[$index])
    ];
}

// Fetch the recipe details
$sql_recipe = "SELECT * FROM recipes WHERE id = ?";
$stmt_recipe = $conn->prepare($sql_recipe);
$stmt_recipe->bind_param('i', $recipe_id);
if (!$stmt_recipe->execute()) {
    die("Error preparing statement: " . $conn->error);
}
$recipe_result = $stmt_recipe->get_result();
$recipe = $recipe_result->fetch_assoc();
$stmt_recipe->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Report</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h3 class="mb-4">Print Report for <?php echo htmlspecialchars($recipe['name']); ?></h3>
        <p>Using <?php echo $selected_quantity; ?> Kgs of this ingredient, the evaluation will be as follows:</p>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ingredient Name</th>
                    <th>Quantity</th>
                    <th>Price per Unit/Kg</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_cost = 0;
                foreach ($ingredients as $ingredient) {
                    $sql_ingredient_name = "SELECT ingredient_name FROM recipe_ingredients WHERE id = ?";
                    $stmt_ingredient_name = $conn->prepare($sql_ingredient_name);
                    $stmt_ingredient_name->bind_param('i', $ingredient['id']);
                    if (!$stmt_ingredient_name->execute()) {
                        die("Error preparing statement: " . $conn->error);
                    }
                    $ingredient_result = $stmt_ingredient_name->get_result();
                    $ingredient_data = $ingredient_result->fetch_assoc();
                    $stmt_ingredient_name->close();
                    
                    $total_price = $ingredient['quantity'] * $ingredient['price'];
                    $total_cost += $total_price;
                    echo "<tr>
                            <td>" . htmlspecialchars($ingredient_data['ingredient_name']) . "</td>
                            <td>{$ingredient['quantity']}</td>
                            <td>{$ingredient['price']}</td>
                            <td>" . number_format($total_price, 2) . "</td>
                          </tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Cost</th>
                    <th><?php echo number_format($total_cost, 2); ?></th>
                </tr>
            </tfoot>
        </table>
        
        <button class="btn btn-success mt-3" onclick="window.print()">Print Report</button>
    </div>
</body>
</html>
