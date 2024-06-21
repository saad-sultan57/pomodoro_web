<?php
include_once ("./db/connection.php");
?>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
     <!-- NavBar -->
       <?php
      include_once ("./partials/Navbar.php");
      ?>
    <div class="conatiner-fluid py-5" >
        <div class="container">
            <div class="mb-5">
                <h2 class="hero-section-font1 text-center">Contact Us</h2>
                <p class="hero-section-font3">We’re here to help with any questions or support you need.</p>
            </div>
            <div class="contact-form">
                <div class="row">
                    <div class="col-12 col-lg-6 px-0 px-lg-5 contact-message-main" >
                        <div>
                            <h3 class="contact-font1">Let’s connect</h3>
                            <p class="form-font1 mb-4 " style="opacity: 0.8;">We'd love to hear from you! If you have any questions, feedback, or need support, please reach out to us through any of the following methods</p>

                            <!-- Contact Form Submit -->
                             

                            <form id="contact-form">
                                <div class="row">
                                  <div class="col-md-6 my-2 my-md-0">
                                    <input type="text" class="form-control" placeholder="First Name" name="fname" id="fname">
                                  </div>
                                  <div class="col-md-6 my-2 my-md-0">
                                    <input type="text" class="form-control" placeholder="Last Name" name="lname" id="lname">
                                  </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                  </div>
                                  <div class="mb-3 mt-3">
                                    <input type="password" class="form-control" placeholder="Enter password" name="password" id="password">
                                  </div>
                                  <div class="my-3">
                                  <textarea class="form-control" placeholder="Message" rows="5" id="message" name="message"></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-purple2 w-100 d-flex justify-content-center align-items-center gap-3" name="contact-submit" id="contact-submit">Submit
                                  <div class="spinner-border text-info" role="status" id="spinner" style="display:none">
                                      <span class="visually-hidden">Loading...</span>
                                    </div>

                                  </button>
                              </form>
                        </div>
                        <div class="error-message"></div>
                        <div class="success-message"></div>
                    </div>
                    <div class="col-md-6 contact-right d-flex flex-column justify-content-end text-white p-4 d-none d-lg-flex">
                        <p class="mb-0">Ready to boost your productivity? Let’s make every minute count with</p>
                        <p>ZenFocus!</p>
                    </div>
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


    <script>
        $(document).ready(function(){
    $("#contact-submit").on("click",function(e){
        e.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var message = $("#message").val();
        
        if(fname == "" || lname == "" || email=="" || password =="" || message==""){
            // $(".error-message").html("All fields are required.").slideDown();
            // $(".success-message").slideUp();
            // setTimeout(() => {
            //     $(".error-message").slideUp();
            // }, 3000);

                            Swal.fire({
                title: "All fields are required!",
                icon: "error"
                });
        } else {
            // Show the loader
            $("#spinner").show();

            $.ajax({
                url: "ajax-contact-form.php",
                type : "POST",
                dataType: "json",
                data : {
                    first_name: fname,
                    last_name: lname,
                    email: email,
                    password: password,
                    message: message
                },
                success : function(response){
                    if(response.status == "success"){
                        $("#contact-form").trigger("reset");
                        $(".success-message").html(response.message).slideDown();
                        setTimeout(() => {
                            $(".success-message").slideUp();
                        }, 3000);
                        $(".error-message").slideUp();
                    } else {
                        $(".error-message").html(response.message).slideDown();
                        setTimeout(() => {
                            $(".error-message").slideUp();
                        }, 3000);
                        $(".success-message").slideUp();
                    }
                },
                complete: function() {
                    // Hide the loader
                    $("#spinner").hide();
                }
            });
        }
    });
});


    </script>
  </body>
</html>
