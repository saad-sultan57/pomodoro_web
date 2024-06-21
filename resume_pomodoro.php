<?php
include ("./db/connection.php");
session_start();
header('Content-Type: application/json');
if (isset($_POST['session_id']) && isset($_POST['user_id']) && isset($_POST['resume_time']) && isset($_POST['status'])) {
    $session_id = $_POST['session_id'];
    $user_id = $_POST['user_id'];
    $resume_time = $_POST['resume_time'];
    $status = $_POST['status'];
    $task_name = $_POST['task_name']; 

    // Prepare and bind for INSERT
    $stmt = $connect->prepare("INSERT INTO pomodoro_sessions (user_id, pomosessionid, start_time, status,task_name) VALUES (?, ?, ?, ?,?)");
    $stmt->bind_param("iisss", $user_id, $session_id, $resume_time, $status,$task_name);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Pomodoro session resumed successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid data."]);
}

$connect->close();
?>
