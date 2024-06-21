<?php
include ("./db/connection.php");
session_start();
header('Content-Type: application/json');
if (isset($_POST['session_id']) && isset($_POST['user_id']) && isset($_POST['reset_time']) && isset($_POST['status'])) {
    $session_id = $_POST['session_id'];
    $user_id = $_POST['user_id'];
    $reset_time = $_POST['reset_time'];
    $status = $_POST['status'];
    // $task_name = $_POST['task_name']; 
    $stmt = $connect->prepare("UPDATE pomodoro_sessions SET end_time = ?, status = ? WHERE user_id = ? AND pomosessionid = ?");
    $stmt->bind_param("ssii", $reset_time, $status,$user_id, $session_id);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Pomodoro session reset successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid data."]);
}
$connect->close();
?>
