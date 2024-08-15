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
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/landing/icon2.png">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Bakewave | Customize Your Own Recipe</title>
</head>
<body>

    <?php include_once 'includes/preloader.php'; ?>
    <?php include_once 'includes/navbar.php'; ?>

    <main class="main">
        <div class="section pt-60 pb-60 bg-image" style="background-image: url('assets/imgs/landing/profile1.jpg'); background-size: cover; background-position: center;">
            <div class="container-sub">
                <h1 class="heading-44-medium color-white mb-5">Create a Recipe</h1>
                <div class="box-breadcrumb">
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a href="customize">Customize</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="container-sub"> 

                <div class="box-row-tab mt-50">
                    <div class="box-tab-left">
                        <div class="box-content-detail"> 
                            <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Create Your Recipe</h3>
                            <h5 class="mb-30 wow fadeInUp">Enter your recipe as it exists</h5>
                            <div class="form-contact form-comment wow fadeInUp"> 
                                <form id="recipe-form" action="customize-summary" method="POST" onsubmit="return validateIngredients()">
                                    <div class="row"> 
                                        <div class="col-lg-6">
                                            <div class="form-group"> 
                                                <label class="form-label" for="recipe_name">Recipe Name:</label>
                                                <input class="form-control" id="recipe_name" name="recipe_name" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group"> 
                                                <label class="form-label" for="pieces">Number of pieces produced by the recipe:</label>
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
                                                        <input class="form-control" id="ingredient_name" name="ingredient_name" type="text" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group"> 
                                                        <label class="form-label" for="quantity">Quantity:</label>
                                                        <input class="form-control" id="quantity" name="quantity" type="number" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group"> 
                                                        <label class="form-label" for="price_per_unit">Price per Unit:</label>
                                                        <input class="form-control" id="price_per_unit" name="price_per_unit" type="number" step="0.01" >
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

                    <div class="box-tab-right mt-30">
                    <div class="sidebar"> 
                        <div class="d-flex align-items-center justify-content-between wow fadeInUp"> 
                            <h6 class="text-20-medium color-text">About Creating Custom Recipes</h6>
                        </div>
                    </div>
                    <div class="sidebar wow fadeInUp"> 
                        <ul class="list-ticks list-ticks-small list-ticks-small-booking">
                            <!-- <li class="text-14 mb-20">Customize existing recipes to your taste</li> -->
                            <li class="text-14 mb-20">Create your own unique recipes from scratch</li>
                            <li class="text-14 mb-20">Share your recipes with the our platform</li>
                            <li class="text-14 mb-20">Share your recipes with the community</li>
                            <li class="text-14 mb-20">Save recipes for later use</li>
                            <li class="text-14 mb-20">Access your saved recipes in your profile</li>
                            <li class="text-14 mb-20">Receive feedback and comments on your recipes</li>
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
    </script>

</body>
</html>
