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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NavBar -->
    <?php
    include_once("./partials/Navbar.php");
    ?>

    <section>
        <div class="py-5 px-2 px-md-0">
            <h2 class="duration-font1 text-center mb-3">Online Pomodoro Time & Task Tracker</h2>
            <div class="d-flex justify-content-center">
                <p class="hero-section-font3" style="max-width: 1070.149px;">
                    The Online Pomodoro Time & Task Tracker helps you boost productivity by managing tasks with timed intervals. It allows you to set tasks, allocate time, and take regular breaks, ensuring focused work sessions and effective time management.
                </p>
            </div>
        </div>
    </section>

    <div class="conatiner-fluid ">
        <div class="container-lg">

            <div class="tracker-main">
                <div class="row">



                
                    <div class="container py-5">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs d-flex justify-content-around align-items-center gap-3 pb-2">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home" style="padding: 12px 8px;">(Last 24 Hours)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu1" style="padding: 12px 8px;">(Last 7 Days)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu2" style="padding: 12px 8px;">(Last 30 Days)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu3">
                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                        <img src="assets/images/calander.png" alt="calander">
                                        <span class="tracker-font2 bolder">By Day</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu4">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <img src="assets/images/bytask.png" alt="calander">
                                        <span class="tracker-font2">By Task</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        
                    <div class="co-12 pb-2 pt-3">
                        <div class="tracker-btn d-flex justify-content-center align-items-center gap-3 py-2 flex-wrap text-white">
                            <span class="d-flex justify-content-center align-items-center gap-3">
                                <img src="assets/images/task-icon.png" alt="">
                                <span class="tracker-font2 text-white activePomoTask">4 Task</span>
                            </span>
                            <span class="d-flex justify-content-center align-items-center gap-3">

                                <img src="assets/images/clcok-icom.png" alt="">
                                <span class="tracker-font2 text-white activePomoDuration">1:50:00</span>
                            </span>
                            <span class="d-flex justify-content-center align-items-center gap-3">
                                <img src="assets/images/veg-icon.png" alt="">
                                <span class="tracker-font2 text-white">Pomodoro</span>
                            </span>
                        </div>
                    </div>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane container active text-white p-0 mt-3  hours-24" id="home">

                            </div>
                            <div class="tab-pane container fade text-white p-0 mt-3 days-7" id="menu1">

                            </div>
                            <div class="tab-pane container fade text-white p-0 mt-3 days-30" id="menu2">

                            </div>
                            <div class="tab-pane col-12 bg-white rounded" id="menu3">
                                <!-- Accordions -->
                                <section>
                                    <div class="container py-4 ">
                                        <!-- Step1 -->
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <!-- content  -->
                                        </div>




                                    </div>
                                </section>
                            </div>

                            <div class="tab-pane col-12 bg-white rounded" id="menu4">
                                <!-- Accordions -->
                                <section>
                                    <div class="container py-4 ">
                                        <!-- Step1 -->
                                        <div class="accordion accordion-flush" id="accordionFlushExample2">
                                           <!-- content  -->
                                        </div>




                                    </div>
                                </section>
                            </div>


                        </div>

                    </div>


                </div>
            </div>

        </div>

    </div>





    <?php
    include_once("./partials/Footer.php");
    ?>

    <!-- Javascript Files -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>