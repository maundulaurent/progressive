

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
   
    <?php include_once 'includes/preloader.php'; ?>
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
                    <h3 class="heading-24-medium color-text mb-5 wow fadeInUp">Description</h3>
                    <div class="info-route-left mb-15">
                        <span id="description-text" class="text-14 color-grey">
                            No Description yet
                        </span>
                    </div>
                    <!-- Single line description input -->
                    <div class="form-group">
                        <label for="recipe_description" class="form-label"></label>
                        <input id="recipe_description" class="form-control" type="text" placeholder="Update recipe description here">
                    </div>
                    <button type="button" class="btn btn-primary btn-primary-small" onclick="updateDescription()">Update Description</button>

                    <div class="border-bottom mt-30 mb-25"></div>
                    <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Add Extra Costs</h3>
                    <!-- Form to add additional costs -->
                    <form id="cost-form" action="#" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="cost_name"></label>
                            <input class="form-control" id="cost_name" name="cost_name" type="text" placeholder="Cost Name">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="cost_price"></label>
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
                    
                    <div class="border-bottom mt-30 mb-25"></div>
                            
                    <h3 class="heading-24-medium color-text mb-15 wow fadeInUp">Cost Calculator</h3>
                    
                    <h5 class="mb-30 wow fadeInUp">This recipe produces : <?php echo htmlspecialchars($num_pieces); ?> pieces </h5>
                    <h5 class=" mb-30 wow fadeInUp">find the ingredients ratios and costs of producing several pieces using this recipe.</h5>
                    <div class="mt-30 wow fadeInUp">
                        <form id="calculate-form">
                            <div class="form-group">
                                <label for="num_pieces"></label>
                                <input id="num_pieces" name="num_pieces" type="number" class="form-control" min="1" placeholder="Enter pieces to calculate" required>
                            </div>
                            <button type="button" class="btn btn-primary btn-primary-small mt-3" onclick="calculateCost()">Calculate</button>
                        </form>

                    </div>
                   
                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($num_pieces)): ?>
                        <div class="mt-30 wow fadeInUp">
                            <h4 class="heading-20-medium color-text">Calculated Cost and Quantities</h4>
                            <table style="width: 100%; border-collapse: collapse;" class="mt-15">
                                <thead>
                                    <tr>
                                        <th style="padding: 8px; text-align: left;">Ingredient</th>
                                        <th style="padding: 8px; text-align: right;">Quantity</th>
                                        <th style="padding: 8px; text-align: right;">Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($adjusted_ingredients as $ingredient): ?>
                                        <tr>
                                            <td style="padding: 8px; text-align: left;"><?php echo htmlspecialchars($ingredient['name']); ?></td>
                                            <td style="padding: 8px; text-align: right;"><?php echo htmlspecialchars($ingredient['quantity'] . ' ' . $ingredient['unit']); ?></td>
                                            <td style="padding: 8px; text-align: right;"><?php echo '$' . number_format($ingredient['cost'], 2); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="2" style="padding: 8px; text-align: right;"><strong>Total Cost:</strong></td>
                                        <td style="padding: 8px; text-align: right;"><strong><?php echo '$' . number_format($adjusted_cost, 2); ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>


                    <div class="mt-30"></div>
                    <div class="mt-30 mb-120 wow fadeInUp">
                    <a class="btn btn-primary btn-primary-big w-100" href="#">View Analyzed Report
                        <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                        </svg>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="box-tab-right mt-60">
                <div class="sidebar"> 
                <div class="d-flex align-items-center justify-content-between wow fadeInUp"> 
                    <h6 class="text-20-medium color-text">Customizing Summary</h6>
                </div>               
                <div class="mt-20 wow fadeInUp">
                    <div class="box-info-route"> 
                    <div class="info-route-left"> <span class="text-14 color-grey">Recipe Name</span><span class="text-14-medium color-text"><?php echo htmlspecialchars($recipe['name']); ?></span></div>
                    <!-- <div class="info-route-left"> <span class="text-14 color-grey">Total Time</span><span class="text-14-medium color-text">3h 43m</span></div> -->
                    </div>
                    <div class="border-bottom mt-30 mb-25"></div>
                    
                    
                    <div class="mt-0"> <span class="text-14 color-grey">On this Section</span><br>
                                        <span class="text-14-medium color-text">Defining Description</span><br>
                                        <span class="text-14-medium color-text">Additional Costs</span><br>
                                        <span class="text-14-medium color-text">Cost Calculator</span><br>
                                        <span class="text-14-medium color-text">Share Recipe</span></div>
                    </div>
                    <div class="border-bottom mt-30 mb-25"></div>
                    <div class="mt-0"> <span class="text-14 color-grey">Others</span><br>
                            <span class="text-14-medium color-text">Analyze Report</span><br>
                            <span class="text-14-medium color-text">Print Recipe</span><br>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
<?php include_once 'includes/scripts.php'; ?>


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
                    <button style="padding-right: 15px; " type="button" class="btn btn-danger btn-sm" onclick="removeCost(this)">Delete</button>
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
        const descriptionInput = document.getElementById('recipe_description').value;
        const descriptionText = document.getElementById('description-text');

        if (descriptionInput.trim()) {
            descriptionText.textContent = descriptionInput;
        } else {
            descriptionText.textContent = 'No Description yet';
        }

        // Clear the input field after updating
        document.getElementById('recipe_description').value = '';
    }

    function calculateCost() {
        const numPieces = document.getElementById('num_pieces').value;

        if (numPieces) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'customize-summary.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    // Update the table with new values
                    const tableBody = document.querySelector('.mt-30 .table tbody');
                    tableBody.innerHTML = '';

                    response.ingredients.forEach(function(ingredient) {
                        const row = `
                            <tr>
                                <td style="padding: 8px; text-align: left;">${ingredient.name}</td>
                                <td style="padding: 8px; text-align: right;">${ingredient.quantity} ${ingredient.unit}</td>
                                <td style="padding: 8px; text-align: right;">$${ingredient.cost.toFixed(2)}</td>
                            </tr>
                        `;
                        tableBody.insertAdjacentHTML('beforeend', row);
                    });

                    const totalCostRow = `
                        <tr>
                            <td colspan="2" style="padding: 8px; text-align: right;"><strong>Total Cost:</strong></td>
                            <td style="padding: 8px; text-align: right;"><strong>$${response.total_cost.toFixed(2)}</strong></td>
                        </tr>
                    `;
                    tableBody.insertAdjacentHTML('beforeend', totalCostRow);
                }
            };

            const data = `num_pieces=${encodeURIComponent(numPieces)}`;
            xhr.send(data);
        }
    }

</script>

</body>
</html>
