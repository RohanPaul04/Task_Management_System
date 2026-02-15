<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
    <link rel="stylesheet" href="css/add-task-style.css">
</head>

<body onload="generateTaskId()">

    <!-- Page Header -->
    <header>
        <h1>Add New Task</h1>
    </header>

    <!-- Task Form -->
    <section>
        <form action="task-db.php" method="POST">

            <input type="hidden" id="taskId" name="task_id" ><br>

            <label>Task Title:</label>
            <input type="text" placeholder="Enter task title" name="title" required><br>

            <label>Task Description:</label>
            <textarea placeholder="Enter task description" name="desc" required></textarea><br>

            <label>Status:</label>
            <select name="status">
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select><br>

            <label>Due Date:</label>
            <input type="date" name="due_date" required><br>

             <button type="submit">Save</button>
            &nbsp;
            <a href="index.php" style="text-decoration: none;">
                <button type="button">Cancel</button>
            </a>
    
        </form>
    </section>

</body>
<script>
    function generateTaskId() {
        const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const prefix =
            letters.charAt(Math.floor(Math.random() * 26)) +
            letters.charAt(Math.floor(Math.random() * 26));

        const number = Math.floor(10000000 + Math.random() * 90000000);

        const taskId = prefix + number;

        document.getElementById("taskId").value = taskId;
    }
</script>

</html>