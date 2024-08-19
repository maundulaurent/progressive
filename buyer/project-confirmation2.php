<?php
session_start();

if (isset($_SESSION['quotation'])) {
    $quotation = $_SESSION['quotation'];
} else {
    header('Location: post-quotation.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Confirmation</title>
    <!-- Include necessary CSS files -->
</head>
<body>
    <div class="container">
        <h1>Project Confirmation</h1>
        <p>Title: <?php echo htmlspecialchars($quotation['title']); ?></p>
        <p>Industry: <?php echo htmlspecialchars($quotation['industry_id']); ?></p>
        <p>Category: <?php echo htmlspecialchars($quotation['category_id']); ?></p>
        <p>Deadline: <?php echo htmlspecialchars($quotation['deadline']); ?></p>
        <p>Tags: <?php echo htmlspecialchars($quotation['tags']); ?></p>
        <p>County: <?php echo htmlspecialchars($quotation['county']); ?></p>
        <p>Town: <?php echo htmlspecialchars($quotation['town']); ?></p>
        <p>Delivery Location: <?php echo htmlspecialchars($quotation['delivery_location']); ?></p>
        <p>Preferred Delivery Day: <?php echo htmlspecialchars($quotation['preferred_delivery_day']); ?></p>
        <p>Description: <?php echo htmlspecialchars($quotation['description']); ?></p>

        <h2>Items</h2>
        <ul>
            <?php if (isset($quotation['items']) && is_array($quotation['items'])): ?>
                <?php foreach ($quotation['items'] as $item): ?>
                    <li><?php echo htmlspecialchars($item['name']) . ' - ' . htmlspecialchars($item['quantity']) . ' pcs - Kes ' . htmlspecialchars($item['budget']); ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No items added.</li>
            <?php endif; ?>
        </ul>

        <h2>Attached Quote</h2>
        <p><a href="<?php echo htmlspecialchars($quotation['written_quote']); ?>" target="_blank">Download Quote</a></p>

        <form action="submit-quotation.php" method="POST">
            <button type="submit" class="btn btn-primary">Post Quotation</button>
        </form>
    </div>
</body>
</html>
