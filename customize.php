<?php
include 'admin/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipeName = $_POST['recipe_name'];
    $pieces = $_POST['pieces'];
    $ingredients = $_POST['ingredient'];
    $quantities = $_POST['quantity'];
    $units = $_POST['unit'];
    $costs = $_POST['cost'];
    $totalCost = array_sum($costs);

    // Store data to pass to the next page
    $_SESSION['recipe'] = [
        'name' => $recipeName,
        'pieces' => $pieces,
        'ingredients' => [],
        'total_cost' => $totalCost,
    ];

    foreach ($ingredients as $index => $ingredient) {
        $_SESSION['recipe']['ingredients'][] = [
            'name' => $ingredient,
            'quantity' => $quantities[$index],
            'unit' => $units[$index],
            'cost' => $costs[$index],
        ];
    }

    // Redirect to the next page
    header('Location: customize-summary.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Recipe</title>
</head>
<body>
    <h1>Create Your Recipe</h1>
    <form action="" method="POST">
        <label for="recipe_name">Recipe Name:</label>
        <input type="text" id="recipe_name" name="recipe_name" required><br><br>

        <label for="pieces">This recipe makes how many pieces/items:</label>
        <input type="number" id="pieces" name="pieces" required><br><br>

        <h3>Ingredients:</h3>
        <div id="ingredients">
            <div class="ingredient">
                <label>Ingredient Name:</label>
                <input type="text" name="ingredient[]" required>
                
                <label>Quantity:</label>
                <input type="number" name="quantity[]" required>

                <label>Unit:</label>
                <select name="unit[]" required>
                    <option value="kg">Kg</option>
                    <option value="liter">Liter</option>
                    <option value="grams">Grams</option>
                    <option value="ml">Milliliters</option>
                    <option value="pieces">Pieces</option>
                </select>

                <label>Cost:</label>
                <input type="number" name="cost[]" step="0.01" required><br><br>
            </div>
        </div>
        
        <button type="button" onclick="addIngredient()">Add Another Ingredient</button><br><br>
        <input type="submit" value="Submit Recipe">
    </form>

    <script>
        function addIngredient() {
            const ingredientsDiv = document.getElementById('ingredients');
            const newIngredient = document.createElement('div');
            newIngredient.classList.add('ingredient');
            newIngredient.innerHTML = `
                <label>Ingredient Name:</label>
                <input type="text" name="ingredient[]" required>
                
                <label>Quantity:</label>
                <input type="number" name="quantity[]" required>

                <label>Unit:</label>
                <select name="unit[]" required>
                    <option value="kg">Kg</option>
                    <option value="liter">Liter</option>
                    <option value="grams">Grams</option>
                    <option value="ml">Milliliters</option>
                    <option value="pieces">Pieces</option>
                </select>

                <label>Cost:</label>
                <input type="number" name="cost[]" step="0.01" required><br><br>
            `;
            ingredientsDiv.appendChild(newIngredient);
        }
    </script>
</body>
</html>
