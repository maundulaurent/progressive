<?php
session_start();
include 'admin/includes/db.php';

// Fetch recipe ID from POST (form submission) or fallback to GET (URL)
$recipe_id = isset($_POST['id']) ? intval($_POST['id']) : (isset($_GET['id']) ? intval($_GET['id']) : 0);

// Debugging to check if the recipe_id is set correctly
if ($recipe_id === 0) {
    die("Error: Recipe ID is not provided or invalid.");
}


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

// Fetch the comments
$sql_comments = "SELECT * FROM recipe_comments WHERE recipe_id = ? ORDER BY created_at DESC";
$stmt_comments = $conn->prepare($sql_comments);
$stmt_comments->bind_param('i', $recipe_id);
if (!$stmt_comments->execute()) {
    die("Error preparing statement for comments: " . $conn->error);
}
$comments_result = $stmt_comments->get_result();
$stmt_comments->close();

// For adding the comments
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment']) && isset($_SESSION['username'])) {
  $comment = trim($_POST['comment']);
  $username = $_SESSION['username'];
  

  if (!empty($comment)) {
      $sql_add_comment = "INSERT INTO recipe_comments (recipe_id, username, comment) VALUES (?, ?, ?)";
      $stmt_add_comment = $conn->prepare($sql_add_comment);
      $stmt_add_comment->bind_param('iss', $recipe_id, $username, $comment);

      if (!$stmt_add_comment->execute()) {
          die("Error adding comment: " . $conn->error);
      }

      $stmt_add_comment->close();
      header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $recipe_id);
      exit;
  }
}

// For the likes and dislikes
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
      $action = $_POST['action'];
      
      // Ensure the action is either 'like' or 'dislike'
      if (in_array($action, ['like', 'dislike'])) {
          $sql_check = "SELECT type FROM recipe_likes_dislikes WHERE recipe_id = ? AND username = ?";
          $stmt_check = $conn->prepare($sql_check);
          $stmt_check->bind_param('is', $recipe_id, $username);
          $stmt_check->execute();
          $result_check = $stmt_check->get_result();
          
          if ($result_check->num_rows > 0) {
              // User has already liked or disliked, so update the record
              $existing_action = $result_check->fetch_assoc()['type'];
              
              if ($existing_action != $action) {
                  // Update existing action
                  $sql_update = "UPDATE recipe_likes_dislikes SET type = ? WHERE recipe_id = ? AND username = ?";
                  $stmt_update = $conn->prepare($sql_update);
                  $stmt_update->bind_param('sis', $action, $recipe_id, $username);
                  if (!$stmt_update->execute()) {
                      die("Error updating like/dislike: " . $conn->error);
                  }
                  $stmt_update->close();
              } else {
                  // If the user is trying to perform the same action again, do nothing
                  $sql_delete = "DELETE FROM recipe_likes_dislikes WHERE recipe_id = ? AND username = ?";
                  $stmt_delete = $conn->prepare($sql_delete);
                  $stmt_delete->bind_param('is', $recipe_id, $username);
                  if (!$stmt_delete->execute()) {
                      die("Error deleting like/dislike: " . $conn->error);
                  }
                  $stmt_delete->close();
              }
          } else {
              // Insert new like or dislike
              $sql_insert = "INSERT INTO recipe_likes_dislikes (recipe_id, username, type) VALUES (?, ?, ?)";
              $stmt_insert = $conn->prepare($sql_insert);
              $stmt_insert->bind_param('iss', $recipe_id, $username, $action);
              if (!$stmt_insert->execute()) {
                  die("Error inserting like/dislike: " . $conn->error);
              }
              $stmt_insert->close();
          }
          
          $stmt_check->close();
          header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $recipe_id);
          exit;
      }
  }
} else {
  header("Location: login.php");
  exit;
}

// Fetch the number of likes and dislikes
$sql_likes_dislikes = "SELECT type, COUNT(*) as count FROM recipe_likes_dislikes WHERE recipe_id = ? GROUP BY type";
$stmt_likes_dislikes = $conn->prepare($sql_likes_dislikes);
$stmt_likes_dislikes->bind_param('i', $recipe_id);
$stmt_likes_dislikes->execute();
$likes_dislikes_result = $stmt_likes_dislikes->get_result();
$likes_count = 0;
$dislikes_count = 0;

while ($row = $likes_dislikes_result->fetch_assoc()) {
    if ($row['type'] === 'like') {
        $likes_count = $row['count'];
    } else if ($row['type'] === 'dislike') {
        $dislikes_count = $row['count'];
    }
}
$stmt_likes_dislikes->close();


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
    <title>Recipe Evaluation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>

  <?php include_once 'includes/preloader.php'; ?>

  <?php include_once 'includes/navbar.php'; ?>


  <main class="main">
    <section class="section">
      
    <div class="container mt-4">
      <!-- <div class="box-booking-tabs"> 
            <div class="item-tab wow fadeInUp"><a href="dashboard.php">
                <div class="box-tab-step ">
                    <div class="icon-tab"> <span class="icon-book icon-vehicle"> </span><span class="text-tab">Recipes </span></div>
                    <div class="number-tab"> <span>01</span></div>
                </div></a></div>
            <div class="item-tab wow fadeInUp">
                <div class="box-tab-step active">
                    <div class="icon-tab"> <span class="icon-book icon-extra"> </span><span class="text-tab">Entry and Details</span></div>
                    <div class="number-tab"> <span>02</span></div>
                </div></div>
            <div class="item-tab wow fadeInUp inactive-link">
                <div class="box-tab-step "> 
                    <div class="icon-tab"> <span class="icon-book icon-payment"> </span><span class="text-tab">Final Valuation  </span></div>
                    <div class="number-tab"> <span>03</span></div>
                </div></div>
            

            <div class="item-tab wow fadeInUp">
                <div class="box-tab-step">
                    <div class="icon-tab"> <span class="icon-book icon-pax"> </span><span class="text-tab">Print Report  </span></div>
                    
                </div></div>
      </div> -->
        <h3 class="mb-4 mt-70">Recipe Evaluation for <?php echo htmlspecialchars($recipe['name']); ?></h3>
        <div class="box-row-tab mt-50">
        <div class="box-tab-left">
        <div class="box-frature-image mb-60 wow fadeInUp">
        <div class="cardImage"> 
            <div class="datePost"> 
                <div class="heading-52-medium color-white"><?php echo date('d', strtotime($recipe['created_at'])); ?>.</div>
                <p class="text-14 color-white"><?php echo date('M, Y', strtotime($recipe['created_at'])); ?></p>
              </div><img src="admin/uploads/<?php echo htmlspecialchars($recipe['image_path']); ?>" alt="<?php echo htmlspecialchars($recipe['name']); ?>" >
            </div>
        </div>
        <h4 class="mb-8">Ingredients for this recipe:</h4>
        <div class="row mt-10">
          <div class="col-md-8">
          <div class="sidebar wow fadeInUp"> 
            <ul class="list-prices list-prices-2"> 
              <li> <span class="text">Ingredient Name</span><span class="price">Quantity</span></li>
              <?php
              while ($row = $ingredients_result->fetch_assoc()) {
                  $ingredient_name = htmlspecialchars($row['ingredient_name']);
                  $quantity = htmlspecialchars($row['quantity']);            
                  echo "<li><span class='text'>{$ingredient_name}</span><span class='price'>" . number_format($quantity, 2) . " Kgs</span></li>";
              }
              ?>
            </ul>
          </div>
          </div>
        </div>
        
        
        <div class="sidebar">
          <h3 class="heading-24-medium color-text mb-30 ">Select action for this recipe</h3>
          <div class="mt-5">
              <button id="customizeRecipe" class="btn btn-primary">Customize Recipe</button>
              <button id="checkRequirementsButton" class="btn btn-secondary">Check Requirements</button>
          </div>
        </div>

        <!-- Customize Recipe Section -->
        <div id="customizeSection" class="mt-4" style="display: none;">
            <h4>Customize Recipe</h4>
            <form id="ingredientForm">
                <div class="form-group">
                    <!-- <label for="ingredientSelect">Choose an Ingredient:</label> -->
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
                    <!-- <label for="quantityInput"></label> -->
                    <input type="number" class="form-control" id="quantityInput" step="0.01" placeholder='Enter Quantity for Selected Ingredient (Kgs):'>
                </div>
            </form>

            <div id="resultSection" style="display: none;">
                <h4>Quantities and Their Ratios</h4>
                <p>The quantities for the proposed ingredient quantity are calculated as follows:</p>
                <table class="table table-bordered" id="ingredientsTable">
                    <thead>
                        <tr>
                            <th>Ingredient Name</th>
                            <th>Quantity (Kgs)</th>
                        </tr>
                    </thead>
                    <tbody id="ingredientsList">
                        <!-- Dynamic content will be inserted here -->
                    </tbody>
                </table>
                <button id="addPriceButton" class="btn btn-primary mt-3">Add Price per Item to Evaluate</button>
                <div id="totalValue" class="mt-3" style="display: none;">
                    <h5>Total Value of Kgs Required:</h5>
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
                    <div id="additionalCostsSection" class="mt-4">
                    <h4>Additional Costs</h4>
                    <div id="additionalCostsContainer" class="list-group mb-3">
                            <!-- Dynamic additional cost inputs will be inserted here -->
                        </div>
                        <button type="button" class="btn btn-secondary mt-2" id="addCostButton">Add Additional Cost</button>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Check Evaluated Report</button>
                </form>

                
            </div>
        </div>

                <!-- Check Requirements Section -->
        <div id="requirementsSection" class="mt-4" style="display: none;">
            <h3 class="mb-4">Check Quantity Requirements for <?php echo htmlspecialchars($recipe['name']); ?> recipe</h3>
            <form id="requirementsForm" method="POST" action="report.php">
                <div class="form-group">
                    <input type="number" placeholder='Enter the number of pieces you want to produce using this recipe:' class="form-control" id="unitsInput" name="units" min="1" required>
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
                  <h4 class="mt-4">Additional Costs</h4>
                  <div id="requirementsextra" class="list-group mb-3">
                      <!-- Dynamic additional cost inputs will be inserted here -->
                  </div>
                  <button type="button" class="btn btn-secondary mt-2" id="requirementsButton">Add Additional Cost</button>
                <button type="submit" class="btn btn-primary mt-3">Check Requirements</button>
            </form>
        </div>
              
        <div class="box-share-tags mt-50 wow fadeInUp"> 
            <div class="row d-flex align-items-center"> 
              <div class="buttons-like col-lg-6 mb-30 text-lg-start text-center"> 
                  <!-- <a class="btn btn-like mr-30" href="#" data-id="">Like </a>
                  <a class="btn btn-dislike" href="#" data-id="">Dislike</a> -->
                  <a class="btn btn-like" href="#" data-id="<?php echo $recipe_id; ?>">Like <?php echo $likes_count; ?></a>
                  <a class="btn btn-dislike" href="#" data-id="<?php echo $recipe_id; ?>">Dislike <?php echo $dislikes_count; ?></a>
              </div>
              <div class="col-lg-6 text-lg-end mb-30 text-center">
                  <span class="text-16-medium color-text mr-15">Share</span>
                  <div class="d-inline-block social-single">
                      <a class="icon-socials icon-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($recipe_url); ?>" target="_blank"></a>
                      <a class="icon-socials icon-twitter" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($recipe_url); ?>" target="_blank"></a>
                      <a class="icon-socials icon-instagram" href="https://www.instagram.com/?url=<?php echo urlencode($recipe_url); ?>" target="_blank"></a>
                      <a class="icon-socials icon-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($recipe_url); ?>" target="_blank"></a>
                      <a class="icon-socials icon-whatsapp" href="https://api.whatsapp.com/send?text=<?php echo urlencode($recipe_url); ?>" target="_blank"></a>
                      
                  </div>
              </div>

            </div>
          </div>
        
        <a href="javascript:history.back()" class="mt-4"><i class="bi bi-arrow-left fs-3 text-dark"> Back</i></a>

        </div>
        <div class="box-tab-right">
            <div class="sidebar"> 
              <div class="d-flex align-items-center justify-content-between wow fadeInUp"> 
                  <h6 class="text-20-medium color-text">Recipe Details</h6>
              </div>
              <div class="mt-20 wow fadeInUp">   
                  <div class="mt-0"> <span class="text-14 color-grey">Recipe</span><br><span class="text-14-medium color-text"><?php echo htmlspecialchars($recipe['name']); ?></span></div>
                  <div class="border-bottom mt-30 mb-25"> </div>
                  <div class="box-info-route"> 
                  <!-- <div class="info-route-left"> <span class="text-14 color-grey">Recipe Ingredients</span><span class="text-14-medium color-text">Quantity</span></div> -->
                  <!-- <div class="info-route-left"> <span class="text-14 color-grey">Ingredient 1</span><span class="text-14-medium color-text">50 kg</span></div> -->
              </div>
            </div>
        </div>

    </div>
                
        <!-- Reviews section -->
        <div class="row mt-10">
          <div class="col-md-8">
          <div class="border-bottom mb-50 mt-25"></div>
          <!-- comments section -->
          <div class="box-reviews wow fadeInUp"> 
            <h5 class="text-20-medium color-text mb-30">Reviews</h5>
            
            <?php while ($comment = $comments_result->fetch_assoc()): ?>
                <div class="item-reviews"> 
                    <div class="item-author-info"> 
                        <div class="item-avatar" >
                            <?= strtoupper(substr($comment['username'], 0, 2)); ?>
                        </div>
                        <div class="item-info">
                          <h6 style="display: inline; font-size: 14px;">@<?= htmlspecialchars($comment['username']); ?></h6>
                          <p style="display: inline; font-size: 10px; margin-left: 5px; color: grey;"><?= date('F Y', strtotime($comment['created_at'])); ?></p>
                          <p class="color-text text-16"><?= htmlspecialchars($comment['comment']); ?></p>
                        </div>
                    </div>
                    
                </div>
            <?php endwhile; ?>
          </div>

          <div class="border-bottom mb-50 mt-60"></div>
          <div class="box-form-comment wow fadeInUp"> 
            <h5 class=" mb-30">Leave a Comment</h5>
            <div class="form-comment"> 
                <?php if (isset($_SESSION['username'])): ?>
                <form action="<?= $_SERVER['PHP_SELF'] . '?id=' . $recipe_id ?>" method="POST">
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="form-group"> 
                                <label class="form-label" for="comment">Write Your Comment</label>
                                <textarea class="form-control" id="comment" name="comment" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary mb-10" type="submit">Post Review</button>
                        </div>
                    </div>
                </form>
                <?php else: ?>
                    <p class="text-14 color-text">Please <a href="login.php">login</a> to leave a comment.</p>
                <?php endif; ?>
                
            </div>
        </div>

          </div>
        </div>
        <!-- End Reviews -->
    </div>
    </section>

  </main>

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
                    <label for="price_${ingredient.id}"></label>
                    <input type="number" placeholder="${ingredient.name} Price per Kg:" class="form-control" id="price_${ingredient.id}" name="price_${ingredient.id}" step="0.01" required>
                </div>
            `);
        });

        $('#customizeRecipe').click(function() {
            $('#customizeSection').toggle();
            $('#requirementsSection').hide();
        });

        $('#checkRequirementsButton').click(function() {
            $('#requirementsSection').toggle();
            $('#customizeSection').hide();
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
                        <label for="price_${ingredient.id}"></label>
                        <input type="number" placeholder="${ingredient.name} Price per Kg:" class="form-control" id="price_${ingredient.id}" name="price_${ingredient.id}" step="0.01" required>
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
                  // Add additional costs to the total value
                $('#additionalCostsContainer .additional-cost').each(function() {
                    const costPrice = parseFloat($(this).find('input[name="additional_cost_prices[]"]').val());
                    if (!isNaN(costPrice)) {
                        totalValue += costPrice;
                    }
                });

                $('#totalValueResult').text(totalValue.toFixed(2));
                $('#totalValueHidden').val(totalValue.toFixed(2)); // Set total value in hidden input
                // Allow form to submit
            });
        });

        // Add Additional Costs functionality
        $('#addCostButton').click(function() {
            $('#additionalCostsContainer').append(`
                <li class="list-group-item additional-cost d-flex justify-content-between align-items-center">
                    <input type="text" class="form-control mr-2" name="additional_cost_names[]" placeholder="Cost Name" required style="width: 40%;">
                    <input type="number" class="form-control mr-2" name="additional_cost_prices[]" step="0.01" placeholder="Cost Price" required style="width: 30%;">
                    <button type="button" class="btn btn-danger remove-cost-btn">Remove</button>
                </li>
            `);
        });

        // Add Additional Costs for Requirements
        $('#requirementsButton').click(function() {
            $('#requirementsextra').append(`
                <li class="list-group-item additional-cost d-flex justify-content-between align-items-center">
                    <input type="text" class="form-control mr-2" name="additional_cost_names[]" placeholder="Cost Name" required style="width: 40%;">
                    <input type="number" class="form-control mr-2" name="additional_cost_prices[]" step="0.01" placeholder="Cost Price" required style="width: 30%;">
                    <button type="button" class="btn btn-danger remove-cost-btn">Remove</button>
                </li>
            `);
        });

        // Remove Additional Cost input
        $(document).on('click', '.remove-cost-btn', function() {
            $(this).closest('.additional-cost').remove();
        });

        // for the likes and the dislikes
        $(document).ready(function() {
    $('.btn-like').click(function(event) {
        event.preventDefault();
        handleLikeDislike('like');
    });

    $('.btn-dislike').click(function(event) {
        event.preventDefault();
        handleLikeDislike('dislike');
    });

    function handleLikeDislike(action) {
        const recipeId = $(event.target).data('id');
        $.ajax({
            url: 'handle_likes_dislikes.php',
            type: 'POST',
            data: {
                id: recipeId,
                action: action
            },
            success: function(response) {
                const data = JSON.parse(response);
                if (data.error) {
                    alert(data.error);
                } else {
                    $('.btn-like').text('Like ' + data.likes);
                    $('.btn-dislike').text('Dislike ' + data.dislikes);
                }
            },
            error: function() {
                alert('An error occurred.');
            }
        });
    }
});


        

    });
  </script>



    <?php include_once 'includes/footer.php'; ?>

    <?php include_once 'includes/scripts.php'; ?>

  </body>
</html>