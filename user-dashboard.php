<?php
session_start();

include 'admin/includes/db.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

$username = $_SESSION['username'];

// Initialize PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=recipe', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error connecting to database: " . htmlspecialchars($e->getMessage());
    exit();
}

// Prepare SQL query to fetch user details
try {
    $stmt = $conn->prepare("SELECT email, phone_number, created_at FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($email, $phone_number, $created_at);
    $stmt->fetch();
    $stmt->close();
} catch (Exception $e) {
    echo "Error retrieving user details: " . $e->getMessage();
    exit();
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
    <meta name="description" content="User Profile">
    <meta name="keywords" content="profile, user">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/landing/icon2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Bakewave | User Profile</title>
</head>
<body>
  
<?php include_once 'includes/navbar.php' ?>

<main class="main">
    <div class="section pt-60 pb-60 bg-image" style="background-image: url('assets/imgs/select/dash-pic.jpg'); background-size: cover; background-position: center;">
        <div class="container-sub">
            <h1 class="heading-44-medium color-white mb-5">Dashboard</h1>
            <div class="box-breadcrumb">
                <ul>
                    <li><a href="index">Home</a></li>
                    <li><a href="profile">User Dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="section pt-60 bg-white latest-new-white">
        <div class="container-sub"> 
            <div class="row align-items-center"> 
                <div class="col-lg-6 col-md-6 col-sm-6 text-center text-sm-start mb-30"> 
                    <h2 class="heading-24-medium wow fadeInUp">Account Details</h2>
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 text-center text-sm-end mb-30 wow fadeInUp"> 
                    <a href="profile">Edit User Profile</a>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="container-sub">
        <div class="box-row-tab mt-30">
            <!-- box-tab-right is now on the left -->
            <div class="box-tab-right">
                <div class="sidebar">
                    <div >
                        
                        <div class="mt-20 wow fadeInUp">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Created Recipes</button>
                                <div class="border-bottom mt-30 mb-25"></div>
                                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Shared Recipes</button>
                                <div class="border-bottom mt-30 mb-25"></div>
                                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Approved Recipes</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- box-tab-left is now on the right -->
            <div class="box-tab-left">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Created Recipes Tab -->
                    <?php
                    // Pagination variables for Created Recipes
                    $itemsPerPage = 8;
                    $page = isset($_GET['pageCreated']) ? (int)$_GET['pageCreated'] : 1;
                    $offset = ($page - 1) * $itemsPerPage;

                    // Fetch total number of Created Recipes
                    $totalStmt = $pdo->prepare("SELECT COUNT(*) FROM saved_recipes WHERE username = ? AND type = 'saved'");
                    $totalStmt->execute([$username]);
                    $totalRows = $totalStmt->fetchColumn();
                    $totalPages = ceil($totalRows / $itemsPerPage);

                    // Fetch paginated Created Recipes
                    $stmt = $pdo->prepare("SELECT name, ingredients, description, created_at FROM saved_recipes WHERE username = ? AND type = 'saved' LIMIT ? OFFSET ?");
                    $stmt->bindValue(1, $username);
                    $stmt->bindValue(2, $itemsPerPage, PDO::PARAM_INT);
                    $stmt->bindValue(3, $offset, PDO::PARAM_INT);
                    $stmt->execute();
                    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="info-route-left sidebar">
                            <p class="px-4">Created Recipes</p>
                            <div class="border-bottom mt-10 mb-15"></div>
                            <table class="table table-hover w-100">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Recipe Name</th>
                                        <th scope="col">Ingredients</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($recipes) {
                                        foreach ($recipes as $index => $recipe) {
                                            $ingredients = json_decode($recipe['ingredients'], true);
                                            $ingredientCount = is_array($ingredients) ? count($ingredients) : 0;
                                            echo "<tr>
                                                    <th scope='row'>" . ($index + 1 + $offset) . "</th>
                                                    <td>" . htmlspecialchars($recipe['name']) . "</td>
                                                    <td>" . htmlspecialchars($ingredientCount) . " ingredients</td>
                                                    <td>" . htmlspecialchars($recipe['created_at']) . "</td>
                                                    <td>" . htmlspecialchars($recipe['description']) . "</td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No created recipes found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="justify-content-end mt-3">
                                <nav class="justify-content-end box-pagination">
                                    <ul class="pagination">
                                        <?php if ($page > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?pageCreated=<?= $page - 1 ?>">Previous</a>
                                            </li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                            <li class="page-item<?= $i == $page ? ' active' : '' ?>">
                                                <a class="page-link" href="?pageCreated=<?= $i ?>"><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>

                                        <?php if ($page < $totalPages): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?pageCreated=<?= $page + 1 ?>">Next</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Shared Recipes Tab -->
                    <?php
                    // Pagination variables for Shared Recipes
                    $itemsPerPage = 8;
                    $pageShared = isset($_GET['pageShared']) ? (int)$_GET['pageShared'] : 1;
                    $offsetShared = ($pageShared - 1) * $itemsPerPage;

                    // Fetch total number of Shared Recipes
                    $totalStmt = $pdo->prepare("SELECT COUNT(*) FROM saved_recipes WHERE username = ? AND type = 'shared'");
                    $totalStmt->execute([$username]);
                    $totalRowsShared = $totalStmt->fetchColumn();
                    $totalPagesShared = ceil($totalRowsShared / $itemsPerPage);

                    // Fetch paginated Shared Recipes
                    $stmt = $pdo->prepare("SELECT name, ingredients, description, created_at FROM saved_recipes WHERE username = ? AND type = 'shared' LIMIT ? OFFSET ?");
                    $stmt->bindValue(1, $username);
                    $stmt->bindValue(2, $itemsPerPage, PDO::PARAM_INT);
                    $stmt->bindValue(3, $offsetShared, PDO::PARAM_INT);
                    $stmt->execute();
                    $sharedRecipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="info-route-left sidebar">
                            <p class="px-4">Shared Recipes</p>
                            <div class="border-bottom mt-10 mb-15"></div>
                            <table class="table table-hover w-100">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Recipe Name</th>
                                        <th scope="col">Ingredients</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($sharedRecipes) {
                                        foreach ($sharedRecipes as $index => $recipe) {
                                            $ingredients = json_decode($recipe['ingredients'], true);
                                            $ingredientCount = is_array($ingredients) ? count($ingredients) : 0;
                                            echo "<tr>
                                                    <th scope='row'>" . ($index + 1 + $offsetShared) . "</th>
                                                    <td>" . htmlspecialchars($recipe['name']) . "</td>
                                                    <td>" . htmlspecialchars($ingredientCount) . " ingredients</td>
                                                    <td>" . htmlspecialchars($recipe['created_at']) . "</td>
                                                    <td>" . htmlspecialchars($recipe['description']) . "</td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No shared recipes found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="justify-content-end mt-3">
                                <nav class="justify-content-end box-pagination">
                                    <ul class="pagination">
                                        <?php if ($pageShared > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?pageShared=<?= $pageShared - 1 ?>">Previous</a>
                                            </li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $totalPagesShared; $i++): ?>
                                            <li class="page-item<?= $i == $pageShared ? ' active' : '' ?>">
                                                <a class="page-link" href="?pageShared=<?= $i ?>"><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>

                                        <?php if ($pageShared < $totalPagesShared): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?pageShared=<?= $pageShared + 1 ?>">Next</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Approved Recipes Tab -->
                    <?php
                    // Pagination variables for Approved Recipes
                    $itemsPerPage = 8;
                    $pageApproved = isset($_GET['pageApproved']) ? (int)$_GET['pageApproved'] : 1;
                    $offsetApproved = ($pageApproved - 1) * $itemsPerPage;

                    // Fetch total number of Approved Recipes
                    $totalStmt = $conn->prepare("SELECT COUNT(*) FROM recipes WHERE recipe_by = ?");
                    $totalStmt->bind_param("s", $username);
                    $totalStmt->execute();
                    $totalRowsApproved = $totalStmt->get_result()->fetch_row()[0];
                    $totalPagesApproved = ceil($totalRowsApproved / $itemsPerPage);

                    // Fetch paginated Approved Recipes
                    $stmt = $conn->prepare("SELECT id, name FROM recipes WHERE recipe_by = ? LIMIT ? OFFSET ?");
                    $stmt->bind_param("sii", $username, $itemsPerPage, $offsetApproved);
                    $stmt->execute();
                    $resultApproved = $stmt->get_result();
                    ?>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="info-route-left sidebar">
                            <p class="px-4">Approved Recipes</p>
                            <div class="border-bottom mt-10 mb-15"></div>
                            <table class="table table-hover w-100">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Recipe Name</th>
                                        <th scope="col">Ingredients</th>
                                        <th scope="col">Likes</th>
                                        <th scope="col">Dislikes</th>
                                        <th scope="col">Comments</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($resultApproved->num_rows > 0) {
                                        $index = 1 + $offsetApproved;
                                        while ($recipe = $resultApproved->fetch_assoc()) {
                                            $recipeId = $recipe['id'];
                                            $recipeName = htmlspecialchars($recipe['name']);

                                            // Prepare and execute a statement to count unique ingredient names from the recipe_ingredients table
                                            $ingredientsCountStmt = $conn->prepare("SELECT COUNT(DISTINCT ingredient_name) AS ingredient_count FROM recipe_ingredients WHERE recipe_id = ?");
                                            $ingredientsCountStmt->bind_param("i", $recipeId);
                                            $ingredientsCountStmt->execute();
                                            $ingredientsCountResult = $ingredientsCountStmt->get_result();
                                            $ingredientsCountRow = $ingredientsCountResult->fetch_assoc();
                                            $ingredientCount = $ingredientsCountRow['ingredient_count'];

                                            // Get likes
                                            $likesStmt = $conn->prepare("SELECT COUNT(*) AS like_count FROM recipe_likes_dislikes WHERE recipe_id = ? AND type = 'like'");
                                            $likesStmt->bind_param("i", $recipeId);
                                            $likesStmt->execute();
                                            $likesResult = $likesStmt->get_result();
                                            $likeCount = $likesResult->fetch_assoc()['like_count'];

                                            // Get dislikes
                                            $dislikesStmt = $conn->prepare("SELECT COUNT(*) AS dislike_count FROM recipe_likes_dislikes WHERE recipe_id = ? AND type = 'dislike'");
                                            $dislikesStmt->bind_param("i", $recipeId);
                                            $dislikesStmt->execute();
                                            $dislikesResult = $dislikesStmt->get_result();
                                            $dislikeCount = $dislikesResult->fetch_assoc()['dislike_count'];

                                            // Get comments
                                            $commentsStmt = $conn->prepare("SELECT COUNT(*) AS comment_count FROM recipe_comments WHERE recipe_id = ?");
                                            $commentsStmt->bind_param("i", $recipeId);
                                            $commentsStmt->execute();
                                            $commentsResult = $commentsStmt->get_result();
                                            $commentCount = $commentsResult->fetch_assoc()['comment_count'];

                                            echo "<tr>
                                                    <th scope='row'>" . $index++ . "</th>
                                                    <td>" . $recipeName . "</td>
                                                    <td>" . $ingredientCount . " ingredients</td>
                                                    <td>" . $likeCount . "</td>
                                                    <td>" . $dislikeCount . "</td>
                                                    <td>" . $commentCount . "</td>
                                                    <td><a href='evaluation.php?id=" . $recipeId . "'>View Recipe</a></td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No approved recipes found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="justify-content-end mt-3">
                                <nav class="justify-content-end box-pagination">
                                    <ul class="pagination">
                                        <?php if ($pageApproved > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?pageApproved=<?= $pageApproved - 1 ?>">Previous</a>
                                            </li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $totalPagesApproved; $i++): ?>
                                            <li class="page-item<?= $i == $pageApproved ? ' active' : '' ?>">
                                                <a class="page-link" href="?pageApproved=<?= $i ?>"><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>

                                        <?php if ($pageApproved < $totalPagesApproved): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?pageApproved=<?= $pageApproved + 1 ?>">Next</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php' ?>
<?php include_once 'includes/scripts.php' ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
