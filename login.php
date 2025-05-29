<?php
session_start();

// Check if registration was successful
$registrationSuccess = isset($_GET['registered']) && $_GET['registered'] == 1;

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Get stored user from session
    if (isset($_SESSION['user'])) {
        $registeredUser = $_SESSION['user'];

        // Validate credentials
        if ($username === $registeredUser['username'] && $password === $registeredUser['password']) {
            $_SESSION['loggedIn'] = true;
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "No registered user found. Please register first.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - COD Gaming</title>
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <h2>Login</h2>

  <?php if ($registrationSuccess): ?>
    <div class="alert alert-success">Account successfully created. Please log in.</div>
  <?php endif; ?>

  <?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
  <?php endif; ?>

  <form method="post" action="login.php">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" id="username" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" required />
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a href="register.php" class="btn btn-link">Register</a>
  </form>
</div>
</body>
</html>
