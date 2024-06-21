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
                <div class="col-md-5 p-5 border" style="border-radius:20px">
                    <div class="form-box" >


                    <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (ensure the path is correct)
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['btn-submit'])) {
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = mysqli_real_escape_string($connect, $_POST['email']);

        $q = "SELECT * FROM users WHERE email='{$email}'";
        $res = mysqli_query($connect, $q) or die("Username Select Query Failed");

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $name = $row['first_name'];
            $token = bin2hex(random_bytes(15));

            // Update the token in the database
            $update_query = "UPDATE users SET token='{$token}' WHERE email='{$email}'";
            $update_res = mysqli_query($connect, $update_query) or die("Token Update Query Failed");

            $subject = "Password Reset";
            $message = "<!DOCTYPE html>
                        <html>
                        <head>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    margin: 0;
                                    padding: 0;
                                    background-color: #f4f4f4;
                                }
                                .email-container {
                                    max-width: 600px;
                                    margin: auto;
                                    background-color: #ffffff;
                                    padding: 20px;
                                    border: 1px solid #dddddd;
                                }
                                .header {
                                    background-color: #4CAF50;
                                    color: white;
                                    text-align: center;
                                    padding: 10px 0;
                                }
                                .content {
                                    margin: 20px 0;
                                }
                                .button {
                                    background-color: #4CAF50;
                                    color: white;
                                    padding: 10px 20px;
                                    text-align: center;
                                    display: inline-block;
                                    text-decoration: none;
                                    border-radius: 5px;
                                    color:white !important;
                                }
          
                                .footer {
                                    text-align: center;
                                    color: #777777;
                                    font-size: 12px;
                                    margin-top: 20px;
                                }
                            </style>
                        </head>
                        <body>
                            <div class=\"email-container\">
                                <div class=\"header\">
                                    <h1>Password Reset</h1>
                                </div>
                                <div class=\"content\">
                                    <p>Hi $name,</p>
                                    <p>Click the button below to reset your password:</p>
                                    <p><a href=\"http://localhost/pomodoro/changepassword.php?token=$token\" class=\"button\">Reset Password</a></p>
                                </div>
                                <div class=\"footer\">
                                    <p>If you did not request a password reset, please ignore this email.</p>
                                </div>
                            </div>
                        </body>
                        </html>";

            try {
                // Server settings
                $mail->SMTPDebug = 0;  // Disable verbose debug output for production
                $mail->isSMTP();                                      // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                 // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                             // Enable SMTP authentication
                $mail->Username   = $_ENV['MAIL_USERNAME'];           // SMTP username
               $mail->Password   = $_ENV['MAIL_PASSWORD'];               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      // Enable implicit TLS encryption
                $mail->Port       = 465;                              // TCP port to connect to

                // Recipients
                $mail->setFrom($_ENV['MAIL_USERNAME'], 'Contact Form');
                $mail->addAddress($email, $name);                    // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();
                $_SESSION['msg'] = "Check your email {$email} to reset your password";
                header("Location: http://localhost/pomodoro/login.php");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Email Not Found
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email field is empty
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}
?>



                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label text-white">Recover Your Account:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                <p id="emsg"></p>
                            </div>
                            <button type="submit" name="btn-submit" class="btn btn-purple  w-100" >Send Mail</button>
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