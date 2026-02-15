<?php

    $link= mysqli_connect("localhost", "root", "", "task_management_system");
    if($link===false){
        die("ERROR".mysqli_connect_error());
    }
    
    $task_id=$_POST['task_id'];
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $status=$_POST['status'];
    $due_date=$_POST['due_date'];

    $sql="INSERT INTO task_db (task_id,title,description,status,due_date) VALUES ('$task_id','$title','$desc','$status','$due_date')";

    if(mysqli_query($link,$sql)){
        $url = "http://localhost/Algonive-task2/Algonive_Task_Manager/index.php"; header('Location: '. $url);
        mysqli_close($link);
    }else{
        echo "ERROR".mysqli_error($link);
        mysqli_close($link);
    
    }
    





?>