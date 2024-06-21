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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
      <!-- NavBar -->
      <?php
      include_once ("./partials/Navbar.php");
      ?>
    <!-- Tabs -->
    <div class="container-fluid" id="tabs">
      <div class="container py-5">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" style="background: transparent;" data-bs-toggle="tab" href="#home"
              >Active</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" style="background: transparent;" href="#menu1">Completed</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane container active" id="home">
            <div class="d-flex justify-content-between align-items-center py-3">
              <h3 class="text-white">My Task</h3>
              <button class="btn btn-purple2" data-bs-toggle="modal" data-bs-target="#myModal">+Add New Task</button>
            </div>
            <div class="row" id="added-tasks" >
             <!-- content -->
            </div>
          </div>
          <div class="tab-pane container fade" id="menu1">
            <div class="d-flex justify-content-between align-items-center py-3">
              <h3 class="text-white">My Task</h3>
              <button class="btn btn-purple2" data-bs-toggle="modal" data-bs-target="#myModal">+Add New Task</button>
            </div>
            <div class="row" id="completed-task">
            <!-- Content -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabs End -->

    <section>
      <div class="py-5 px-3 px-md-0">
        <h2 class="duration-font1 text-center mb-3">
          Pomodoro Timer with Tasks
        </h2>
        <div class="d-flex justify-content-center">
          <p class="hero-section-font3" style="max-width: 1070.149px">
            The Pomodoro Timer with Tasks boosts productivity by breaking work
            into short bursts, aiding focus and task prioritization. It
            allocates time effectively, ensuring tasks are completed within set
            intervals. Regular breaks prevent burnout, while progress tracking
            maintains motivation. In essence, it's a powerful tool for enhancing
            efficiency and time management.
          </p>
        </div>
      </div>
    </section>


  <!-- Model Box -->
   <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Task</h4>
        <button type="button" class="btn-close invert" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="" id="add-task">
            <div class="mb-3 mt-3">
              <label for="taskname" class="form-label">Enter Task Name</label>
              <input type="text" class="form-control" id="taskname" placeholder="Enter Your Task Name" name="taskname">
            </div>
            <label for="comment">Comments:</label>
              <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
            <button type="submit" class="btn btn-purple2 mt-3 w-100 py-2">Submit</button>
        </form>
      </div>

    

    </div>
  </div>
</div>


<?php
  include_once ("./partials/Footer.php");
  ?>

    <!-- Javascript Files -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
   
  </body>
</html>
