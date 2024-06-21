<?php
include ("./db/connection.php");
session_start()
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div class="container-fluid d-flex align-items-center justify-content-center h-full">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 p-5 border">
               
                    <div class="form-box">

                    <?php

if (isset($_POST['btn-submit'])) {
    if (isset($_GET['token'])) {
        $token = mysqli_real_escape_string($connect, $_GET['token']);  // Added escaping for security
        $pass = mysqli_real_escape_string($connect, $_POST['pass']);
        $cpass = mysqli_real_escape_string($connect, $_POST['cpass']);

        // Check if both fields are empty
        if (empty($pass) || empty($cpass)) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Both fields are required
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        } else {
            // Check if token exists in the database
            $token_check_query = "SELECT * FROM users WHERE token='{$token}'";
            $token_check_result = mysqli_query($connect, $token_check_query);

            if (mysqli_num_rows($token_check_result) > 0) {
                // Proceed with password hash and update
                $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

                if ($pass == $cpass) {
                    $q1 = "UPDATE users SET password='{$hashed_password}' WHERE token='{$token}'";
                    $res1 = mysqli_query($connect, $q1);

                    if ($res1) {
                        // Clear the token after updating the password
                        $q2 = "UPDATE users SET token='' WHERE token='{$token}'";
                        $res2 = mysqli_query($connect, $q2);

                        if ($res2) {
                            $_SESSION['msg'] = "Password Updated Successfully. Now Login";
                            header("location: http://localhost/pomodoro/login.php");
                        } else {
                            $_SESSION['p_update'] = "Password Updated but token not cleared";
                            header("location: http://localhost/pomodoro/changepassword.php");
                        }
                    } else {
                        $_SESSION['p_update'] = "Password Not Updated Successfully";
                        header("location: http://localhost/pomodoro/changepassword.php");
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Passwords do not match
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Token not matched
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                No Token Found
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}

?>



                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label text-white">New Password</label>
                                <input type="password" class="form-control" id="pass" placeholder="New password" name="pass">
                                <p id="pmsg"></p>
                            </div>
                            <div class="mb-3 mt-3">
                               <label for="cpass" class="form-label text-white">Confirm Password:</label>
                                <input type="password" class="form-control" id="cpass" placeholder="Confirm password" name="cpass">
                                <p id="cerror"></p>
                            </div>
                            <button type="submit" name="btn-submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



  

  <!-- Javascript Files -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>