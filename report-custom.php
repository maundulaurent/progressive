<?php
session_start();
include 'admin/includes/db.php';

// Fetch data from the POST request
$recipe_id = isset($_POST['recipe_id']) ? intval($_POST['recipe_id']) : 0;
$selected_ingredient_id = isset($_POST['selected_ingredient_id']) ? intval($_POST['selected_ingredient_id']) : 0;
$selected_quantity = isset($_POST['selected_quantity']) ? floatval($_POST['selected_quantity']) : 0;
$ingredient_ids = isset($_POST['ingredient_ids']) ? $_POST['ingredient_ids'] : [];
$ingredient_quantities = isset($_POST['ingredient_quantities']) ? $_POST['ingredient_quantities'] : [];
$ingredient_names = isset($_POST['ingredient_names']) ? $_POST['ingredient_names'] : [];

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

// Fetch additional costs from the POST request
$additional_cost_names = isset($_POST['additional_cost_names']) ? $_POST['additional_cost_names'] : [];
$additional_cost_prices = isset($_POST['additional_cost_prices']) ? $_POST['additional_cost_prices'] : [];

// Calculate total additional costs
$total_additional_costs = 0;
foreach ($additional_cost_prices as $price) {
    $total_additional_costs += floatval($price);
}

if (!$recipe) {
    die("Error: Recipe not found.");
}

$conn->close();

// Get the current date
$current_date = date('d F Y');

// Calculate the number of ingredients
$num_ingredients = count($ingredient_ids);

// Initialize total cost
$total_ingredient_cost = 0;
$total_quantity = 0;

foreach ($ingredient_quantities as $quantity) {
    $total_quantity += floatval($quantity);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Recipe Report</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/template/favicon.png">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>
<body>
    <main class="main">
        <section class="section bg-3 box-invoice-block">
            <div class="box-invoice"> 
                <div class="inner-invoice"> 
                    <div class="d-flex invoice-top"> 
                        <div class="invoice-left"> 
                            <h3 class="fst-bold">Recipe Generator</h3>
                            <h3 class="mb-4">Custom Recipe Report for <?php echo htmlspecialchars($recipe['name']); ?></h3>
                            <p class="text-16-medium color-text"><?php echo $current_date; ?></p>
                        </div>
                        <div class="mb-50"> 
                            <h5 class="text-18-medium color-text mb-15">Recipe</h5>
                            <h6 class="text-16-medium color-text mb-5"><?php echo htmlspecialchars($recipe['name']); ?></h6>
                            <p class="color-grey text-14">Number of ingredients: <?php echo $num_ingredients; ?></p>
                        </div>
                    </div>
                    <div class="invoice-right"> 
                        <div class="mb-60">
                            <div class="d-flex justify-content-between mb-6">                        
                                <h6 class="text-16-medium color-text mb-5">Determining Ingredient</h6>
                                <span class="text-16-medium color-text">
                                    <?php 
                                    foreach ($ingredient_ids as $index => $id) {
                                        if ($id == $selected_ingredient_id) {
                                            echo htmlspecialchars($ingredient_names[$index]);
                                            break;
                                        }
                                    } ?>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-65">                        
                                <h6 class="text-16-medium color-text mb-5">Units to Produce</h6>
                                <span class="text-16-medium color-text"><?php echo number_format($selected_quantity, 2); ?> kgs</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h6 class="heading-20-medium color-text">Additional Costs</h6>
                        <div class="col-md-6">
                            <div class="box-info-book-border wow fadeInUp"> 
                                <ul class="list-prices">
                                    <li> <span class="text-top">Cost Name</span><span class="text-bottom">Cost Price</span></li>
                                    <?php
                                    // Display each additional cost and calculate total
                                    foreach ($additional_cost_names as $index => $name) {
                                        $price = isset($additional_cost_prices[$index]) ? floatval($additional_cost_prices[$index]) : 0;
                                        echo "<li> <span class='text-top'>" . htmlspecialchars($name) . "</span><span class='text-bottom'>" . number_format($price, 2) . "</span></li>";
                                    }
                                    ?>
                                    <li> <span class="text-top">Total Additional Costs</span><span class="text-bottom"><?php echo number_format($total_additional_costs, 2); ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <p class="mb-65">Using <?php echo number_format($selected_quantity, 2); ?> kgs of 
                    <?php 
                    foreach ($ingredient_ids as $index => $id) {
                        if ($id == $selected_ingredient_id) {
                            echo htmlspecialchars($ingredient_names[$index]);
                            break;
                        }
                    } ?> 
                    and according to the given recipe ratio, the following quantities and costs for ingredients are required:</p>

                    <table class="table table-invoice"> 
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
                            $total_ingredient_cost += $cost;

                            echo "<tr>
                                    <td>{$ingredient_name}</td>
                                    <td>" . number_format($adjusted_quantity, 2) . "</td>
                                    <td>" . number_format($price, 2) . "</td>
                                    <td>" . number_format($cost, 2) . "</td>
                                </tr>";
                        }
                        ?>
                        <tr>
                            <td>Total</td>
                            <td><?php echo number_format($total_quantity, 2); ?></td>
                            <td></td>
                            <td><?php echo number_format($total_ingredient_cost, 2); ?></td>
                        </tr>
                    </tbody>
                </table>

                <h4>Total Cost for Producing <?php echo number_format($total_quantity, 2); ?> kgs: <?php echo number_format($total_ingredient_cost, 2); ?></h4>
                <h4>Additional Costs: <?php echo number_format($total_additional_costs, 2); ?></h4>
                <h4>Total Production Cost: <?php echo number_format($total_ingredient_cost + $total_additional_costs, 2); ?></h4>
                <h4>Cost per Kg: <?php echo number_format(($total_ingredient_cost + $total_additional_costs) / $total_quantity, 2); ?></h4>

                </div>

                <div class="text-center no-print">
                    <button class="btn btn-secondary" onclick="history.back();"><i class="bi bi-arrow-left"></i></button>
                    <button class="btn btn-primary" onclick="printPage()">Print Report</button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
