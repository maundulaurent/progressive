<?php
session_start();

// Retrieve the recipe and additional costs from the session
$recipe = $_SESSION['recipe'] ?? null;
$additional_costs = $_SESSION['additional_costs'] ?? [];

if (!$recipe) {
    echo "No recipe found.";
    exit();
}

// Calculate the total additional cost
$total_additional_costs = array_reduce($additional_costs, function ($carry, $cost) {
    return $carry + $cost['price'];
}, 0);

// Calculate the total production cost
$total_production_cost = $recipe['total_cost'] + $total_additional_costs;

// Calculate cost per unit (e.g., per piece)
$cost_per_unit = $total_production_cost / $recipe['pieces'];
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
    <meta name="description" content="Custom Recipe Report">
    <meta name="keywords" content="recipe, report, customize">
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
                            <p class="text-16-medium color-text"></p>
                        </div>
                        <div class="mb-50"> 
                            <h5 class="text-18-medium color-text mb-15">Recipe</h5>
                            <h6 class="text-16-medium color-text mb-5"><?php echo htmlspecialchars($recipe['name']); ?></h6>
                            <p class="color-grey text-14">Number of ingredients: <?php echo count($recipe['ingredients']); ?></p>
                        </div>
                    </div>
                    <div class="invoice-right"> 
                        <div class="mb-60">
                            <div class="d-flex justify-content-between mb-6">                        
                                <h6 class="text-16-medium color-text mb-5">Total Pieces Produced</h6>
                                <span class="text-16-medium color-text"><?php echo htmlspecialchars($recipe['pieces']); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-65">                        
                                <h6 class="text-16-medium color-text mb-5">Total Ingredient Cost</h6>
                                <span class="text-16-medium color-text">sh<?php echo number_format($recipe['total_cost'], 2); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- <h6 class="heading-20-medium color-text">Additional Costs</h6> -->
                        <!-- <div class="col-md-6"> -->
                            <!-- <div class="box-info-book-border wow fadeInUp">  -->
                                <!-- <ul class="list-prices"> -->
                                    <!-- <php foreach ($additional_costs as $cost): ?> -->
                                    <!-- <li><span class="text-top"><php echo htmlspecialchars($cost['name']); ?></span><span class="text-bottom">sh<php echo number_format($cost['price'], 2); ?></span></li> -->
                                    <!-- <php endforeach; ?> -->
                                    <!-- <li><span class="text-top">Total Additional Costs</span><span class="text-bottom">sh<php echo number_format($total_additional_costs, 2); ?></span></li> -->
                                <!-- </ul> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->

                    <p class="mb-65">Based on the provided recipe, the following quantities and costs for ingredients are required:</p>

                    <table class="table table-invoice"> 
                        <thead> 
                            <tr>
                                <th>Ingredient Name</th>
                                <th>Quantity</th>
                                <th>Price per Unit</th>
                                <th>Total Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recipe['ingredients'] as $ingredient): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($ingredient['name']); ?></td>
                                <td><?php echo htmlspecialchars($ingredient['quantity']) . ' ' . htmlspecialchars($ingredient['unit']); ?></td>
                                <td>sh<?php echo number_format($ingredient['cost'], 2); ?></td>
                                <td>sh<?php echo number_format($ingredient['quantity'] * $ingredient['cost'], 2); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <h4>Total Production Cost: sh<?php echo number_format($total_production_cost, 2); ?></h4>
                    <h4>Cost per piece: sh<?php echo number_format($cost_per_unit, 2); ?></h4>
                </div>

                <div class="text-center no-print">
                    
                    <button class="btn btn-primary" onclick="printPage()">Print Report</button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
