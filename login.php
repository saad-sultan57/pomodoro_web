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
</head>
<body>
  <div class="conatiner-fluid" id="signup">
    <div class="row signupbg">
      <div class="col-lg-6 left-section d-none d-lg-block"></div>
      <div class="co-12 col-lg-6 right-section ">
        <div class="form-box mx-auto mb-5 mb-md-0 mt-5">
                <?php
                if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['msg']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

          
          <h3 class="text-white duration-font1">Login</h3>
          <h5 class="text-white form-font1">Login your account in a seconds</h5>
          <form action="" id="login-form">
            <div class="mb-3 mt-3">
              <input type="email" class="form-control" id="email" value="<?php if(isset($_COOKIE['user_email']))echo $_COOKIE['user_email']?>" placeholder="Enter email" name="email">
            </div>
            
            <div class="form-group">
              <div class=" " id="pass-field">
                <input id="pwd" type="password" class="form-control" value="<?php if(isset($_COOKIE['user_password']))echo $_COOKIE['user_password']?>" placeholder="Enter password" name="pswd">
                <span toggle="#pwd" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
            </div>
            <div class="form-check mb-3 d-flex justify-content-between align-items-center py-3">
              <label class="form-check-label text-white">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"> Keep me logged in 
              </label>
              <a href="recover-email.php" class="purple">Forgot password?</a>
            </div>
            <button class="btn btn-purple2 w-100" id="login-btn">Log in</button>
            <div class="pt-4 pb-3">
              <p class="text-white">Don’t have an account? <a href="signup.php" class="purple">Sign up</a></p>
            </div>
            <h3 class="continue-with text-center">
              <span class="form-font1">Or continue with</span>
            </h3>
            <div class="d-flex justify-content-center align-items-center mt-4 gap-4">
              <a href="google-oauth.php">
                <img src="assets/images/google.png" alt="google">
              </a>
              <a href="">
                <img src="assets/images/apple.png" alt="apple">
              </a>
            </div>
          </form>
        </div>
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
    $("#login-btn").on("click", function(e){
        e.preventDefault();
        var email = $("#email").val();
        var pwd = $("#pwd").val();
        var remember = $("#remember").is(":checked") ? 1 : 0;
        
        if(email == "" || pwd == ""){
            $(".error-message").html("All fields are required.").slideDown();
            $(".success-message").slideUp();
            setTimeout(() => {
                $(".error-message").slideUp();
            }, 3000);
        } else {
            $.ajax({
                url: "ajax-login.php",
                type: "POST",
                data: {email: email, password: pwd, remember: remember},
                success: function(data){
                    if(data == "email_not_exist"){
                        $(".error-message").html("Email does not exist.").slideDown();
                        $(".success-message").slideUp();
                        setTimeout(() => {
                            $(".error-message").slideUp();
                        }, 3000);
                    } else if(data == "invalid password or Email"){
                        $(".error-message").html("Invalid password or Email").slideDown();
                        $(".success-message").slideUp();
                        setTimeout(() => {
                            $(".error-message").slideUp();
                        }, 3000);
                    } else if(data == 1){
                        // $(".success-message").html("Login successful.").slideDown();
                        $(".error-message").slideUp();
                        // Redirect to a protected page or perform any other action
                        window.location.href = "index.php";
                    } else {
                        $(".error-message").html("An error occurred. Please try again.").slideDown();
                        $(".success-message").slideUp();
                        setTimeout(() => {
                            $(".error-message").slideUp();
                        }, 3000);
                    }
                }
            });
        }
    });
        });

    </script>

</body>
</html>
