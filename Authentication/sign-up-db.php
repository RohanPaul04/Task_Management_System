<?php

    $link= mysqli_connect("localhost", "root", "", "task_management_system");
    if($link===false){
        die("ERROR".mysqli_connect_error());
    }
    
    $full_name=$_POST['full_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    $role=$_POST['role'];

    $sql="INSERT INTO users (full_name,email,password,confirm,role) VALUES ('$full_name','$email','$password','$confirm','$role')";

    if(mysqli_query($link,$sql)){
        $url = "http://localhost/Algonive-task2/Authentication/sign-in.php"; header('Location: '. $url);
        mysqli_close($link);
    }else{
        echo "ERROR".mysqli_error($link);
        mysqli_close($link);
     
    }
    





?>