<?php
session_start();

// Simulate login for demonstration (remove in production)
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

// Logout logic (if user clicked logout)
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>COD Gaming Shop</title>

  <!-- CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="dots"><span></span><span></span><span></span></div>
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
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="shop.php">Our Shop</a></li>
            <li><a href="product-details.php">Product Details</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="cart.php">Add to cart</a></li>
            <?php if ($_SESSION['loggedIn']): ?>
              <li><a href="?logout=true">Logout</a></li>
            <?php else: ?>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
            <?php endif; ?>
          </ul>
          <a class='menu-trigger'><span>Menu</span></a>
        </nav>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="main-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="caption header-text">
          <h6>Welcome to COD Gaming</h6>
          <h2>BEST GAMING SITE EVER!</h2>
          <p>Online Gaming</p>
          <div class="search-input">
            <form id="search" action="#" method="get" onsubmit="return handleSearch(event)">
              <input type="text" placeholder="Type Something" id="searchText" name="searchKeyword" />
              <button type="submit">Search Now</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-2">
        <div class="right-image">
          <img src="assets/images/banner-image.jpg" alt="">
          <span class="price">$22</span>
          <span class="offer">-40%</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add your existing HTML sections below (features, trending, most played, etc.) -->

<!-- Footer -->
<footer>
  <div class="container">
    <div class="col-lg-12">
      <p>Copyright © 2048 RAILEY Gaming Company. All rights reserved.</p>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
function handleSearch(event) {
  event.preventDefault();
  const searchText = document.getElementById('searchText').value;

  // Call your backend PHP API using Axios
  axios.post('search-api.php', {
    keyword: searchText
  })
  .then(response => {
    // Show result (in real app, use DOM manipulation to display)
    alert('Server response: ' + response.data.message);
    console.log(response.data);
  })
  .catch(error => {
    console.error('API error:', error);
    alert('An error occurred while searching.');
  });

  return false;
}
</script>


</body>
</html>
