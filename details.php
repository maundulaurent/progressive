<?php
session_start();
include 'admin/includes/db.php';

// Fetch recipe ID from the form submission
$recipe_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

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

if (!$recipe) {
    die("Error: Recipe not found.");
}

// Fetch the ingredients
$sql_ingredients = "SELECT * FROM recipe_ingredients WHERE recipe_id = ?";
$stmt_ingredients = $conn->prepare($sql_ingredients);
$stmt_ingredients->bind_param('i', $recipe_id);
if (!$stmt_ingredients->execute()) {
    die("Error preparing statement for ingredients: " . $conn->error);
}
$ingredients_result = $stmt_ingredients->get_result();
$stmt_ingredients->close();

$conn->close();
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
    <title>Booking Extra - Multipurpose Startup SaaS HTML Template</title>
  </head>
  <body>
    <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="page-loading">
            <div class="page-loading-inner">
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <header class="header sticky-bar">
      <div class="container">
        <div class="main-header">
          <div class="header-left">
            <div class="header-logo"><a class="d-flex" href="index.php"><h3 class="text-white">Recipe</h3></a></div>
            <div class="header-nav">
              <nav class="nav-main-menu d-none d-xl-block">
                <ul class="main-menu">
                  <li class="has-children"><a class="active" href="index.php">Home</a>
                    <ul class="sub-menu">
                      <li><a href="index.php">Homepage 1</a></li>
                      <li><a href="index-2.html">Homepage 2</a></li>
                      <li><a href="index-8.html">Homepage 8</a></li>
                    </ul>
                  </li>
                  
                  <li class="has-children"><a href="fleet-list.html">Our Fleet</a>
                    <ul class="sub-menu">
                      <li><a href="fleet-list-2.html">Our Fleet 2</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="service-grid.html">Services</a>
                    <ul class="sub-menu">
                      <li><a href="service-grid.html">Service Listing</a></li>
                      <li><a href="service-single.html">Service Single</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="blog-list.html">Blog</a>
                    <ul class="sub-menu">
                      <li><a href="blog-grid.html">Blog Grid</a></li>
                      <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                      <li><a href="blog-list.html">Blog List</a></li>
                      <li><a href="blog-single.html">Blog Single</a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </nav>
              <div class="burger-icon burger-icon-white"><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right">
              <div class="d-none d-xxl-inline-block align-middle mr-10"><a class="text-14-medium call-phone color-white hover-up" href="tel:+41227157000">+41 22 715 7000</a></div>
              <div class="d-none d-xxl-inline-block box-dropdown-cart align-middle mr-10"><span class="text-14-medium icon-list icon-account"><span class="text-14-medium color-white arrow-down">EN</span></span>
                <div class="dropdown-account">
                  <ul>
                    <li><a class="font-md" href="#"><img src="assets/imgs/template/icons/en.png" alt="luxride">
                        English</a></li>
                    <li><a class="font-md" href="#"><img src="assets/imgs/template/icons/fr.png" alt="luxride">
                        French</a></li>
                    <li><a class="font-md" href="#"><img src="assets/imgs/template/icons/cn.png" alt="luxride">
                        Chiness</a></li>
                  </ul>
                </div>
              </div>
            <!-- <a href="user/index.php" class="btn btn-secondary">User Dashboard</a> -->
            <!-- <a href="login.php" class="btn btn-secondary">Admin Login</a> -->
              <div class="box-button-login d-inline-block mr-10 align-middle"><a class="btn btn-default hover-up" href="dashboard.php">Recipes</a></div>
              <div class="box-button-login d-none2 d-inline-block align-middle"><a class="btn btn-white hover-up" href="login.php">Admin</a></div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
      <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
          <div class="perfect-scroll">
            <div class="mobile-menu-wrap mobile-header-border">
              <nav class="mt-15">
                <ul class="mobile-menu font-heading">
                  <li class="has-children"><a class="active" href="index.php">Home</a>
                    <ul class="sub-menu">
                      <li><a href="index.php">Homepage - 1</a></li>
                      <li><a href="index-2.html">Homepage - 2</a></li>
                      <li><a href="index-8.html">Homepage - 8</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="fleet-list.html">Our Fleet</a>
                    <ul class="sub-menu">
                      <li><a href="fleet-list.html">Our Fleet 1</a></li>
                      <li><a href="fleet-list-2.html">Our Fleet 2</a></li>
                      <li><a href="fleet-list-3.html">Our Fleet 3</a></li>
                      <li><a href="fleet-list-4.html">Our Fleet 4</a></li>
                      <li><a href="fleet-single.html">Fleet single</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="service-grid.html">Services</a>
                    <ul class="sub-menu">
                      <li><a href="service-grid.html">Service Listing</a></li>
                      <li><a href="service-grid-2.html">Service Listing 2</a></li>
                      <li><a href="service-grid-3.html">Service Listing 3</a></li>
                      <li><a href="service-single.html">Service Single</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="blog.html">Blog</a>
                    <ul class="sub-menu">
                      <li><a href="blog-grid.html">Blog Grid</a></li>
                      <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                      <li><a href="blog-list.html">Blog List</a></li>
                      <li><a href="blog-single.html">Blog Details</a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="container mt-4">
        <h3 class="mb-4">Recipe Evaluation for <?php echo htmlspecialchars($recipe['name']); ?></h3>
        
        <h4>Ingredients for this recipe:</h4>
        <ul>
            <?php while ($row = $ingredients_result->fetch_assoc()) {
                $ingredient_name = htmlspecialchars($row['ingredient_name']);
                $quantity = htmlspecialchars($row['quantity']);            
                echo "<li>$ingredient_name: $quantity </li>";
            } ?>
        </ul>

        <div class="mt-5">
            <button id="customizeRecipe" class="btn btn-primary">Customize Recipe</button>
            <button id="checkRequirementsButton" class="btn btn-secondary">Check Requirements</button>
        </div>

        <!-- Customize Recipe Section -->
        <div id="customizeSection" class="mt-4" style="display: none;">
            <h4>Customize Recipe</h4>
            <form id="ingredientForm">
                <div class="form-group">
                    <label for="ingredientSelect">Choose an Ingredient:</label>
                    <select class="form-control" id="ingredientSelect">
                        <option value="">Select an ingredient</option>
                        <?php
                        $ingredients_result->data_seek(0); // Reset result pointer to the beginning
                        while ($row = $ingredients_result->fetch_assoc()) {
                            $ingredient_id = $row['id'];
                            $ingredient_name = htmlspecialchars($row['ingredient_name']);
                            echo "<option value='{$ingredient_id}' data-quantity='{$row['quantity']}'>{$ingredient_name}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantityInput">Enter Quantity for Selected Ingredient:</label>
                    <input type="number" class="form-control" id="quantityInput" step="0.01" disabled>
                </div>
            </form>

            <div id="resultSection" style="display: none;">
                <h4>Quantities and Their Ratios</h4>
                <p>The quantities for the proposed ingredient quantity are calculated as follows:</p>
                <table class="table table-bordered" id="ingredientsTable">
                    <thead>
                        <tr>
                            <th>Ingredient Name</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody id="ingredientsList">
                        <!-- Dynamic content will be inserted here -->
                    </tbody>
                </table>
                <button id="addPriceButton" class="btn btn-primary mt-3">Add Price per Item to Evaluate</button>
                <div id="totalValue" class="mt-3" style="display: none;">
                    <h5>Total Value of Units/Kgs Required:</h5>
                    <p id="totalValueResult"></p>
                </div>
                <form id="budgetForm" action="report-custom.php" method="POST" style="display: none;">
                    <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
                    <input type="hidden" name="selected_ingredient_id" id="selectedIngredientId" name="selected_ingredient_id">
                    <input type="hidden" name="selected_quantity" id="selectedQuantity" name="selected_quantity">
                    <input type="hidden" name="total_value" id="totalValueHidden">
                    <div id="budgetInputs">
                        <!-- Dynamic price inputs will be inserted here -->
                    </div>
                    <?php
                    $ingredients_result->data_seek(0);
                    while ($row = $ingredients_result->fetch_assoc()) {
                        echo "<input type='hidden' name='ingredient_ids[]' value='{$row['id']}'>";
                        echo "<input type='hidden' name='ingredient_quantities[]' value='{$row['quantity']}'>";
                        echo "<input type='hidden' name='ingredient_names[]' value='" . htmlspecialchars($row['ingredient_name']) . "'>";
                    }
                    ?>
                    <button type="submit" class="btn btn-success mt-3">Prepare to Print</button>
                </form>


            </div>
        </div>

        <!-- Check Requirements Section -->
        <div id="requirementsSection" class="mt-4">
        
            <h3 class="mb-4">Check Quantity Requirements for <?php echo htmlspecialchars($recipe['name']); ?> recipe</h3>
            <form id="requirementsForm" method="POST" action="report.php">
                
                <div class="form-group">
                    <label for="unitsInput">Enter the number of units you want to produce using this recipe:</label>
                    <input type="number" class="form-control" id="unitsInput" name="units" min="1" required>
                </div>
                <div id="priceInputs" class="mt-3">
                    <h5>Enter Prices for the Ingredients:</h5>
                    <!-- Dynamic price inputs will be inserted here -->
                </div>
                <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
                <?php
                // Add hidden fields for each ingredient's ID, quantity, and name
                $ingredients_result->data_seek(0);
                while ($row = $ingredients_result->fetch_assoc()) {
                    echo "<input type='hidden' name='ingredient_ids[]' value='{$row['id']}'>";
                    echo "<input type='hidden' name='ingredient_quantities[]' value='{$row['quantity']}'>";
                    echo "<input type='hidden' name='ingredient_names[]' value='" . htmlspecialchars($row['ingredient_name']) . "'>";
                }
                ?>
                <button type="submit" class="btn btn-primary mt-3">Check Requirements</button>
            </form>
        </div>

        <a href="javascript:history.back()" class="btn btn-secondary mt-4">Back</a>
    </div>

    <script>
    $(document).ready(function() {
        const ingredients = [];

        // Prepare the ingredients array
        <?php
        $ingredients_result->data_seek(0); // Reset result pointer to the beginning
        while ($row = $ingredients_result->fetch_assoc()) {
            echo "ingredients.push({ id: '{$row['id']}', name: '" . addslashes($row['ingredient_name']) . "', quantity: " . $row['quantity'] . " });";
        }
        ?>

        // Populate price inputs
        ingredients.forEach(ingredient => {
            $('#priceInputs').append(`
                <div class="form-group">
                    <label for="price_${ingredient.id}">${ingredient.name} Price per Kg:</label>
                    <input type="number" class="form-control" id="price_${ingredient.id}" name="price_${ingredient.id}" step="0.01" required>
                </div>
            `);
        });

        $('#customizeRecipe').click(function() {
            $('#customizeSection').toggle();
            $('#requirementsSection').hide();
        });

        $('#ingredientSelect').change(function() {
            const selectedId = $(this).val();
            if (selectedId) {
                $('#quantityInput').prop('disabled', false);
                $('#quantityInput').val('');
                $('#resultSection').hide();
                $('#ingredientsList').empty();
                $('#totalValue').hide();
                $('#budgetForm').hide();
                $('#budgetInputs').empty();
            } else {
                $('#quantityInput').prop('disabled', true);
                $('#resultSection').hide();
                $('#ingredientsList').empty();
                $('#totalValue').hide();
                $('#budgetForm').hide();
                $('#budgetInputs').empty();
            }
        });

        $('#quantityInput').on('input', function() {
            const inputQuantity = parseFloat($(this).val());
            const selectedId = $('#ingredientSelect').val();
            if (!isNaN(inputQuantity) && selectedId) {
                $('#resultSection').show();
                $('#ingredientsList').empty();
                $('#totalValue').hide();
                $('#budgetForm').hide();
                $('#budgetInputs').empty();
                $('#selectedIngredientId').val(selectedId);
                $('#selectedQuantity').val(inputQuantity);

                const selectedIngredient = ingredients.find(ingredient => ingredient.id === selectedId);
                const ratio = inputQuantity / selectedIngredient.quantity;

                ingredients.forEach(ingredient => {
                    const adjustedQuantity = (ingredient.quantity * ratio).toFixed(2);
                    $('#ingredientsList').append(`
                        <tr>
                            <td>${ingredient.name}</td>
                            <td>${adjustedQuantity}</td>
                        </tr>
                    `);
                });

                $('#addPriceButton').show();
            } else {
                $('#resultSection').hide();
            }
        });

        $('#addPriceButton').click(function() {
            $('#totalValue').show();
            $('#budgetForm').show();

            ingredients.forEach(ingredient => {
                $('#budgetInputs').append(`
                    <div class="form-group">
                        <label for="price_${ingredient.id}">${ingredient.name} Price per Kg:</label>
                        <input type="number" class="form-control" id="price_${ingredient.id}" name="price_${ingredient.id}" step="0.01" required>
                    </div>
                `);
            });

            $('#budgetForm').unbind('submit').submit(function(event) {
                let totalValue = 0;
                $('#budgetInputs .form-group').each(function() {
                    const input = $(this).find('input');
                    const price = parseFloat(input.val());
                    const selectedQuantity = parseFloat($('#selectedQuantity').val()); // Use the selected input quantity
                    if (!isNaN(price) && !isNaN(selectedQuantity)) {
                        totalValue += price * selectedQuantity;
                    }
                });

                $('#totalValueResult').text(totalValue.toFixed(2));
                $('#totalValueHidden').val(totalValue.toFixed(2)); // Set total value in hidden input
                // Allow form to submit
            });

        });

        $('#checkRequirementsButton').click(function() {
            $('#requirementsSection').toggle();
            $('#customizeSection').hide();
        });
    });
    </script>

    <main class="main">
      <section class="section">
        <div class="container-sub"> 
        <div class="box-booking-tabs"> 
            <div class="item-tab wow fadeInUp"><a href="dashboard.php">
                <div class="box-tab-step ">
                    <div class="icon-tab"> <span class="icon-book icon-vehicle"> </span><span class="text-tab">Recipes </span></div>
                    <div class="number-tab"> <span>01</span></div>
                </div></a></div>
            <div class="item-tab wow fadeInUp"><a href="details.php">
                <div class="box-tab-step active">
                    <div class="icon-tab"> <span class="icon-book icon-extra"> </span><span class="text-tab">Entry and Details</span></div>
                    <div class="number-tab"> <span>02</span></div>
                </div></a></div>
            <div class="item-tab wow fadeInUp inactive-link">
                <div class="box-tab-step "> 
                    <div class="icon-tab"> <span class="icon-book icon-payment"> </span><span class="text-tab">Final Valuation  </span></div>
                    <div class="number-tab"> <span>03</span></div>
                </div></div>
            

            <div class="item-tab wow fadeInUp">
                <div class="box-tab-step">
                    <div class="icon-tab"> <span class="icon-book icon-pax"> </span><span class="text-tab">Print Recipe  </span></div>
                    <div class="number-tab"> <span>04</span></div>
                </div></div>

        </div>
          <div class="box-row-tab mt-50">
            <div class="box-tab-left">
              <div class="box-content-detail"> 
                <h3 class="heading-24-medium color-text mb-30 wow fadeInUp"><h3 class="mb-4">Recipe Evaluation for <?php echo htmlspecialchars($recipe['name']); ?></h3></h3>
                
                <div class="mt-30"></div>
                  <h3 class="heading-24-medium color-text mb-30">Select action For Recipe</h3>
                  <div class="form-contact form-comment"> 
                    <div class="row"> 
                      <div class="col-lg-12">
                        <div class="form-group">
                          <select class="form-control">
                            <option value="Credit Card">Customize Recipe Card</option>
                            <option value="Paypal">Paypal</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>


                <div class="form-contact form-comment wow fadeInUp"> 
                  <form action="#">
                    <div class="row"> 
                      <div class="col-lg-6">
                        <div class="form-group"> 
                          <label class="form-label" for="fullname">Name</label>
                          <input class="form-control" id="fullname" type="text" value="">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group"> 
                          <label class="form-label" for="lastname">Last Name</label>
                          <input class="form-control" id="lastname" type="text" value="">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group"> 
                          <label class="form-label" for="company">Company</label>
                          <input class="form-control" id="company" type="text" value="">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group"> 
                          <label class="form-label" for="address">Address</label>
                          <input class="form-control" id="address" type="text" value="">
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group"> 
                          <label class="form-label" for="country">Country</label>
                          <select class="form-control" id="country">
                            <option value=""> </option>
                            <option value="UK" selected="selected">UK</option>
                            <option value="USA">USA</option>
                            <option value="VN">Vietnam</option>
                            <option value="JP">Japan</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group"> 
                          <label class="form-label" for="city">City</label>
                          <select class="form-control" id="city">
                            <option value=""> </option>
                            <option value="London" selected="selected">London</option>
                            <option value="New York">New York</option>
                            <option value="Paris">Paris</option>
                            <option value="Berlin">Berlin</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group"> 
                          <label class="form-label" for="zipcode">ZIP / Postal code</label>
                          <input class="form-control" id="zipcode" type="text" value="850">
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="mt-30"></div>
                  <h3 class="heading-24-medium color-text mb-30">Select Payment Method</h3>
                  <div class="form-contact form-comment"> 
                    <div class="row"> 
                      <div class="col-lg-12">
                        <div class="form-group">
                          <select class="form-control">
                            <option value="Credit Card">Credit Card</option>
                            <option value="Paypal">Paypal</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mt-30"></div>
                  <h3 class="heading-24-medium color-text mb-30">Credit Card Payment</h3>
                  <div class="form-contact form-comment"> 
                    <div class="row"> 
                      <div class="col-lg-12">
                        <div class="form-group"> 
                          <label class="form-label" for="cardholdername">Card Holder Name</label>
                          <input class="form-control" id="cardholdername" type="text" value="">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group"> 
                          <label class="form-label" for="cardnumber">Card Number</label>
                          <input class="form-control" id="cardnumber" type="text" value="">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group"> 
                          <label class="form-label" for="month">Month</label>
                          <select class="form-control" id="month">
                            <option value=""> </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="4">5</option>
                            <option value="4">6</option>
                            <option value="4">7</option>
                            <option value="4">8</option>
                            <option value="4">9</option>
                            <option value="4" selected="selected">10</option>
                            <option value="4">11</option>
                            <option value="4">12</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group"> 
                          <label class="form-label" for="year">Year</label>
                          <select class="form-control" id="year">
                            <option value=""> </option>
                            <option value="2023" selected="selected">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-4 col-sm-12">
                        <div class="form-group"> 
                          <label class="form-label" for="cvv">CVV</label>
                          <input class="form-control" id="cvv" type="text" value="850">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mt-0"><img src="assets/imgs/page/booking/payment-card.png" alt="luxride"></div>
                  <p class="text-14 mt-10 color-text">The credit card must be issued in the driver's name. Debit cards are accepted at some locations and for some car categories.</p>
                </div>
                <div class="mt-30 mb-120 wow fadeInUp"> <a class="btn btn-primary btn-primary-big w-100" href="booking-receved.html">Book Now 
                    <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                    </svg></a></div>
              </div>
            </div>
            <div class="box-tab-right">
              <div class="sidebar"> 
                <div class="d-flex align-items-center justify-content-between wow fadeInUp"> 
                  <h6 class="text-20-medium color-text">Recipe Summary</h6>
                </div>
                
                <div class="mt-20 wow fadeInUp"> 
                  
                  <div class="border-bottom mt-30 mb-25"> </div>
                  <div class="mt-0"> <span class="text-14 color-grey">Recipe</span><br><span class="text-14-medium color-text"><?php echo htmlspecialchars($recipe['name']); ?></span></div>
                  <div class="border-bottom mt-30 mb-25"> </div>
                  <div class="mt-0"> <span class="text-14 color-grey">Ingredients for this recipe</span><br><span class="text-14-medium color-text"></span></div>
                </div>
              </div>
              <div class="sidebar wow fadeInUp"> 
                
                <ul class="list-prices list-prices-2">
                    <li><span class="text">Ingredient</span><span class="price">Quantity</span></li>
                    <?php while ($row = $ingredients_result->fetch_assoc()) {
                        $ingredient_name = htmlspecialchars($row['ingredient_name']);
                        $quantity = htmlspecialchars($row['quantity']);
                        echo '<li><span class="text">' . $ingredient_name . '</span><span class="price"> kgs ' . $quantity . '</span></li>';
                    } ?>
                </ul>

                <div class="border-bottom mt-30 mb-15"> </div>
                <ul class="list-prices"> 
                  <li> <span class="text text-20-medium"></span><span class="price text-20-medium"> <!-- Enter total dynamic number of the kgs --></span></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer">
      <div class="footer-1">
        <div class="container-sub">
          <div class="box-footer-top">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-6 text-md-start text-center mb-15 wow fadeInUp">
                <div class="d-flex align-items-center justify-content-md-start justify-content-center"><a class="mr-30" href="#"><img src="assets/imgs/template/logo.svg" alt="Luxride"></a><a class="text-14-medium call-phone color-white hover-up" href="tel:+41227157000">+41 22 715 7000</a></div>
              </div>
              <div class="col-lg-6 col-md-6 text-md-end text-center mb-15 wow fadeInUp">
                <div class="d-flex align-items-center justify-content-md-end justify-content-center"><span class="text-18-medium color-white mr-10">Follow Us</span><a class="icon-socials icon-facebook" href="#"></a><a class="icon-socials icon-twitter" href="#"></a><a class="icon-socials icon-instagram" href="#"></a><a class="icon-socials icon-linkedin" href="#"></a></div>
              </div>
            </div>
          </div>
          <div class="row mb-40">
            <div class="col-lg-3 width-20">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Company</h5>
              <ul class="menu-footer wow fadeInUp">
                <li><a href="#">About us</a></li>
                <li><a href="#">Our offerings</a></li>
                <li><a href="#">Newsroom</a></li>
                <li><a href="#">Investors</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Gift cards</a></li>
              </ul>
            </div>
            <div class="col-lg-3 width-20 mb-30">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Top cities</h5>
              <ul class="menu-footer wow fadeInUp">
                <li><a href="about.html">New York</a></li>
                <li><a href="our-team.html">London</a></li>
                <li><a href="#">Berlin</a></li>
                <li><a href="#">Los Angeles</a></li>
                <li><a href="#">Paris</a></li>
              </ul>
            </div>
            <div class="col-lg-3 width-20 mb-30">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Explore</h5>
              <ul class="menu-footer wow fadeInUp">
                <li><a href="#">Intercity rides</a></li>
                <li><a href="#">Limousine service</a></li>
                <li><a href="#">Chauffeur service</a></li>
                <li><a href="#">Private car service</a></li>
                <li><a href="#">Ground transportation</a></li>
                <li><a href="#">Airport transfer</a></li>
              </ul>
            </div>
            <div class="col-lg-3 width-20 mb-30">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Classes</h5>
              <ul class="menu-footer wow fadeInUp">
                <li><a href="#">Business</a></li>
                <li><a href="#">First</a></li>
                <li><a href="#">XL</a></li>
                <li><a href="#">Assistant</a></li>
              </ul>
            </div>
            <div class="col-lg-3 width-20">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Download The App</h5>
              <div class="text-start wow fadeInUp">
                <div class="box-button-download"><a class="btn btn-download hover-up wow fadeInUp" href="#">
                    <div class="inner-download">
                      <div class="icon-download"><img src="assets/imgs/template/icons/apple-icon.svg" alt="luxride"></div>
                      <div class="info-download"><span class="text-download-top">Download on the</span><span class="text-14-medium">Apple Store</span></div>
                    </div></a><a class="btn btn-download hover-up wow fadeInUp" href="#">
                    <div class="inner-download">
                      <div class="icon-download"><img src="assets/imgs/template/icons/google-icon.svg" alt="luxride"></div>
                      <div class="info-download"><span class="text-download-top">Download on the</span><span class="text-14-medium">Apple Store</span></div>
                    </div></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-2">
        <div class="container-sub">
          <div class="footer-bottom">
            <div class="row align-items-center">
              <div class="col-lg-8 col-md-12 text-center text-lg-start"><span class="text-14 color-white mr-50">© 2024 Luxride</span>
                <ul class="menu-bottom">
                  <li><a href="term-conditions.html">Terms</a></li>
                  <li><a href="term-conditions.html">Privacy policy</a></li>
                  <li><a href="term-conditions.html">Legal notice</a></li>
                  <li><a href="#">Accessibility</a></li>
                </ul>
              </div>
              <div class="col-lg-4 col-md-12 text-center text-lg-end"><a class="btn btn-link-location" href="#">New York</a><a class="btn btn-link-globe active" href="#">English</a></div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="assets/js/vendors/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/waypoints.js"></script>
    <script src="assets/js/vendors/wow.js"></script>
    <script src="assets/js/vendors/magnific-popup.js"></script>
    <script src="assets/js/vendors/perfect-scrollbar.min.js"></script>
    <script src="assets/js/vendors/select2.min.js"></script>
    <script src="assets/js/vendors/isotope.js"></script>
    <script src="assets/js/vendors/scrollup.js"></script>
    <script src="assets/js/vendors/swiper-bundle.min.js"></script>
    <script src="assets/js/vendors/noUISlider.js"></script>
    <script src="assets/js/vendors/slider.js"></script>
    <!-- Count down-->
    <script src="assets/js/vendors/counterup.js"></script>
    <script src="assets/js/vendors/jquery.countdown.min.js"></script>
    <!-- Count down--><script src="assets/js/vendors/jquery.elevatezoom.js"></script>
<script src="assets/js/vendors/slick.js"></script>
<script src="assets/js/vendors/jquery-ui.js"></script>
<script src="assets/js/vendors/jquery.timepicker.min.js"></script>
    <script src="assets/js/main.js?v=1.0.0"></script>
  </body>
</html>