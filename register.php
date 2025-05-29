<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } elseif (strlen($username) < 3) {
        $error = "Username must be at least 3 characters.";
    } else {
        // Check if username exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $error = "Username already taken.";
        } else {
            // Hash password and save user
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hash]);

            $_SESSION['registered'] = "Account created successfully. Please login.";
            header("Location: login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register - COD Gaming</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Background & font */
    body {
      background: #121212;
      background-image: radial-gradient(circle at top left, #0ff, #00aaff33);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Orbitron', sans-serif;
      color: #00ffff;
      margin: 0;
    }

    /* Container card */
    .card {
      background: #1a1a1a;
      border-radius: 20px;
      width: 100%;
      max-width: 420px;
      padding: 2rem;
      box-shadow:
        0 0 10px #00ffff55,
        0 0 30px #00ffff88,
        0 0 60px #00ffffaa;
      border: 1px solid #00ffff88;
      text-align: center;
    }

    /* Title styling */
    .card-title {
      font-size: 2.5rem;
      font-weight: 900;
      margin-bottom: 1.5rem;
      color: #00ffff;
      text-shadow: 0 0 10px #00ffffbb;
    }

    /* Input fields */
    .form-control {
      background: #222;
      border: 1.5px solid #00ffff;
      border-radius: 10px;
      color: #00ffff;
      font-weight: 600;
      box-shadow: inset 0 0 5px #00ffff66;
      transition: border-color 0.3s ease;
    }

    .form-control:focus {
      border-color: #00ffffee;
      box-shadow: 0 0 8px #00ffffcc;
      background: #121212;
      color: #00ffff;
      outline: none;
    }

    /* Labels */
    label {
      color: #00ffffcc;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      display: block;
      margin-bottom: 0.25rem;
      text-align: left;
    }

    /* Buttons */
    .btn-success {
      background: linear-gradient(45deg, #00ffff, #0088cc);
      border: none;
      font-weight: 700;
      border-radius: 12px;
      padding: 10px 30px;
      box-shadow: 0 0 15px #00ffffbb;
      transition: background 0.4s ease;
      letter-spacing: 0.1em;
      width: 100%;
    }

    .btn-success:hover {
      background: linear-gradient(45deg, #00e5ff, #00b3ff);
      box-shadow: 0 0 25px #00ffffee;
    }

    .btn-link {
      color: #00ffffaa;
      font-weight: 700;
      text-decoration: none;
      display: block;
      margin-top: 1rem;
      letter-spacing: 0.1em;
      transition: color 0.3s ease;
      text-align: center;
    }

    .btn-link:hover {
      color: #00ffff;
      text-decoration: underline;
    }

    /* Alert messages */
    .alert-danger {
      background: #660000aa;
      border-radius: 12px;
      padding: 0.75rem 1rem;
      margin-bottom: 1rem;
      color: #ff6b6b;
      font-weight: 700;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .card {
        padding: 1.5rem;
      }
      .card-title {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  <div class="card p-4">
    <h2 class="card-title text-center mb-4">Register to COD Gaming</h2>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="mb-3">
        <label for="username">Username</label>
        <input
          type="text"
          name="username"
          id="username"
          class="form-control"
          required
          autofocus
          minlength="3"
        />
      </div>
      <div class="mb-3">
        <label for="password">Password</label>
        <input
          type="password"
          name="password"
          id="password"
          class="form-control"
          required
        />
      </div>
      <div class="mb-3">
        <label for="confirm_password">Confirm Password</label>
        <input
          type="password"
          name="confirm_password"
          id="confirm_password"
          class="form-control"
          required
        />
      </div>
      <button type="submit" class="btn btn-success">Register</button>
      <a href="login.php" class="btn-link">Already have an account? Login here</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
