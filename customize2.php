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
                // 'unit' => $ingredient['unit'],
                'cost' => $ingredient['price']
            ];
        }, $ingredients),
        'total_cost' => array_reduce($ingredients, function($carry, $ingredient) {
            return $carry + ($ingredient['quantity'] * $ingredient['price']);
        }, 0)
    ];

    // No need to redirect; just proceed to display the summary
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
    <meta name="description" content="Customize Your Own Recipe">
    <meta name="keywords" content="recipe, customize, bakewave">
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
                            <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Create Your Recipe</h3>
                            <div class="form-contact form-comment wow fadeInUp"> 
                                <form id="recipe-form" action="" method="POST" onsubmit="return validateIngredients()">
                                    <div class="row"> 
                                        <div class="col-lg-6">
                                            <div class="form-group"> 
                                                <label class="form-label" for="recipe_name">Recipe Name:</label>
                                                <input class="form-control" id="recipe_name" name="recipe_name" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group"> 
                                                <label class="form-label" for="pieces">No of pieces. e.g, this recipe makes 1 loaf:</label>
                                                <input class="form-control" id="pieces" name="pieces" type="number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-30"></div>
                                    <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Define Ingredients</h3>
                                    <div class="form-contact form-comment wow fadeInUp"> 
                                        <div id="ingredients">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group"> 
                                                        <label class="form-label" for="ingredient_name">Ingredient Name:</label>
                                                        <input class="form-control" id="ingredient_name" name="ingredient_name" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group"> 
                                                        <label class="form-label" for="quantity">Quantity:</label>
                                                        <input class="form-control" id="quantity" name="quantity" type="number">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group"> 
                                                        <label class="form-label" for="price_per_unit">Price per Unit:</label>
                                                        <input class="form-control" id="price_per_unit" name="price_per_unit" type="number" step="0.01">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="button" class="btn btn-primary btn-primary-small" onclick="addIngredient()">Add Ingredient</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="box-info-route sidebar">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-14 color-grey">Ingredient</th>
                                                                <th class="text-14 color-grey">Quantity</th>
                                                                <th class="text-14 color-grey">Price per Unit</th>
                                                                <th class="text-14 color-grey">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="ingredients-table-body">
                                                            <!-- Dynamic rows will be added here -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-30 mb-120 wow fadeInUp">
                                        <button type="submit" class="btn btn-primary btn-primary-big w-100">Continue 
                                            <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="box-tab-right">
                        <div class="sidebar"> 
                            <div class="d-flex align-items-center justify-content-between wow fadeInUp"> 
                                <h6 class="text-20-medium color-text">About Recipes</h6>
                            </div>
                        </div>
                        <div class="sidebar wow fadeInUp"> 
                            <ul class="list-ticks list-ticks-small list-ticks-small-booking">
                            <li class="text-14 mb-20">+200 recipes available</li>
                            <li class="text-14 mb-20">Instant recipe calculations</li>
                            <li class="text-14 mb-20">Accurate cost estimation</li>
                            <li class="text-14 mb-20">Easy ingredient management</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Summary Section -->
                <?php if ($recipe): ?>
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
                                                        <?php echo htmlspecialchars($ingredient['quantity'] ); ?> units
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
                                    <div class="mt-30 mb-120 wow fadeInUp">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form id="share-form" action="share_recipe.php" method="post">
                                                    <input type="hidden" name="recipe_name" value="<?php echo htmlspecialchars($recipe['name']); ?>">
                                                    <input type="hidden" name="ingredients" value='<?php echo json_encode($adjusted_ingredients); ?>'>
                                                    <input type="hidden" name="description" value="<?php echo htmlspecialchars($description ?? ''); ?>">
                                                    <button type="button" class="btn btn-primary btn-primary-big w-100" onclick="shareRecipe()">Share with platform</button>
                                                </form>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn btn-primary btn-primary-big w-100" href="#">Share with friends
                                                    <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn btn-primary btn-primary-big w-100" href="#">Print
                                                    <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
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
                                    <div class="info-route-left"> 
                                        <span class="text-14 color-grey">Recipe Name</span><span class="text-14-medium color-text"><?php echo htmlspecialchars($recipe['name']); ?></span>
                                    </div>
                                </div>
                                <div class="border-bottom mt-30 mb-25"></div>
                                <div class="mt-0"> 
                                    <span class="text-14 color-grey">On this Section</span><br>
                                    <span class="text-14-medium color-text">Defining Description</span><br>
                                    <span class="text-14-medium color-text">Additional Costs</span><br>
                                    <span class="text-14-medium color-text">Cost Calculator</span><br>
                                    <span class="text-14-medium color-text">Share Recipe</span>
                                </div>
                                <div class="border-bottom mt-30 mb-25"></div>
                                <div class="mt-0"> 
                                    <span class="text-14 color-grey">Others</span><br>
                                    <span class="text-14-medium color-text">Analyze Report</span><br>
                                    <span class="text-14-medium color-text">Print Recipe</span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php include_once 'includes/footer.php'; ?>
    <?php include_once 'includes/scripts.php'; ?>

    <script>
        let ingredientCount = 0;

        function addIngredient() {
            const ingredientName = document.getElementById('ingredient_name').value;
            const quantity = document.getElementById('quantity').value;
            const pricePerUnit = document.getElementById('price_per_unit').value;

            if (ingredientName && quantity && pricePerUnit) {
                const tableBody = document.getElementById('ingredients-table-body');

                // Create a new row
                const row = document.createElement('tr');
                row.id = `ingredient-${ingredientCount}`;

                // Add cells with ingredient details and delete button
                row.innerHTML = `
                    <td><input type="hidden" name="ingredients[${ingredientCount}][name]" value="${ingredientName}">${ingredientName}</td>
                    <td><input type="hidden" name="ingredients[${ingredientCount}][quantity]" value="${quantity}">${quantity}</td>
                    <td><input type="hidden" name="ingredients[${ingredientCount}][price]" value="${pricePerUnit}">${pricePerUnit}</td>
                    <td><button type="button" onclick="removeIngredient(${ingredientCount})" style=" width: 100%; text-align: center;" class="btn btn-danger btn-sm">Remove</button></td>
                `;

                // Append the row to the table
                tableBody.appendChild(row);

                ingredientCount++;

                // Clear input fields
                document.getElementById('ingredient_name').value = '';
                document.getElementById('quantity').value = '';
                document.getElementById('price_per_unit').value = '';
            }
        }

        function removeIngredient(index) {
            const row = document.getElementById(`ingredient-${index}`);
            if (row) {
                row.remove();
            }
        }

        function validateIngredients() {
            const tableBody = document.getElementById('ingredients-table-body');
            if (tableBody.children.length === 0) {
                alert('Please add at least one ingredient.');
                return false;
            }
            return true;
        }

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
                        <button style="padding-right: 15px;" type="button" class="btn btn-danger btn-sm" onclick="removeCost(this)">Delete</button>
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

        function shareRecipe() {
            // Update the description hidden field with the current description text
            const description = document.getElementById('description-text').textContent.trim();
            document.querySelector('input[name="description"]').value = description;

            const formData = new FormData(document.getElementById('share-form'));

            fetch('share_recipe.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while sharing the recipe.');
            });
        }
    </script>
</body>
</html>
