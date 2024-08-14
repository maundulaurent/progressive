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
    <title>Bakewave | Choosing the right recipe</title>
  </head>
  <body>
  <?php include_once 'includes/preloader.php'; ?>

  <?php include_once 'includes/navbar.php'; ?>

    <main class="main">
      <section class="section">
        <div class="container-sub"> 
          <div class="box-row-tab mt-50">
            <div class="box-content-detail"> 
              <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Explore Our Recipe Collection</h3>
              <div class="row">
                <?php
                    include 'admin/includes/db.php';

                    $recipesPerPage = 6; // Number of recipes per page
                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $recipesPerPage;

                    // Count total recipes
                    $countResult = $conn->query("SELECT COUNT(*) AS total FROM recipes");
                    $totalRecipes = $countResult->fetch_assoc()['total'];
                    $totalPages = ceil($totalRecipes / $recipesPerPage);

                    // Fetch recipes for current page
                    $sql = "SELECT * FROM recipes LIMIT $recipesPerPage OFFSET $offset";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-lg-4 col-sm-6 mb-30"> 
                  <div class="cardService wow fadeInUp">
                    <div class="cardInfo">
                      <h5 class="text-20-medium color-white mb-10"><?php echo $row['name']; ?></h5>
                      <div class="box-inner-info">
                        <p class="text-14 color-white mb-30">Description - <?php echo $row['description']; ?></p>
                        <form action="evaluation.php" method="POST">
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                          <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
                          <input type="hidden" name="instructions" value="<?php echo $row['instructions']; ?>">
                          <input type="hidden" name="image_path" value="<?php echo $row['image_path']; ?>">
                          <button type="submit" class="btn btn-primary w-100">Select
                              <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                              </svg>
                          </button>
                        </form>
                      </div>
                    </div>
                    <div class="cardImage"><img src="admin/uploads/<?php echo $row['image_path']; ?>" alt="<?php echo $row['name']; ?>" style="width: 100%; height: 320px; object-fit: cover; border-radius: 10px;"></div>
                  </div>
                </div>
                <?php
                        }
                    } else {
                        echo "No recipes found.";
                    }
                    $conn->close();
                ?>
              </div>

              <div class="text-center mt-60 mb-100">
                <nav class="box-pagination">
                  <ul class="pagination">
                      <?php if ($currentPage > 1): ?>
                          <li class="page-item">
                              <a class="page-link page-prev" href="?page=<?= $currentPage - 1 ?>">
                                  <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                  </svg>
                              </a>
                          </li>
                      <?php endif; ?>

                      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                          <li class="page-item<?= $i == $currentPage ? ' active' : '' ?>">
                              <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                          </li>
                      <?php endfor; ?>

                      <?php if ($currentPage < $totalPages): ?>
                          <li class="page-item">
                              <a class="page-link page-next" href="?page=<?= $currentPage + 1 ?>">
                                  <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                                  </svg>
                              </a>
                          </li>
                      <?php endif; ?>
                  </ul>
                </nav>
              </div>

            </div>
          </div>
        </div>
      </section>
    </main>

    <?php include_once 'includes/footer.php'; ?>

    <?php include_once 'includes/scripts.php'; ?>

  </body>
</html>
