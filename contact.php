<?php
// Define variables and set to empty values
$name = $surname = $email = $subject = $message = "";
$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Basic sanitization
    $name = htmlspecialchars(trim($_POST["name"]));
    $surname = htmlspecialchars(trim($_POST["surname"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!empty($name) && !empty($surname) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Here you can send email or save to database
        $to = "your-email@example.com"; // Change to your receiving email
        $headers = "From: $email";
        $body = "Name: $name $surname\nEmail: $email\nSubject: $subject\nMessage:\n$message";

        if (mail($to, $subject, $body, $headers)) {
            $success = "Message sent successfully!";
        } else {
            $error = "Message sending failed.";
        }
    } else {
        $error = "Please fill in all required fields correctly.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>COD Gaming - Contact Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>

<body>

<!-- [Preloader & Header sections stay the same as your code above] -->

<div class="contact-page section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="left-text">
          <div class="section-heading">
            <h6>Contact Us</h6>
            <h2>Say Hello!</h2>
          </div>
          <p>Online Gaming is a Buying Games Site</p>
          <ul>
            <li><span>Address</span> Dapa Surigao Del Norte</li>
            <li><span>Phone</span> +63 927 895 1857</li>
            <li><span>Email</span> jm@contact.com</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="right-content">
          <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
          <?php elseif ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
          <?php endif; ?>
          <div class="row">
            <div class="col-lg-12">
              <div id="map">
                <!-- Google map embed here -->
                <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="325px" style="border:0; border-radius: 23px;" allowfullscreen></iframe>
              </div>
            </div>
            <div class="col-lg-12">
              <form id="contact-form" action="" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="text" name="name" id="name" placeholder="Your Name..." required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="text" name="surname" id="surname" placeholder="Your Surname..." required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="email" name="email" id="email" placeholder="Your E-mail..." required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="text" name="subject" id="subject" placeholder="Subject...">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" id="message" placeholder="Your Message" required></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" class="orange-button">Send Message Now</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="container">
    <div class="col-lg-12">
      <p>Copyright © 2025 COD Gaming Company. All rights reserved.</p>
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
