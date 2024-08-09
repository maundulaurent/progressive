<?php
include 'admin/includes/db.php';

session_start();
$recipe = $_SESSION['recipe'] ?? null;

if (!$recipe) {
    echo "No recipe found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num_pieces = $_POST['num_pieces'];
    $ratio = $num_pieces / $recipe['pieces'];
    $adjusted_ingredients = [];

    foreach ($recipe['ingredients'] as $ingredient) {
        $adjusted_ingredients[] = [
            'name' => $ingredient['name'],
            'quantity' => $ingredient['quantity'] * $ratio,
            'unit' => $ingredient['unit'],
            'cost' => $ingredient['cost'] * $ratio,
        ];
    }

    $adjusted_cost = $recipe['total_cost'] * $ratio;
} else {
    $num_pieces = $recipe['pieces'];
    $adjusted_ingredients = $recipe['ingredients'];
    $adjusted_cost = $recipe['total_cost'];
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
        <?php foreach ($adjusted_ingredients as $ingredient): ?>
            <li>
                <?php echo htmlspecialchars($ingredient['quantity'] . ' ' . $ingredient['unit'] . ' of ' . $ingredient['name']); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <hr>

    <h3>Cost Calculator:</h3>
    <form method="POST" action="">
        <label for="num_pieces">Number of pieces/items you want to produce:</label>
        <input type="number" id="num_pieces" name="num_pieces" value="<?php echo htmlspecialchars($num_pieces); ?>" required>
        <input type="submit" value="Calculate Cost"><br><br>
    </form>

    <h3>Cost Breakdown:</h3>
    <ul>
        <?php foreach ($adjusted_ingredients as $ingredient): ?>
            <li>
                <?php echo htmlspecialchars($ingredient['quantity'] . ' ' . $ingredient['unit'] . ' of ' . $ingredient['name'] . ' - $' . number_format($ingredient['cost'], 2)); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><strong>Total Cost: </strong>$<?php echo number_format($adjusted_cost, 2); ?></p>

    <hr>

    <h3>Share this Recipe:</h3>
    <button onclick="shareRecipe()">Share on Social Media</button>
    <button onclick="shareWithFriends()">Share with Friends</button>

    <script>
        function shareRecipe() {
            const text = `Check out this recipe I created: <?php echo addslashes($recipe['name']); ?>. It makes <?php echo addslashes($num_pieces); ?> pieces! Total cost: $<?php echo number_format($adjusted_cost, 2); ?>.`;
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

        function shareWithFriends() {
            const text = `Check out this recipe I created: <?php echo addslashes($recipe['name']); ?>. It makes <?php echo addslashes($num_pieces); ?> pieces! Total cost: $<?php echo number_format($adjusted_cost, 2); ?>.`;
            const url = window.location.href;
            const shareUrl = `mailto:?subject=My Recipe&body=${encodeURIComponent(text + " " + url)}`;
            window.location.href = shareUrl;
        }
    </script>
</body>
</html>
