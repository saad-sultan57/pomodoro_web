<?php
include_once ("./db/connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
// Set content type to JSON
header('Content-Type: application/json');

$response = array('status' => '', 'message' => '');

// Continue with user registration
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$message = $_POST["message"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO contact_form(first_name, last_name, email, password, message) VALUES ('$first_name','$last_name','$email','$hashed_password','$message')";

if (mysqli_query($connect, $sql)) {
    // Import PHPMailer classes into the global namespace
  

    // Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                        // Disable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $_ENV['MAIL_USERNAME'];                 // SMTP username
        $mail->Password   = $_ENV['MAIL_PASSWORD'];                 // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
        $mail->Port       = 465;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom($_ENV['MAIL_USERNAME'], 'Contact Form');
        $mail->addAddress($_ENV['MAIL_USERNAME'], 'saad');       // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<html>
        <head>
            <style>
                .container {
                    font-family: Arial, sans-serif;
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    border: 1px solid #ddd;
                    border-radius: 10px;
                    background-color: #f9f9f9;
                }
                .header {
                    text-align: center;
                    padding: 10px 0;
                    border-bottom: 1px solid #ddd;
                }
                .header h1 {
                    margin: 0;
                    color: #333;
                }
                .content {
                    padding: 20px 0;
                }
                .content p {
                    margin: 10px 0;
                    color: #555;
                }
                .footer {
                    text-align: center;
                    padding: 10px 0;
                    border-top: 1px solid #ddd;
                    margin-top: 20px;
                    color: #999;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>New Contact Form Submission</h1>
                </div>
                <div class='content'>
                    <p><strong>First Name:</strong> $first_name</p>
                    <p><strong>Last Name:</strong> $last_name</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Message:</strong> $message</p>
                </div>
                <div class='footer'>
                    <p>Thank you for your submission!</p>
                </div>
            </div>
        </body>

        </html>
        ";

        $mail->send();
        $response['status'] = 'success';
        $response['message'] = 'Thanks for contacting';
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = "Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Cannot save record.';
}

echo json_encode($response);

?>
