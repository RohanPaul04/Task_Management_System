<?php

$link = mysqli_connect("localhost","root","","task_management_system");
if($link===false){
        die("ERROR".mysqli_connect_error());
}

    $task_id=$_POST['task_id'];
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $status=$_POST['status'];
    $due_date=$_POST['due_date'];

    $sql="UPDATE task_db 
     SET title='$title', description='$desc', status='$status', due_date='$due_date'
     WHERE task_id='$task_id'";

    if(mysqli_query($link,$sql)){
        $url = "http://localhost/Algonive-task2/Algonive_Task_Manager/index.php"; header('Location: '. $url);
        mysqli_close($link);
    }else{
        echo "ERROR".mysqli_error($link);
        mysqli_close($link);
    }
    





?>