<?php
session_start();
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
                            <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Create Your Recipe</h3>
                            <div class="form-contact form-comment wow fadeInUp"> 
                                <form id="recipe-form" action="customize-summary.php" method="POST" onsubmit="return validateIngredients()">
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
                                                        <input class="form-control" id="ingredient_name" name="ingredient_name" type="text" placeholder="Ingredient Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group"> 
                                                        <label class="form-label" for="quantity">Quantity:</label>
                                                        <input class="form-control" id="quantity" name="quantity" type="number" placeholder="Quantity">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group"> 
                                                        <label class="form-label" for="price_per_unit">Price per Unit:</label>
                                                        <input class="form-control" id="price_per_unit" name="price_per_unit" type="number" step="0.01" placeholder="Price per unit">
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
                                                    <div class="info-route-left"> 
                                                        <span class="text-14 color-grey">Ingredient</span>
                                                        <div id="dynamic-ingredient"></div>
                                                    </div>
                                                    <div class="info-route-left"> 
                                                        <span class="text-14 color-grey">Quantity</span>
                                                        <div id="dynamic-quantity"></div>
                                                    </div>
                                                    <div class="info-route-left"> 
                                                        <span class="text-14 color-grey">Price per Unit</span>
                                                        <div id="dynamic-price"></div>
                                                    </div>
                                                    <div class="info-route-left"> 
                                                        <span class="text-14 color-grey">Action</span>
                                                        <div id="dynamic-action"></div>
                                                    </div>
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
                const ingredientsDiv = document.getElementById('dynamic-ingredient');
                const quantitiesDiv = document.getElementById('dynamic-quantity');
                const pricesDiv = document.getElementById('dynamic-price');
                const actionsDiv = document.getElementById('dynamic-action');

                ingredientsDiv.innerHTML += `
                    <div id="ingredient-${ingredientCount}" class="ingredient-item">
                        <input type="hidden" name="ingredients[${ingredientCount}][name]" value="${ingredientName}">
                        <input type="hidden" name="ingredients[${ingredientCount}][quantity]" value="${quantity}">
                        <input type="hidden" name="ingredients[${ingredientCount}][price]" value="${pricePerUnit}">
                        ${ingredientName}
                    </div>
                `;
                quantitiesDiv.innerHTML += `${quantity}<br>`;
                pricesDiv.innerHTML += `${pricePerUnit}<br>`;
                actionsDiv.innerHTML += `<button type="button" onclick="removeIngredient(${ingredientCount})" class="btn btn-danger btn-sm" style="float: right;">Remove</button><br>`;

                ingredientCount++;

                // Clear input fields
                document.getElementById('ingredient_name').value = '';
                document.getElementById('quantity').value = '';
                document.getElementById('price_per_unit').value = '';
            }
        }

        function removeIngredient(index) {
            const ingredientDiv = document.getElementById(`ingredient-${index}`);
            if (ingredientDiv) {
                ingredientDiv.remove();

                // Also remove the corresponding quantity, price, and action
                const quantitiesDiv = document.getElementById('dynamic-quantity');
                const pricesDiv = document.getElementById('dynamic-price');
                const actionsDiv = document.getElementById('dynamic-action');

                // Remove the item at the specified index
                removeAtIndex(quantitiesDiv, index);
                removeAtIndex(pricesDiv, index);
                removeAtIndex(actionsDiv, index);

                // Adjust the remaining items' indexes
                adjustIngredientIndexes();
            }
        }

        function removeAtIndex(container, index) {
            const items = container.children;
            if (index >= 0 && index < items.length) {
                items[index].remove();
            }
        }

        function adjustIngredientIndexes() {
            const ingredientsDiv = document.getElementById('dynamic-ingredient');
            const quantitiesDiv = document.getElementById('dynamic-quantity');
            const pricesDiv = document.getElementById('dynamic-price');
            const actionsDiv = document.getElementById('dynamic-action');

            Array.from(ingredientsDiv.children).forEach((item, index) => {
                item.id = `ingredient-${index}`;
                item.querySelector('input[name^="ingredients"]').name = `ingredients[${index}][name]`;
                item.querySelector('input[name^="ingredients"]').name = `ingredients[${index}][quantity]`;
                item.querySelector('input[name^="ingredients"]').name = `ingredients[${index}][price]`;
            });

            Array.from(quantitiesDiv.children).forEach((child, index) => child.id = `quantity-${index}`);
            Array.from(pricesDiv.children).forEach((child, index) => child.id = `price-${index}`);
            Array.from(actionsDiv.children).forEach((child, index) => child.id = `action-${index}`);
        }

        function validateIngredients() {
            const ingredientsDiv = document.getElementById('dynamic-ingredient');
            if (ingredientsDiv.children.length === 0) {
                alert('Please add at least one ingredient.');
                return false;
            }
            return true;
        }
    </script>

</body>
</html>
