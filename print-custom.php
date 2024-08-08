<?php
include 'admin/includes/db.php';

// Fetch data from the POST request
$recipe_id = isset($_POST['recipe_id']) ? intval($_POST['recipe_id']) : 0;
$selected_ingredient_id = isset($_POST['selected_ingredient_id']) ? intval($_POST['selected_ingredient_id']) : 0;
$selected_quantity = isset($_POST['selected_quantity']) ? floatval($_POST['selected_quantity']) : 0;
$total_value = isset($_POST['total_value']) ? floatval($_POST['total_value']) : 0;
$ingredient_ids = isset($_POST['ingredient_ids']) ? $_POST['ingredient_ids'] : [];
$ingredient_quantities = isset($_POST['ingredient_quantities']) ? $_POST['ingredient_quantities'] : [];
$ingredient_names = isset($_POST['ingredient_names']) ? $_POST['ingredient_names'] : [];

// Fetch the recipe details
$sql_recipe = "SELECT * FROM recipes WHERE id = ?";
$stmt_recipe = $conn->prepare($sql_recipe);
$stmt_recipe->bind_param('i', $recipe_id);
$stmt_recipe->execute();
$recipe_result = $stmt_recipe->get_result();
$recipe = $recipe_result->fetch_assoc();
$stmt_recipe->close();

if (!$recipe) {
    die("Error: Recipe not found.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Custom Recipe Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        @media print {
            @page {
                margin: 20mm;
            }
            body {
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <h1>Custom Recipe Report</h1>
    <h2><?php echo htmlspecialchars($recipe['name']); ?></h2>

    <p>Using <?php echo $selected_quantity; ?> kgs of 
    <?php 
    foreach ($ingredient_ids as $index => $id) {
        if ($id == $selected_ingredient_id) {
            echo htmlspecialchars($ingredient_names[$index]);
            break;
        }
    } ?> 
    and in the given recipe ratio, you will require these quantities per ingredient:</p>

    <table>
        <thead>
            <tr>
                <th>Ingredient Name</th>
                <th>Quantity</th>
                <th>Price per Kg</th>
                <th>Total Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_cost = 0;
            foreach ($ingredient_ids as $index => $id) {
                $ingredient_name = htmlspecialchars($ingredient_names[$index]);
                $quantity = floatval($ingredient_quantities[$index]);
                $price = isset($_POST["price_$id"]) ? floatval($_POST["price_$id"]) : 0;
                $adjusted_quantity = ($quantity / $selected_quantity) * $selected_quantity;
                $cost = $adjusted_quantity * $price;
                $total_cost += $cost;

                echo "<tr>
                        <td>{$ingredient_name}</td>
                        <td>{$adjusted_quantity}</td>
                        <td>{$price}</td>
                        <td>{$cost}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Total cost to incur: <?php echo number_format($total_cost, 2); ?></h3>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
