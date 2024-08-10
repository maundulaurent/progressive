

<?php
session_start();
include 'admin/includes/db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the recipe data from the POST request
    $recipe_name = $_POST['recipe_name'];
    $pieces = $_POST['pieces'];
    $ingredients = $_POST['ingredients'] ?? [];

    // Store the recipe data in the session
    $_SESSION['recipe'] = [
        'name' => $recipe_name,
        'pieces' => $pieces,
        'ingredients' => array_map(function($ingredient) {
            return [
                'name' => $ingredient['name'],
                'quantity' => $ingredient['quantity'],
                'unit' => $ingredient['unit'],
                'cost' => $ingredient['price']
            ];
        }, $ingredients),
        'total_cost' => array_reduce($ingredients, function($carry, $ingredient) {
            return $carry + ($ingredient['quantity'] * $ingredient['price']);
        }, 0)
    ];

    // Redirect to the summary page
    header('Location: customize-summary.php');
    exit();
}

$recipe = $_SESSION['recipe'] ?? null;

if (!$recipe) {
    echo "No recipe found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['num_pieces'])) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/template/favicon.png">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Bakewave | Customize Your Own Recipe</title>
</head>
<body>
   
    <?php include_once 'includes/navbar.php'; ?>

   <main class="main">
  <section class="section">
    <div class="container-sub">
      <div class="box-row-tab mt-50">
        <div class="box-tab-left">
          <div class="box-content-detail"> 
            <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Creating Recipe <?php echo htmlspecialchars($recipe['name']); ?></h3>
            <div class="sidebar"> 
              <div class="d-flex align-items-center justify-content-between wow fadeInUp"> 
                <h6 class="text-20-medium color-text">Ingredients</h6><a class="text-14-medium color-text" href="#">Quantity</a>
              </div>               
              <div class="mt-20 wow fadeInUp">
                <div class="box-info-route">
                  <table style="width: 100%; border-collapse: collapse;">
                    <tbody>
                      <?php foreach ($adjusted_ingredients as $ingredient): ?>
                        <tr>
                          <td style="padding: 8px; text-align: left;">
                            <?php echo htmlspecialchars($ingredient['name']); ?>
                          </td>
                          <td style="padding: 8px; text-align: right;">
                            <?php echo htmlspecialchars($ingredient['quantity'] . ' ' . $ingredient['unit']); ?> units
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>

                <div class="border-bottom mt-30 mb-25"></div>
                <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Description</h3>
                <!-- Single line description input -->
                <div class="form-group">
                  <label for="recipe_description" class="form-label"></label>
                  <input id="recipe_description" class="form-control" type="text" placeholder="Enter recipe description here">
                </div>
                <button type="button" class="btn btn-primary btn-primary-small" onclick="updateDescription()">Update Description</button>

                <div class="border-bottom mt-30 mb-25"></div>
                <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Add Extra Costs</h3>
                <!-- Form to add additional costs -->
                <form id="cost-form" action="#" method="post">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-label" for="cost_name">Cost Name</label>
                        <input class="form-control" id="cost_name" name="cost_name" type="text" placeholder="Cost Name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-label" for="cost_price">Price</label>
                        <input class="form-control" id="cost_price" name="cost_price" type="number" step="0.01" placeholder="Price">
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary btn-primary-small" onclick="addCost()">Add Cost</button>
                </form>

                <div class="mt-20 wow fadeInUp">
                  <div class="box-info-route">
                    <table style="width: 100%; border-collapse: collapse;">
                      <thead>
                        <tr>
                          <th style="padding: 8px; text-align: left;">Cost Name</th>
                          <th style="padding: 8px; text-align: right;">Price</th>
                          <th style="padding: 8px; text-align: center;">Action</th>
                        </tr>
                      </thead>
                      <tbody id="cost-table-body">
                        <!-- Dynamic rows for additional costs will be added here -->
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="mt-30"></div>
                <div class="mt-30 mb-120 wow fadeInUp">
                  <a class="btn btn-primary btn-primary-big w-100" href="#">Continue 
                    <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="box-tab-right mt-60">
            <div class="sidebar"> 
              <div class="d-flex align-items-center justify-content-between wow fadeInUp"> 
                <h6 class="text-20-medium color-text">Ride Summary</h6><a class="text-14-medium color-text text-decoration-underline" href="#">Edit</a>
              </div>               
              <div class="mt-20 wow fadeInUp">
                <div class="box-info-route"> 
                  <div class="info-route-left"> <span class="text-14 color-grey">Total Distance</span><span class="text-14-medium color-text">311 km/ 194 miles</span></div>
                  <div class="info-route-left"> <span class="text-14 color-grey">Total Time</span><span class="text-14-medium color-text">3h 43m</span></div>
                </div>
                <div class="border-bottom mt-30 mb-25"></div>
                <div class="mt-0"> <span class="text-14 color-grey">Vehicle</span><br><span class="text-14-medium color-text">Mercedes-Benz E220</span></div>
                <div class="border-bottom mt-30 mb-25"></div>
                <div class="mt-0"> <span class="text-14 color-grey">Extra Options</span><br><span class="text-14-medium color-text">1 x Child Seat - $5.00</span><br><span class="text-14-medium color-text">1 x Bouquet of Flowers - $75.00</span><br><span class="text-14-medium color-text">2 x Vodka Bottle - $78.00</span><br><span class="text-14-medium color-text">1 x Bodyguard Service - $750.00</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
let currentDescription = '';

function addCost() {
    const costName = document.getElementById('cost_name').value;
    const costPrice = document.getElementById('cost_price').value;

    if (costName && costPrice) {
        const tableBody = document.getElementById('cost-table-body');

        // Create a new row
        const row = document.createElement('tr');

        // Add cells with cost details
        row.innerHTML = `
            <td style="padding: 8px; text-align: left;">${costName}</td>
            <td style="padding: 8px; text-align: right;">${parseFloat(costPrice).toFixed(2)}</td>
            <td style="padding: 8px; text-align: center;">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeCost(this)">Delete</button>
            </td>
        `;

        // Append the row to the table
        tableBody.appendChild(row);

        // Clear input fields
        document.getElementById('cost_name').value = '';
        document.getElementById('cost_price').value = '';
    }
}

function removeCost(button) {
    const row = button.parentElement.parentElement;
    row.parentElement.removeChild(row);
}

function updateDescription() {
    const descriptionInput = document.getElementById('recipe_description');
    currentDescription = descriptionInput.value;
    descriptionInput.value = '';
    // Update description in backend or other processing here
    console.log('Updated description:', currentDescription);
}
</script>



















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

    <?php include_once 'includes/footer.php'; ?>
    <?php include_once 'includes/scripts.php'; ?>

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
