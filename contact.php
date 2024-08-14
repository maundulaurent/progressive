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
    <title>Bakewave | Recipe Generator Contact Page </title>
  </head>
  <body>
  <?php include_once 'includes/preloader.php'; ?>
  <?php include_once 'includes/navbar.php'; ?>

    <main class="main"> 
    <div class="section pt-60 pb-60 bg-image" style="background-image: url('assets/imgs/landing/recipe-selection.jpg'); background-size: cover; background-position: center;">
        <div class="container-sub">
            <h1 class="heading-44-medium color-white mb-5">Contact Us</h1>
            <div class="box-breadcrumb">
                <ul>
                    <li><a href="index">Home</a></li>
                    <li><a href="contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>    
      <section class="section mt-50 mb-120"> 
        <div class="container-sub"> 
          <div class="mw-770">
            <h2 class="heading-44-medium mb-60 text-center wow fadeInUp">Leave us your info</h2>
            <div class="form-contact form-comment wow fadeInUp"> 
              <form action="#">
                <div class="row"> 
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group"> 
                      <label class="form-label" for="fullname">Full Name</label>
                      <input class="form-control" id="fullname" type="text">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group"> 
                      <label class="form-label" for="email">Email</label>
                      <input class="form-control" id="email" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label class="form-label" for="subject">Subject</label>
                      <input class="form-control" id="subject" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label class="form-label" for="message">Message</label>
                      <textarea class="form-control" id="message"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <button class="btn btn-primary" type="">Get In Touch
                      <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

      <?php include_once 'includes/footer.php'; ?>
      <?php include_once 'includes/scripts.php'; ?>
  </body>
</html>