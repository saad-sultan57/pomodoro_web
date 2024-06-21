<?php
include ("./db/connection.php");
session_start();
header('Content-Type: application/json');

if (isset($_POST['userid']) && isset($_POST['pomosessionid']) && isset($_POST['start_time']) && isset($_POST['status'])) {
    $user_id = $_POST['userid'];
    $pomosessionid = $_POST['pomosessionid'];
    $start_time = $_POST['start_time'];
    $status = $_POST['status'];
    $task_name = $_POST['task_name']; 

    $stmt = $connect->prepare("INSERT INTO pomodoro_sessions (user_id, pomosessionid, start_time, status,task_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $user_id, $pomosessionid, $start_time, $status,$task_name);
    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Pomodoro session started successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid data."]);
}
print_r($_SESSION);

$connect->close();
?>
