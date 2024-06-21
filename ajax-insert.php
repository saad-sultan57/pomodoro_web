<?php
include_once("./db/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\S;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
require 'vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Check if the email already exists
$email = $_POST["email"];
$email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$email_check_result = mysqli_query($connect, $email_check_query);

if (mysqli_num_rows($email_check_result) > 0) {
    echo "email_exists";
} else {
    // Continue with user registration
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember = $_POST["remember"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(15)); // Generate a unique token

    $sql = "INSERT INTO users(first_name, last_name, email, password, agree_terms, status, token) VALUES ('$first_name','$last_name','$email','$hashed_password','$remember','inactive','$token')";

    if (mysqli_query($connect, $sql)) {
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->SMTPDebug = 0;                                       // Disable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $_ENV['MAIL_USERNAME'];                 // SMTP username
            $mail->Password   = $_ENV['MAIL_PASSWORD'];                 // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
            $mail->Port       = 465;                                    // TCP port to connect to

            // Recipients
            $mail->setFrom($_ENV['MAIL_USERNAME'], 'Pomodoro');
            $mail->addAddress($email, $first_name);                     // Add a recipient

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Account Activation';
            $mail->Body = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Account Activation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .button {
            background-color: #4CAF50;
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            border: #4CAF50;
            color: white !important;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
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
    <div class='container'>
        <div class='header'>
            <h1>Account Activation</h1>
        </div>
        <div class='content'>
            <p>Hi $first_name,</p>
            <p>Thank you for registering with us. Please click the button below to activate your account:</p>
            <p><a href='http://localhost/pomodoro/activate.php?token=$token' class='button'>Activate Account</a></p>
            <p>If you did not register, please ignore this email.</p>
        </div>
        <div class='footer'>
            <p>&copy; " . date('Y') . " Your Website Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
";


            $mail->send();
            echo 'success';
        } catch (Exception $e) {
            echo "error";
        }
    } else {
        echo "error";
    }
}
?>
