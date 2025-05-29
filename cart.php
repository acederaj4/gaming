<?php
session_start();

// Handle update request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart'])) {
        foreach ($_POST['quantities'] as $product_id => $qty) {
            $qty = intval($qty);
            if ($qty < 1) $qty = 1;
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] = $qty;
            }
        }
    }
    // Handle delete request
    if (isset($_POST['delete_item'])) {
        $product_id = $_POST['delete_item'];
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
    }
}

$cart = $_SESSION['cart'] ?? [];

$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <title>COD Gaming - Your Cart</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css" />
  <link rel="stylesheet" href="assets/css/owl.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
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
            <img src="assets/images/logo.png" alt="Logo" style="width: 158px;" />
          </a>
          <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Our Shop</a></li>
            <li><a href="product-details.php">Product Details</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="cart.php" class="active">Add to cart</a></li>
            <?php if ($loggedIn): ?>
              <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
              <li><a href="login.php">Sign In</a></li>
            <?php endif; ?>
          </ul>
          <a class="menu-trigger"><span>Menu</span></a>
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
        <h3>Your Shopping Cart</h3>
        <span class="breadcrumb"><a href="index.php">Home</a> &gt; Your Cart</span>
      </div>
    </div>
  </div>
</div>

<!-- Cart Section -->
<div class="section trending">
  <div class="container">
    <?php if (empty($cart)): ?>
      <p>Your cart is empty.</p>
      <a href="shop.php" class="btn btn-primary mt-3">Go to Shop</a>
    <?php else: ?>
      <form method="post" action="cart.php">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>Game</th>
              <th>Price</th>
              <th style="width: 120px;">Quantity</th>
              <th>Subtotal</th>
              <th style="width: 100px;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $total = 0;
              foreach ($cart as $product_id => $item):
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
            <tr>
              <td><?= htmlspecialchars($item['name']) ?></td>
              <td>$<?= number_format($item['price'], 2) ?></td>
              <td>
                <input
                  type="number"
                  name="quantities[<?= htmlspecialchars($product_id) ?>]"
                  value="<?= $item['quantity'] ?>"
                  min="1"
                  class="form-control"
                  aria-label="Quantity"
                />
              </td>
              <td>$<?= number_format($subtotal, 2) ?></td>
              <td>
                <button 
                  type="submit" 
                  name="delete_item" 
                  value="<?= htmlspecialchars($product_id) ?>" 
                  class="btn btn-danger btn-sm"
                  onclick="return confirm('Are you sure you want to remove this item?');"
                >
                  Delete
                </button>
              </td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="3" class="text-end"><strong>Total</strong></td>
              <td><strong>$<?= number_format($total, 2) ?></strong></td>
              <td></td>
            </tr>
          </tbody>
        </table>

        <button type="submit" name="update_cart" class="btn btn-primary">Update Cart</button>
        <a href="shop.php" class="btn btn-secondary ms-2">Continue Shopping</a>
      </form>
    <?php endif; ?>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="col-lg-12 text-center">
      <p>
        Copyright © 2048 LUGX Gaming Company. All rights reserved.
        &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank">Design: TemplateMo</a>
      </p>
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
