
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pomodoro</title>
  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/responsive.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php"><img src="assets/images/nav_logo.png" alt="nav-logo" class="logo" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-4 py-3 py-lg-0">
      <li class="nav-item">
              <a class="nav-link" href="clock.php">Pomodoro</a>
            </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="task1.php">Task</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="timer2.php">Timer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tracker.php">Tracker</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php">Contact</a>
        </li>
      </ul>
      <div class="d-flex gap-2 align-items-center">
        <div class="d-flex gap-4 me-3 d-none d-lg-flex ">
          <img src="assets/images/search_icon.png" alt="search_icon" />
          <img src="assets/images/notification_icon.png" alt="notification_icon" />
        </div>
        <div class="d-flex gap-2">
        <?php
        session_start();
          if(isset($_SESSION["user_login"] ) || isset($_SESSION["google_loggedin"])) {
              // If the user is logged in, show the logout button
              echo '<a href="logout.php" class="btn btn-danger" type="submit">Logout</a>';
          } else {
              // If the user is not logged in, show the signup and login buttons
              echo '<a href="signup.php" class="btn btn-purple" type="submit">Sign up</a>';
              echo '<a href="login.php" class="btn btn-purple" type="submit">Login</a>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</nav>
  <!-- Hero Section -->
  <div class="container-fluid">
    <div class="container py-5" id="hero-section">
      <div class="row">
        <div class="col-md-12 hero-banner p-3 p-md-5">
          <h1 class="hero-section-font1 mt-3">
            Transform your productivity with Pomodoro
          </h1>
          <h4 class="hero-section-font2 pt-3 pt-md-4 pb-3 pb-md-5">
            Experience the life changing effects of the world most popular
            productivity technique with zenfocus and make every moment count
          </h4>
          <a  href="clock.php" class="btn btn-purple2">Start Your Journey</a>
        </div>
      </div>
    </div>
  </div>
  <section>
    <div class="pt-4 pb-5">
      <h2 class="hero-section-font1 text-center mb-3">Select your space</h2>
      <p class="hero-section-font3">
        Find the place that helps you find your flow
      </p>
    </div>
  </section>

 <!-- Slider -->
  <?php
  include_once ("./partials/Slider.php");
  ?>


 <!-- Footer -->
  <?php
  include_once ("./partials/Footer.php");
  ?>
 

  <!-- Javascript Files -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>