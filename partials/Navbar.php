<?php
session_start();
?>
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
          if(isset($_SESSION["user_login"])) {
              // If the user is logged in, show the logout button
              echo '<a href="logout.php" class="btn btn-danger" type="submit">' . $_SESSION["username"] . ' Logout</a>';
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
