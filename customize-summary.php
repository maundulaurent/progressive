<?php
include 'admin/includes/db.php';

session_start();
$recipe = $_SESSION['recipe'] ?? null;

if (!$recipe) {
    echo "No recipe found.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Summary</title>
</head>
<body>
    <h1>Recipe Summary: <?php echo htmlspecialchars($recipe['name']); ?></h1>
    <p>This recipe makes: <?php echo htmlspecialchars($recipe['pieces']); ?> pieces/items</p>

    <h3>Ingredients:</h3>
    <ul>
        <?php foreach ($recipe['ingredients'] as $ingredient): ?>
            <li>
                <?php echo htmlspecialchars($ingredient['quantity'] . ' ' . $ingredient['unit'] . ' of ' . $ingredient['name'] . ' - $' . number_format($ingredient['cost'], 2)); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><strong>Total Cost: </strong>$<?php echo number_format($recipe['total_cost'], 2); ?></p>

    <h3>Actions:</h3>
    <button onclick="window.print()">Print Recipe</button>
    <button onclick="shareRecipe()">Share on Social Media</button>

    <script>
        function shareRecipe() {
            const text = `Check out this recipe I created: <?php echo addslashes($recipe['name']); ?>. It makes <?php echo addslashes($recipe['pieces']); ?> pieces! Total cost: $<?php echo number_format($recipe['total_cost'], 2); ?>.`;
            const url = window.location.href;

            if (navigator.share) {
                navigator.share({
                    title: 'My Recipe',
                    text: text,
                    url: url,
                }).then(() => {
                    console.log('Shared successfully!');
                }).catch((error) => {
                    console.error('Error sharing:', error);
                });
            } else {
                alert('Your browser does not support the Web Share API.');
            }
        }
    </script>
</body>
</html>
