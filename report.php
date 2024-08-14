<?php
session_start();
include 'admin/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recipe_id = intval($_POST['recipe_id']);
    $units = isset($_POST['units']) ? intval($_POST['units']) : 0;
    $ingredient_ids = $_POST['ingredient_ids'] ?? [];
    $ingredient_quantities = $_POST['ingredient_quantities'] ?? [];
    $ingredient_names = $_POST['ingredient_names'] ?? [];
    $total_cost = 0;
    $total_quantity = 0;

    // Fetch the recipe details
    $sql_recipe = "SELECT name FROM recipes WHERE id = ?";
    $stmt_recipe = $conn->prepare($sql_recipe);
    $stmt_recipe->bind_param('i', $recipe_id);
    if (!$stmt_recipe->execute()) {
        die("Error preparing statement: " . $conn->error);
    }
    $recipe_result = $stmt_recipe->get_result();
    $recipe = $recipe_result->fetch_assoc();
    $stmt_recipe->close();

    if (!$recipe) {
        die("Error: Recipe not found.");
    }

    $recipe_name = htmlspecialchars($recipe['name']);

    // Calculate total cost and quantity
    foreach ($ingredient_ids as $index => $ingredient_id) {
        $quantity = floatval($ingredient_quantities[$index]);
        $price = isset($_POST["price_{$ingredient_id}"]) ? floatval($_POST["price_{$ingredient_id}"]) : 0;
        $total_cost += $quantity * $price;
        $total_quantity += $quantity;
    }

    // Calculate the total cost for the specified units
    $total_cost_for_units = $total_cost * $units;
    $total_quantity_for_units = $total_quantity * $units;

    // Fetch additional costs from the POST request
    $additional_cost_names = isset($_POST['additional_cost_names']) ? $_POST['additional_cost_names'] : [];
    $additional_cost_prices = isset($_POST['additional_cost_prices']) ? $_POST['additional_cost_prices'] : [];
    $total_additional_costs = 0;

    foreach ($additional_cost_prices as $price) {
        $total_additional_costs += floatval($price);
    }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/landing/icon2.png">
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

                <div class="d-flex invoice-top container"> 
                        <div class="invoice-left">
                            <div class="cardImage"><img src="assets/imgs/landing/mainlogo.png" alt="bakewave" style=" height: 80px; object-fit: cover; border-radius: 0px;"></div>
                        </div>
                        <div class="mb-50">
                            <div class="invoice-left">
                                <h3 class="fst-bold">Recipe Generator</h3>
                                <p class="text-16-medium color-text"></p>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom mt-10 mb-25"> </div>
                    <div class="d-flex invoice-top"> 
                        <div class="invoice-left"> 
                            <h3 class="fst-bold">Recipe Generator</h3>
                            <h3 class="mb-4">Requirements for Production</h3>
                            <p class="text-16-medium color-text"><?php echo date('Y-m-d'); ?></p>
                        </div>
                        <div class="mb-50"> 
                            <h5 class="text-18-medium color-text mb-15">Recipe</h5>
                            <h6 class="text-16-medium color-text mb-5"><?php echo $recipe_name; ?></h6>
                            <p class="color-grey text-14">Number of ingredients - <?php echo count($ingredient_ids); ?></p>
                        </div>
                    </div>
                    <div class="invoice-right"> 
                        <div class="mb-60">
                            <div class="d-flex justify-content-between mb-6">                        
                                <h6 class="text-16-medium color-text mb-5">Pieces to produce</h6>
                                <span class="text-16-medium color-text">
                                    <?php echo $units; ?>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-65">                        
                                <h6 class="text-16-medium color-text mb-5">Total quantity of ingredients</h6>
                                <span class="text-16-medium color-text">
                                    <?php echo number_format($total_quantity_for_units, 2); ?> Kgs
                                </span>
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

                    <p class="mb-65">To produce <?php echo $units; ?> pieces, you will require the following:</p>

                    <table class="table table-invoice" style="padding: 0 15px;"> 
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
                            foreach ($ingredient_ids as $index => $ingredient_id) {
                                $ingredient_name = htmlspecialchars($ingredient_names[$index]);
                                $quantity = floatval($ingredient_quantities[$index]);
                                $adjusted_quantity = $quantity * $units;
                                $price = isset($_POST["price_{$ingredient_id}"]) ? floatval($_POST["price_{$ingredient_id}"]) : 0;
                                $cost = $adjusted_quantity * $price;
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
                    
                    <div class="row mt-10">
                            <div class="col-md-8">
                                <div class="sidebar wow fadeInUp"> 
                                    <ul class="list-prices list-prices-2"> 
                                    <li> <span class="text">Ingredients total quantity :   </span><span class="price"> <?php echo number_format($total_quantity_for_units, 2); ?> Kgs</span></li>
                                    <li> <span class="text">Pieces to Produce: </span><span class="price"><?php echo number_format($units); ?> Pieces</span></li>
                                        <li> <span class="text">Additional Costs: </span><span class="price">sh <?php echo number_format($total_additional_costs, 2); ?></span></li>
                                        <li> <span class="text">Total Cost: </span><span class="price">sh <?php echo number_format($total_cost_for_units + $total_additional_costs, 2); ?></span></li>
                                        <li> <span class="text">Cost per piece: </span><span class="price">sh <?php echo number_format(($total_cost_for_units + $total_additional_costs) / $units , 2); ?></span></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="text-center  d-flex justify-content-between container mt-50 ">
                    <div class=""><p class="text-14 mt-10 color-text">Produced and printed by <a class="text-decoration-underline" href="" target="_blank">bakewave</a>. Discover, like, comment on More Recipes @ <a class="text-decoration-underline" href="" target="_blank">bakewave Recipe Generator</a> </p></div>
                    <div class="no-print"><button class="btn btn-primary me-3" onclick="printPage()"><i class="bi bi-printer"></i></button><small >print</small></div>
                </div>
                <div class="mb-90"></div>
                <p>.</p>
            </div>
        </section>
    </main>
</body>
</html>
