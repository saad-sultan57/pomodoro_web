<?php
include_once "./db/connection.php";
session_start();

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Check if the token exists in the database
    $token_check_query = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $token_check_result = mysqli_query($connect, $token_check_query);
    
    if (mysqli_num_rows($token_check_result) > 0) {
        // Token exists, proceed with activation
        $q = "UPDATE users SET status='active', token='' WHERE token='$token'";
        $res = mysqli_query($connect, $q);
        
        if ($res) {
            $_SESSION['msg'] = "Account activated successfully!";
            header("Location: http://localhost/pomodoro/login.php");
            exit(); // Ensure no further code is executed after redirect
        } else {
            $_SESSION['msg'] = "Error activating account!";
            header("Location: http://localhost/pomodoro/login.php");
            exit(); // Ensure no further code is executed after redirect
        }
    } else {
        // Token does not exist
        $_SESSION['msg'] = "Invalid token!";
        header("Location: http://localhost/pomodoro/login.php");
        exit(); // Ensure no further code is executed after redirect
    }
} else {
    // No token provided
    $_SESSION['msg'] = "No token provided!";
    header("Location: http://localhost/pomodoro/login.php");
    exit(); // Ensure no further code is executed after redirect
}
?>
