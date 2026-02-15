<?php
session_start();

$link = mysqli_connect("localhost", "root", "", "task_management_system");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, $_POST['password']);

$result = mysqli_query($link, "SELECT * FROM users WHERE email='$email' AND password='$password'");
$rowCount = mysqli_num_rows($result);
                
if ($rowCount > 0) {
    $url = "http://localhost/Algonive-task2/Algonive_Task_Manager/index.php"; 
    header('Location: '. $url);
    mysqli_close($link);
    exit();
} else {
    $_SESSION['error'] = "Invalid email or password.";
    header('Location: sign-in.php');
    mysqli_close($link);
    exit();
}  
?>