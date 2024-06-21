<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pomodoro</title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
   
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
      <?php
      include_once ("./partials/Navbar.php");
      ?>
    <!-- Hero Section -->
    <div class="container-fluid py-5">
      <div class="container-lg p-2 py-lg-5 overflow-hide" id="clock-section">
            <video src="" autoplay muted loop>
              
          </video>
        <div class="row mx-auto">
            <!-- Simple Time Div -->
            <div
            class="col-md-12 d-flex justify-content-center align-items-center flex-column py-5 d-none" id="simple-clock"
          >
            <span class="d-block text-white" id="clock-theme-name">Rain</span>
            <h2 class="text-white simple-time">20:00</h2>
          </div>
          <!-- Simple Time Div -->
           <div id="simple-clock2 " class="">
          <!-- Clock Image -->
          <div
            class="col-md-12 d-flex justify-content-center align-items-center my-5 " id="watch-time-main"
          >
          <div class="clock-main-2">
            <img
              src="assets/images/watch-png.png"
              alt="timer"
              class="w-100"
              style="max-width: 800.5px"
            />
            <div class="play-time d-flex d-flex justify-content-center align-items-center flex-column">
              <i class="fa-solid fa-play fs-1 text-white mb-2" id="startIcon"></i>
              <i class="fa-solid fa-pause fs-1 text-white mb-2" style="display:none;" id="resumeIcon"></i>
              <h4 class="text-white text-center start-h cursor" id="startBtn" onclick="startTimer()">Start</h4>
              <h4 class="text-white text-center start-h cursor"  id="pauseBtn" onclick="pauseTimer() " style="display: none;" >Pause</h4>
              <h4 class="text-white text-center start-h  cursor" id="resumeBtn" onclick="resumeTimer()" style="display: none;">Start</h4>
            </div>
          </div>
            <div class="watch-time">
              <span id="theme-desc">Rain</span>
              <h2 id="timer">20:00</h2>
            </div>
          
          </div>
          <!-- Clock Image -->
        
          <div
            class="col-12 p-0 m-0 w-75 mx-auto d-flex justify-content-end align-items-center counter-btn-main"
          >
            <div
              class="btn-timer d-flex justify-content-center align-items-center text-white"
            >
              Show Minimalist Clock
            </div>
          </div>
          <div class="col-12 w-100 mx-auto pt-3 pb-5 counter-btn-main">
            <div class="row">
              <div
                class="col-lg-9 d-flex justify-content-end align-items-center"
              >
                <div
                  class="options py-3 px-3 d-flex justify-content-around align-items-center flex-wrap gap-4"
                >
                  <div
                    class="d-flex justify-content-center align-items-center gap-3" 
                  >
                  <div class="icon-back">

                    <i class="fa-solid fa-volume-mute cursor" id="volume"></i>

                  </div>
                    <p class="p-0 mb-0 text-white" id="audio-toggle" >Audio Enabled</p>
                  </div>
                  <div
                    class="d-flex justify-content-center align-items-center gap-3"  data-bs-toggle="modal" data-bs-target="#myModal"
                  >
                  <div >
                  <div class="icon-back">

                    <img src="assets/images/change-theme-icon.png" alt="" >

                  </div>
                  </div>
                  
                    <p class="p-0 mb-0 text-white">Change Theme</p>
                  </div>
                  <div
                    class="d-flex justify-content-center align-items-center gap-3"  data-bs-toggle="modal" data-bs-target="#exampleModal">  
                  
                   <div id="zerobyOne">
                    <h2 id="zerobyOneh2">0/1</h2>
                   </div>
                    <p class="p-0 mb-0 text-white" id="selectTask" >Select a task</p>
                  </div>
                </div>
              </div>
              <div
                class="col-lg-3 d-flex justify-content-center justify-content-lg-start align-items-center"
              >
                <div
                  class="options2 mt-3 mt-lg-0 py-2 py-md-3 d-flex justify-content-center align-items-center gap-3 px-4 px-lg-4"
                  style="width: fit-content"
                >
                  <div id="resetBtn" onclick=resetTimer();>
                    <img
                      src="assets/images/reload.svg"
                      alt="reload"
                      class="w-100"
                    />
                  </div>
                  <div data-bs-toggle="modal" data-bs-target="#myModal2">
                    <img
                      src="assets/images/setting.svg"
                      alt="reload"
                      class="w-100"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
     </div>
        </div>

        <!-- Full Screen -->
        <div class="fullscreen" id="fullscreen-toggle">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 32 32"
            fill="none"
          >
            <path
              d="M6.66667 6.66667H13.3333V4H4V13.3333H6.66667V6.66667ZM13.3333 25.3333H6.66667V18.6667H4V28H13.3333V25.3333ZM28 18.6667H25.3333V25.3333H18.6667V28H28V18.6667ZM25.3333 13.3333H28V4H18.6667V6.66667H25.3333V13.3333Z"
              fill="white"
            />
          </svg>
        </div>
      </div>
    </div>

    
    <section>
      <div class="py-5 px-3 px-md-0">
        <h2 class="duration-font1 text-center mb-3">
          Rain Theme in the Pomodoro Technique
        </h2>
        <div class="d-flex justify-content-center">
          <p class="hero-section-font3" style="max-width: 1070.149px">
            The rain theme in ZenFocus provides a calming backdrop, enhancing
            focus and reducing stress. The gentle sound of rain helps drown out
            distractions, making each Pomodoro session more productive and
            enjoyable.
          </p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php
  include_once ("./partials/Footer.php");
  ?>

         <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close invert" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="task-body">
                <!-- Content goes here -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!--  Change Theme Modal -->
        <div class="modal fade shadow" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Change Theme</h4>
                <button type="button" class="btn-close invert" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body" id="themechange-model">
                <div class="owl-carousel owl-theme image-slider1 pt-3 pb-5">
                  <!-- Carousel content goes here -->
                </div>
              </div>
              <!-- End Modal body -->

            </div>
            <!-- End Modal content -->
          </div>
          <!-- End Modal dialog -->
        </div>
        <audio id="audio-player" autoplay loop></audio>
        <!-- Setting Model -->
      <div class="modal fade shadow" id="myModal2">
        <div class="modal-dialog modal-md">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Timer Config</h4>
              <button type="button" class="btn-close invert" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="/action_page.php" id="pomodoroForm">
                <div class="mb-3 mt-3">
                  <div class="mb-1 mt-3">
                    <label for="pomodoroInput" class="form-label">Pomodoro Length?</label>
                    <input type="number" class="form-control" id="pomodoroInput" placeholder="25" name="pomodoroLength">
                  </div>
                  <small>Enter Your Pomodoro Length</small>
                </div>
                <div class="mb-3 mt-3">
                  <div class="mb-1 mt-3">
                    <label for="breakInput" class="form-label">Short Break Length</label>
                    <input type="number" class="form-control" id="breakInput" placeholder="1" min="0" max="15" name="shortBreakLength">
                  </div>
                  <small>Enter Up to 15</small>
                </div>
                <div class="mb-3 mt-3">
                  <div class="mb-1 mt-3">
                    <label for="sessionInput" class="form-label">Session Length</label>
                    <input type="number" class="form-control" id="sessionInput" placeholder="1" min="0" max="6" name="sessionLength">
                  </div>
                  <small>Enter Up to 6</small>
                </div>
                <button type="submit" class="btn btn-purple2 w-100 mt-3">Submit</button>
              </form>
            </div>
            <!-- End Modal body -->

          </div>
          <!-- End Modal content -->
        </div>
        <!-- End Modal dialog -->
      </div>



    <!-- Music -->
    <audio id="endAudio" src="../pomodoro/assets/media/pong.mp3" preload="auto"></audio>



    <!-- Javascript Files -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/pomodoro.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
    
    </script>
  </body>
</html>
