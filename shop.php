<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>COD Gaming - Shop Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>

<body>

<!-- Preloader -->
<div id="js-preloader" class="js-preloader">
  <div class="preloader-inner">
    <span class="dot"></span>
    <div class="dots">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>

<!-- Header -->
<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <a href="index.php" class="logo">
            <img src="assets/images/logo.png" alt="Logo" style="width: 158px;">
          </a>
          <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php" class="active">Our Shop</a></li>
            <li><a href="product-details.php">Product Details</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="cart.php">Add to cart</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>   
          <a class='menu-trigger'><span>Menu</span></a>
        </nav>
      </div>
    </div>
  </div>
</header>

<!-- Page Heading -->
<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Our Shop</h3>
        <span class="breadcrumb"><a href="index.php">Home</a> > Our Shop</span>
      </div>
    </div>
  </div>
</div>

<!-- Shop Section -->
<div class="section trending">
  <div class="container">
    <ul class="trending-filter">
      <li><a class="is_active" href="#!" data-filter="*">Show All</a></li>
      <li><a href="#!" data-filter=".adv">Adventure</a></li>
      <li><a href="#!" data-filter=".str">Strategy</a></li>
      <li><a href="#!" data-filter=".rac">Racing</a></li>
    </ul>

    <div class="row trending-box">
      <?php
        // Static product array (replace this with DB fetch logic later)
        $products = [
          ['title' => 'Warframe Veilbreaker', 'img' => 'trending-01.jpg', 'price' => 24, 'old_price' => 36, 'classes' => 'adv'],
          ['title' => 'Tower of Fantasy', 'img' => 'trending-02.jpg', 'price' => 22, 'old_price' => 32, 'classes' => 'str'],
          ['title' => 'Super People', 'img' => 'trending-03.jpg', 'price' => 30, 'old_price' => 45, 'classes' => 'adv rac'],
          ['title' => 'Assasin Creed 2', 'img' => 'trending-04.jpg', 'price' => 22, 'old_price' => 32, 'classes' => 'str'],
          ['title' => 'Super People', 'img' => 'trending-03.jpg', 'price' => 26, 'old_price' => 38, 'classes' => 'rac str'],
          ['title' => 'Warframe Veilbreaker', 'img' => 'trending-01.jpg', 'price' => 20, 'old_price' => 30, 'classes' => 'rac adv'],
          ['title' => 'Assasin Creed 2', 'img' => 'trending-04.jpg', 'price' => 22, 'old_price' => 32, 'classes' => 'rac str'],
          ['title' => 'Tower of Fantasy', 'img' => 'trending-02.jpg', 'price' => 22, 'old_price' => 32, 'classes' => 'rac adv'],
          ['title' => 'Super People', 'img' => 'trending-03.jpg', 'price' => 20, 'old_price' => 28, 'classes' => 'adv rac'],
          ['title' => 'Assasin Creed 2', 'img' => 'trending-04.jpg', 'price' => 18, 'old_price' => 26, 'classes' => 'str'],
          ['title' => 'Warframe Veilbreaker', 'img' => 'trending-01.jpg', 'price' => 24, 'old_price' => 32, 'classes' => 'adv'],
          ['title' => 'Tower of Fantasy', 'img' => 'trending-02.jpg', 'price' => 30, 'old_price' => 45, 'classes' => 'str'],
        ];

        foreach ($products as $product):
      ?>
      <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 <?php echo $product['classes']; ?>">
        <div class="item">
          <div class="thumb">
            <a href="product-details.php"><img src="assets/images/<?php echo $product['img']; ?>" alt=""></a>
            <span class="price"><em>$<?php echo $product['old_price']; ?></em>$<?php echo $product['price']; ?></span>
          </div>
          <div class="down-content">
            <span class="category">Action</span>
            <h4><?php echo $product['title']; ?></h4>
            <a href="product-details.php"><i class="fa fa-shopping-bag"></i></a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <ul class="pagination">
          <li><a href="#"> &lt; </a></li>
          <li><a href="#">1</a></li>
          <li><a class="is_active" href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#"> &gt; </a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="col-lg-12">
      <p>Copyright © 2025 Online Gaming Company. All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/counter.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
