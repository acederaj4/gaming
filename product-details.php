<?php
session_start();
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>COD Gaming - Product Detail</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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
            <img src="assets/images/logo.png" alt="" style="width: 158px;">
          </a>
          <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Our Shop</a></li>
            <li><a href="product-details.php" class="active">Product Details</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="cart.php">Add to cart</a></li>
            <?php if ($loggedIn): ?>
              <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
              <li><a href="login.php">Sign In</a></li>
            <?php endif; ?>
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
        <h3>Modern Warfare® II</h3>
        <span class="breadcrumb"><a href="index.php">Home</a> &gt; <a href="shop.php">Shop</a> &gt; Modern Warfare</span>
      </div>
    </div>
  </div>
</div>

<!-- Product Section -->
<div class="single-product section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="left-image">
          <img src="assets/images/single-game.jpg" alt="Call of Duty®: Modern Warfare® II">
        </div>
      </div>
      <div class="col-lg-6 align-self-center">
        <h4>Call of Duty®: Modern Warfare® II</h4>
        <span class="price"><em>$28</em> $22</span>
        <p>Call of Duty: Modern Warfare 2 is a first person shooter, and its gameplay revolves around fast-paced gunfights against enemy combatants.</p>

        <form action="add_to_cart.php" method="post" class="d-flex align-items-center mb-3" style="gap:10px; max-width:250px;">
          <input type="hidden" name="product_id" value="COD-MMII" />
          <input type="hidden" name="product_name" value="Call of Duty®: Modern Warfare® II" />
          <input type="hidden" name="price" value="22" />

          <input type="number" name="quantity" min="1" value="1" class="form-control" aria-label="Quantity" style="width: 70px;">
          <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-bag"></i> ADD TO CART</button>
        </form>

        <ul>
          <li><span>Game ID:</span> COD MMII</li>
          <li><span>Genre:</span> <a href="#">Action</a>, <a href="#">Team</a>, <a href="#">Single</a></li>
          <li><span>Multi-tags:</span> <a href="#">War</a>, <a href="#">Battle</a>, <a href="#">Royal</a></li>
        </ul>
      </div>
      <div class="col-lg-12">
        <div class="sep"></div>
      </div>
    </div>
  </div>
</div>

<!-- More Info Tabs -->
<div class="more-info">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="tabs-content">
          <div class="row">
            <div class="nav-wrapper">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews (3)</button>
                </li>
              </ul>
            </div>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="description" role="tabpanel">
                <p>Modern Warfare 2 revolves around intense combat, tactical decision-making, and thrilling gunfights in various global scenarios.</p>
                <br>
                <p>Experience heart-pounding missions and top-tier multiplayer action. Engage in rich storytelling and immerse yourself in the chaos of war.</p>
              </div>
              <div class="tab-pane fade" id="reviews" role="tabpanel">
                <p>Great game with amazing graphics! Loved every minute of the campaign and the online battles are unmatched!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Related Games -->
<div class="section categories related-games">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-heading">
          <h6>Action</h6>
          <h2>Related Games</h2>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main-button">
          <a href="shop.php">View All</a>
        </div>
      </div>
      <?php for ($i = 1; $i <= 5; $i++): ?>
      <div class="col-lg col-sm-6 col-xs-12">
        <div class="item">
          <h4>Action</h4>
          <div class="thumb">
            <a href="product-details.php"><img src="assets/images/categories-0<?php echo $i; ?>.jpg" alt=""></a>
          </div>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="col-lg-12">
      <p>COD SHOP GAMING. All rights reserved.
      &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank">Design: TemplateMo</a></p>
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
