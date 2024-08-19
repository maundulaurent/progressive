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
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Project Confirmation</h1>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Quotation Details</h5>
                <p class="card-text"><strong>Title:</strong> <?php echo htmlspecialchars($quotation['title']); ?></p>
                <p class="card-text"><strong>Industry:</strong> <?php echo htmlspecialchars($quotation['industry_id']); ?></p>
                <p class="card-text"><strong>Category:</strong> <?php echo htmlspecialchars($quotation['category_id']); ?></p>
                <p class="card-text"><strong>Deadline:</strong> <?php echo htmlspecialchars($quotation['deadline']); ?></p>
                <p class="card-text"><strong>Tags:</strong> <?php echo htmlspecialchars($quotation['tags']); ?></p>
                <p class="card-text"><strong>County:</strong> <?php echo htmlspecialchars($quotation['county']); ?></p>
                <p class="card-text"><strong>Town:</strong> <?php echo htmlspecialchars($quotation['town']); ?></p>
                <p class="card-text"><strong>Delivery Location:</strong> <?php echo htmlspecialchars($quotation['delivery_location']); ?></p>
                <p class="card-text"><strong>Preferred Delivery Day:</strong> <?php echo htmlspecialchars($quotation['preferred_delivery_day']); ?></p>
                <p class="card-text"><strong>Description:</strong> <?php echo htmlspecialchars($quotation['description']); ?></p>
            </div>
        </div>

        <h2 class="mb-4">Items</h2>
        <ul class="list-group mb-4">
            <?php if (isset($quotation['items']) && is_array($quotation['items'])): ?>
                <?php foreach ($quotation['items'] as $item): ?>
                    <li class="list-group-item"><?php echo htmlspecialchars($item['name']) . ' - ' . htmlspecialchars($item['quantity']) . ' pcs - Kes ' . htmlspecialchars($item['budget']); ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">No items added.</li>
            <?php endif; ?>
        </ul>

        <h2 class="mb-4">Attached Quote</h2>
        <p><a href="<?php echo htmlspecialchars($quotation['written_quote']); ?>" class="btn btn-info" target="_blank">Download Quote</a></p>

        <form action="submit-quotation.php" method="POST" class="mt-4">
            <button type="submit" class="btn btn-primary">Post Quotation</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
