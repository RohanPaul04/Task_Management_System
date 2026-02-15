<?php

    $link=mysqli_connect("localhost","root","","task_management_system");
    if($link===false){
        die("ERROR".mysqli_connect_error());
    }

    $id=$_POST['task_id'];

    $query="DELETE FROM task_db WHERE task_id = '$id'";

    if(mysqli_query($link,$query)){
        $url = "http://localhost/Algonive-task2/Algonive_Task_Manager/index.php"; header('Location: '. $url);
        mysqli_close($link);
    }else{
        echo "ERROR".mysqli_error($link);
        mysqli_close($link); 
    }


?>