<?php
session_start();    
if(isset($_SESSION["user_login"])) {
  header("Location: http://localhost/pomodoro/index.php");
}

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
    <div class="conatiner-fluid" id="signup">
        <div class="row signupbg">
            <div class="col-lg-6 left-section d-none d-lg-block"></div>
            <div class="co-12 col-lg-6 right-section ">
                <div class="form-box mx-auto my-5"  >

              
                <h3 class="text-white duration-font1">Sign in</h3>
                <h5 class="text-white form-font1">Create your account in a seconds</h5>



               <!-- SignUp Form Start Here -->
        <form id="signup-form">
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
            </div>
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
            </div>
            <div class="mb-3 mt-3">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <div class="form-check mb-3 py-3">
                <label class="form-check-label text-white">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"> I agree to the terms and privacy policy
                </label>
            </div>
            <button class="btn btn-purple2 w-100 signup d-flex justify-content-center align-items-center gap-3" id="save-signup">
                Create an account
                <div class="spinner-border text-info" role="status" id="spinner" style="display:none">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
            <div class="pt-4 pb-3">
                <p class="text-white">Already a member? <a href="login.php" class="purple">Login </a></p>
            </div>
            <h3 class="continue-with text-center">
                <span class="form-font1">Or continue with</span>
            </h3>
            <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                <!-- Google Sign-In Button -->
                <a href="google-oauth.php"><img src="assets/images/google.png" alt="Login with Google"></a>
                <a href="#"><img src="assets/images/apple.png" alt="Continue with Apple"></a>
            </div>
        </form>
        <!-- SignUp Form End Here -->
            </div>
        </div>

        
    <div class="error-message"></div>
    <div class="success-message"></div>
    </div>

    

    <!-- Javascript Files -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>

      <script>
       $(document).ready(function(){
    $("#save-signup").on("click",function(e){
        e.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var pwd = $("#pwd").val();
        var remember=$("#remember").is(":checked") ? 1 : 0;
        if(fname == "" || lname == "" || email=="" || pwd ==""){
            $(".error-message").html("All fields are required.").slideDown();
            $(".success-message").slideUp();
            setTimeout(() => {
                $(".error-message").slideUp();
            },3000);
        }else{

          // Show the loader
          $("#spinner").show();

            $.ajax({
                url: "ajax-insert.php",
                type : "POST",
                data : {first_name:fname, last_name: lname,email:email,password:pwd,remember:remember},
                success : function(data){
                    if(data == "success"){
                        $("#signup-form").trigger("reset");
                        $(".success-message").html("Data Inserted Successfully.PlZ Activate Your Account").slideDown();
                        setTimeout(() => {
                            $(".success-message").slideUp();
                        },3000);
                        $(".error-message").slideUp();
                    } else if(data == "email_exists") {
                        $(".error-message").html("Email already exists.").slideDown();
                        setTimeout(() => {
                            $(".error-message").slideUp();
                        },3000);
                        $(".success-message").slideUp();
                    } else {
                        $(".error-message").html("Can't Save Record.").slideDown();
                        setTimeout(() => {
                            $(".error-message").slideUp();
                        },3000);
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
