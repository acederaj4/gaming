<?php
session_start();

// Simulated registration logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store user credentials in session
    $_SESSION['user'] = [
        'username' => $_POST['username'],
        'password' => $_POST['password'] // Note: use password_hash() in real apps!
    ];

    // Redirect to login page with success message
    header("Location: login.php?registered=1");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - COD Gaming</title>
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <h2>Register</h2>
  <form method="post" action="register.php">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" id="username" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" required />
    </div>
    <button type="submit" class="btn btn-success">Register</button>
    <a href="login.php" class="btn btn-link">Login</a>
  </form>
</div>
</body>
</html>
