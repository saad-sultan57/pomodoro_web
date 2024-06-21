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
    <!-- Hero Section -->
    <div class="container-fluid">
      <div class="container py-5" id="hero-section">
        <div class="row">
          <div class="col-md-12 timer2-banner p-3 p-md-5">
            <h1 class="hero-section-font1 mt-3">Aesthetic Pomodoro Timer</h1>
            <div>
              <div class="d-flex align-items-center gap-5 pt-5 pb-3">
                <img
                  src="assets/images/tick.png"
                  alt="tick"
                  class="tick-icon"
                />
                <h4 class="hero-section-font2">Free to use</h4>
              </div>
              <div class="d-flex align-items-center gap-5 py-1 py-md-3">
                <img
                  src="assets/images/tick.png"
                  alt="tick"
                  class="tick-icon"
                />
                <h4 class="hero-section-font2">No signup required</h4>
              </div>
              <div class="d-flex align-items-center gap-5 py-1 py-md-3">
                <img
                  src="assets/images/tick.png"
                  alt="tick"
                  class="tick-icon"
                />
                <h4 class="hero-section-font2">Multiple audiovisual themes</h4>
              </div>
            </div>
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
      
    </section>
     <!-- Duration -->
     <section id="duration" class="mb-5">
      <div class="container-fluid">
        <div class="container light-blue rounded px-0 px-md-5">
          <div class="row">
            <div class="pt-4 pb-5">
              <h2 class="hero-section-font1 text-center mb-3">
                Other Durations
              </h2>
              <p class="hero-section-font3">
                25 minutes not working for you? Try another pomodoro duration
              </p>
            </div>
            <div class="row boxes-row m-0">
              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
                
              >
           
              <a    href="clock.php?timerLength=5">
                <h4 class="duration-font1 text-center">5</h4>
                <p class="hero-section-font3">Minutes</p>
                </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=10">

                <h4 class="duration-font1">10</h4>
                <p class="hero-section-font3">Minutes</p>
                </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=15">

                <h4 class="duration-font1">15</h4>
                <p class="hero-section-font3">Minutes</p>
                </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=20">

                <h4 class="duration-font1">20</h4>
                <p class="hero-section-font3">Minutes</p>
            </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=25">

                <h4 class="duration-font1">25</h4>
                <p class="hero-section-font3">Minutes</p>
                </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=30">

                <h4 class="duration-font1">30</h4>
                <p class="hero-section-font3">Minutes</p>
                </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=35">

                <h4 class="duration-font1">35</h4>
                <p class="hero-section-font3">Minutes</p>
              </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=40">
              
                <h4 class="duration-font1">40</h4>
                <p class="hero-section-font3">Minutes</p>
                </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=45">

                <h4 class="duration-font1">45</h4>
                <p class="hero-section-font3">Minutes</p>
              </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=50">

                <h4 class="duration-font1">50</h4>
                <p class="hero-section-font3">Minutes</p>
              </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=60">

                <h4 class="duration-font1">60</h4>
                <p class="hero-section-font3">Minutes</p>
              </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=65">

                <h4 class="duration-font1">65</h4>
                <p class="hero-section-font3">Minutes</p>
              </a>
              </div>

              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=70">

                <h4 class="duration-font1">70</h4>
                <p class="hero-section-font3">Minutes</p>
                </a>
              </div>
              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=75">
                <h4 class="duration-font1">75</h4>
                <p class="hero-section-font3">Minutes</p>
              </a>
              </div>
              <div
                class="subbox d-flex justify-content-center align-items-center flex-column"
              >
              <a    href="clock.php?timerLength=80">
                <h4 class="duration-font1">80</h4>
                <p class="hero-section-font3">Minutes</p>
              </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Accordions -->
    <section>
      <div class="container p-4">
        <!-- Step1 -->
        <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
          <div class="accordion-item rounded-3 border-0 shadow mb-2">
            <h2 class="accordion-header rounded">
              <button
                class="accordion-button border-bottom collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <h2 class="m-0 p-0 accordions-font2 d-flex align-items-center">
                  <span class="pe-4 accordions-font1">01</span>A brief history
                  of the pomodoro technique
                </h2>
              </button>
            </h2>
            <div
              id="flush-collapseOne"
              class="accordion-collapse collapse"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <p>
                  Although you’ll often see the pomodoro technique recommended
                  online as a solution to procrastination, it actually predates
                  the internet itself. It was invented by Italian programmer
                  Francesco Cirillo in the 1980’s whilst he was a University
                  student.Cirillo, struggling to stay focused on his studies,
                  challenged himself to focus for just 25 minutes on a single
                  task. In order to do so, he found a tomato shaped kitchen
                  timer to alert him when the time was up - hence the name
                  “pomodoro”, which is tomato in Italian.Since then, many people
                  around the world have used his technique to help them stay
                  focused - it’s become something of a productivity phenomenon,
                  and for good reason.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Step2 -->
        <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
          <div class="accordion-item rounded-3 border-0 shadow mb-2">
            <h2 class="accordion-header rounded">
              <button
                class="accordion-button border-bottom collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapse2"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <h2 class="m-0 p-0 accordions-font2 d-flex align-items-center">
                  <span class="pe-4 accordions-font1">02</span>What is the
                  pomodoro method?
                </h2>
              </button>
            </h2>
            <div
              id="flush-collapse2"
              class="accordion-collapse collapse"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <p>
                  So now know the history - how does it actually work? And
                  crucially, how can it help you focus and get things done?It’s
                  actually pretty simple - you set a timer for 25 minutes and
                  work. During those 25 minutes you try and focus only on work -
                  no emails, no TV, no interruptions. When those 25 minutes are
                  up, you take a 5 minute break and start another pomodoro.
                  After a few pomodoros (usually around 4) you can then take a
                  longer break of 15-20 minutes.
                </p>
                <div class="text-white">
                  <div
                    class="d-flex justify-content-center align-items-center flex-column py-4"
                  >
                    <img
                      src="assets/images/steps.png"
                      alt="steps"
                      class="w-75"
                    />
                  </div>
                  <p>
                    Because it forces you to break work down into chunks of 25
                    minutes, it’s easier to just get started and avoid
                    distractions, knowing that you’ll only have to focus for 25
                    minutes, and have a short break coming up afterwards.Of
                    course, the 25/5 system of pomodoros is only a suggested
                    length - some people find that 50/10 works better for them.
                    Really, it’s whatever works for you.PS. At the moment the
                    ZenFocus timer only supports 25/5 - but we’re working on
                    adding the ability to edit your pomodoro and break lengths!
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Step3 -->
        <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
          <div class="accordion-item rounded-3 border-0 shadow mb-2">
            <h2 class="accordion-header rounded">
              <button
                class="accordion-button border-bottom collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapse3"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <h2 class="m-0 p-0 accordions-font2 d-flex align-items-center">
                  <span class="pe-4 accordions-font1">03</span>What should I do
                  on pomodoro breaks?
                </h2>
              </button>
            </h2>
            <div
              id="flush-collapse3"
              class="accordion-collapse collapse"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <p>
                  Whatever you like! But we recommend getting up from your desk
                  if possible - maybe doing some stretches and walking a few
                  steps. It’s a good time to go make yourself a coffee (or
                  whatever your preferred beverage is).
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Step4 -->
        <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
          <div class="accordion-item rounded-3 border-0 shadow mb-2">
            <h2 class="accordion-header rounded">
              <button
                class="accordion-button border-bottom collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapse4"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <h2 class="m-0 p-0 accordions-font2 d-flex align-items-center">
                  <span class="pe-4 accordions-font1">04</span>Will the Pomodoro
                  method work for me?
                </h2>
              </button>
            </h2>
            <div
              id="flush-collapse4"
              class="accordion-collapse collapse"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <p>
                  Of course, everyone is different and the pomodoro method won’t
                  work for everyone. But there is a reason that you’ll see it so
                  commonly being recommended online in productivity circles -
                  for a lot of people it just works. The best thing to do is
                  simply give it a try and see if it helps you.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Step5 -->
        <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
          <div class="accordion-item rounded-3 border-0 shadow mb-2">
            <h2 class="accordion-header rounded">
              <button
                class="accordion-button border-bottom collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapse5"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <h2 class="m-0 p-0 accordions-font2 d-flex align-items-center">
                  <span class="pe-4 accordions-font1">05</span>What is an
                  “aesthetic” pomodoro timer?
                </h2>
              </button>
            </h2>
            <div
              id="flush-collapse5"
              class="accordion-collapse collapse"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <p>
                  You might well have used a pomodoro app at some point - there
                  are many of them online. They all work pretty much the same
                  way - with a simple timer, a ticking sound and an alert when
                  your current pomodoro finishes.An aesthetic pomodoro timer is
                  the same, except that it adds an audiovisual element which is
                  designed to help you block out your surroundings and avoid
                  distractions.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Step6 -->
        <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
          <div class="accordion-item rounded-3 border-0 shadow mb-2">
            <h2 class="accordion-header rounded">
              <button
                class="accordion-button border-bottom collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapse6"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <h2 class="m-0 p-0 accordions-font2 d-flex align-items-center">
                  <span class="pe-4 accordions-font1">06</span>How to use the
                  pomodoro method using ZenFocus?
                </h2>
              </button>
            </h2>
            <div
              id="flush-collapse6"
              class="accordion-collapse collapse"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <p>
                  The ZenFocus timer uses the pomodoro method out of the box!
                  Simply select from the available themes and hit start to begin
                  your first pomodoro.Once you reach 25 minutes, the background
                  will fade and you can then start your break. Then once your
                  time’s up, start another pomodoro.We’ve just launched and are
                  working on many improvements - so keep an eye out!
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Step7 -->
        <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
          <div class="accordion-item rounded-3 border-0 shadow mb-2">
            <h2 class="accordion-header rounded">
              <button
                class="accordion-button border-bottom collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapse7"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <h2 class="m-0 p-0 accordions-font2 d-flex align-items-center">
                  <span class="pe-4 accordions-font1">07</span>What if I have a
                  task that takes more than 25 minutes?
                </h2>
              </button>
            </h2>
            <div
              id="flush-collapse7"
              class="accordion-collapse collapse"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <p>
                  This is fine, but it’s generally recommended that if you have
                  a task that is likely to take more than four pomodoros, it’s
                  probably too big and you should try to break it down into
                  subtasks.This also lets you “complete” tasks more often, which
                  can be psychologically beneficial - giving you a feeling of
                  progress by breaking your work down into smaller chunks.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Step8 -->
        <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
          <div class="accordion-item rounded-3 border-0 shadow mb-2">
            <h2 class="accordion-header rounded">
              <button
                class="accordion-button border-bottom collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapse8"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <h2 class="m-0 p-0 accordions-font2 d-flex align-items-center">
                  <span class="pe-4 accordions-font1">08</span>What if I have a
                  task that takes less than 25 minutes?
                </h2>
              </button>
            </h2>
            <div
              id="flush-collapse8"
              class="accordion-collapse collapse"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <p>
                  If you have tasks that take less than 25 minutes, it’s best to
                  combine those smaller tasks into one pomodoro so they can be
                  tackled together.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Step9 -->
        <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
          <div class="accordion-item rounded-3 border-0 shadow mb-2">
            <h2 class="accordion-header rounded">
              <button
                class="accordion-button border-bottom collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapse9"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <h2 class="m-0 p-0 accordions-font2 d-flex align-items-center">
                  <span class="pe-4 accordions-font1">09</span>What if I’m
                  interrupted during a pomodoro?
                </h2>
              </button>
            </h2>
            <div
              id="flush-collapse9"
              class="accordion-collapse collapse"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <p>
                  It’s best to try and avoid interruptions during a pomodoro and
                  treat it as something that cannot be broken, if it all
                  possible.However, this isn’t always possible - for example if
                  you work in a busy office a coworker might interrupt you to
                  ask a question. If this happens, you can either pause your
                  pomodoro and pick up where you left off, or you can take your
                  5 minute break early, refresh and start again.It’s recommended
                  that when these interruptions do happen, you make a note of
                  them so you can keep an eye on them over time, and consider
                  how you might minimise them going forward.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Step 10 -->
        <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
          <div class="accordion-item rounded-3 border-0 shadow mb-2">
            <h2 class="accordion-header rounded">
              <button
                class="accordion-button border-bottom collapsed fw-semibold"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapse10"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <h2 class="m-0 p-0 accordions-font2 d-flex align-items-center">
                  <span class="pe-4 accordions-font1">10</span>Can the pomodoro
                  method help me study?
                </h2>
              </button>
            </h2>
            <div
              id="flush-collapse10"
              class="accordion-collapse collapse"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <p>
                  The pomodoro method works great as a study timer because it
                  forces you to break things up into chunks. One of the
                  difficulties with studying is that it can feel overwhelming
                  with so much information to take in and remember. It’s also
                  important to take regular breaks to avoid becoming overwhelmed
                  with information and burning out. The pomodoro method does
                  this by reminding you to take short breaks every 25 minutes.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
  include_once ("./partials/Footer.php");
  ?>

    <!-- Javascript Files -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
