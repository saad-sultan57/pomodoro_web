<?php


include_once ("./db/connection.php");


$email = $_POST["email"];
$password = $_POST["password"];
$remember = $_POST["remember"];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row["password"];
    $first_name = $row["first_name"];
    $user_id=$row['id'];
    if(password_verify($password, $hashed_password)) {
        if($remember == 1) {
            setcookie("user_email", $email, time() + (86400 * 30), "/"); // 30 days
            setcookie("user_password", $password, time() + (86400 * 30), "/"); // 30 days
        }
        session_start();
        $_SESSION["user_login"] = $email;
        $_SESSION["username"] = $first_name;
        $_SESSION["user_id"] = $user_id;

        echo 1;
    } else {
        echo "invalid password or Email";
    }
} else {
    echo "email_not_exist";
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>
