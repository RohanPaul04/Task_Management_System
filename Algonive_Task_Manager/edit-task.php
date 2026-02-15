<?php

$link = mysqli_connect("localhost","root","","task_management_system");
if($link===false){
        die("ERROR".mysqli_connect_error());
}
$id = $_GET['task_id'];
$result = mysqli_query($link, "SELECT * FROM task_db WHERE task_id='$id'");
 $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <link rel="stylesheet" href="css/add-task-style.css">
</head>

<body>

    <!-- Page Header -->
    <header>
        <h1>Edit Task</h1>
    </header>

    <!-- Task Form -->
    <section>
        <form action="edit-db.php" method="POST">



            <input type="hidden" id="taskId" name="task_id" value="<?= $row['task_id'] ?>"><br>

            <label>Task Title:</label>
            <input type="text" placeholder="Enter task title" name="title" value="<?= $row['title'] ?>" required><br>

            <label>Task Description:</label>
            <textarea placeholder="Enter task description" name="desc"
                required><?= $row['description'] ?></textarea><br>

            <label>Status:</label>
            <select name="status">
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select><br>

            <label>Due Date:</label>
            <input type="date" name="due_date" value="<?= $row['due_date'] ?>" required><br>



            <button type="submit">Save</button>
            &nbsp;
            <a href="index.php" style="text-decoration: none;">
                <button type="button">Cancel</button>
            </a>

        </form>
    </section>

</body>

</html>