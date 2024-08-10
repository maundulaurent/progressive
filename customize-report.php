
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
                            <h3 class="mb-4">Custom Recipe Report for </h3>
                            <p class="text-16-medium color-text"></p>
                        </div>
                        <div class="mb-50"> 
                            <h5 class="text-18-medium color-text mb-15">Recipe</h5>
                            <h6 class="text-16-medium color-text mb-5"></h6>
                            <p class="color-grey text-14">Number of ingredients:</p>
                        </div>
                    </div>
                    <div class="invoice-right"> 
                        <div class="mb-60">
                            <div class="d-flex justify-content-between mb-6">                        
                                <h6 class="text-16-medium color-text mb-5">Determining Ingredient</h6>
                                <span class="text-16-medium color-text">
                                    
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-65">                        
                                <h6 class="text-16-medium color-text mb-5">Units to Produce</h6>
                                <span class="text-16-medium color-text">2 kgs</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h6 class="heading-20-medium color-text">Additional Costs</h6>
                        <div class="col-md-6">
                            <div class="box-info-book-border wow fadeInUp"> 
                                <ul class="list-prices">
                                    <li> <span class="text-top">Cost Name</span><span class="text-bottom">Cost Price</span></li>
                                    <!-- Display each additional cost and calculate total -->
                                    <li> <span class="text-top">Total Additional Costs</span><span class="text-bottom"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <p class="mb-65">Using 2 kgs of and according to the given recipe ratio, the following quantities and costs for ingredients are required:</p>

                    <table class="table table-invoice"> 
                    <thead> 
                        <tr>
                            <th>Ingredient Name</th>
                            <th>Quantity</th>
                            <th>Price per Kg</th>
                            <th>Total Cost</th>
                        </tr>
                    </thead>
                </table>

                <h4>Total Cost for Producing kgs: </h4>
                <h4>Additional Costs: </h4>
                <h4>Total Production Cost: </h4>
                <h4>Cost per Kg: </h4>

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
