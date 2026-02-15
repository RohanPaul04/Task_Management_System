<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task Management System</title>
    <link rel="stylesheet" href="css/index-style.css">
</head>

<body>

    <!-- Page Header -->
    <header>
        <h1>Task Management System</h1>
    </header>

    

    <br>

    <!-- Task List Table -->
    <section>
        <!-- <?php
        $conn = mysqli_connect("localhost", "root", "", "task_management_system");
        include "filter.php";
        ?> -->

        <div class="task-header">
            <h2>Task List</h2>

            <select id="statusFilter" style="float:right;">
                <option value="All">All </option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>


        </div>


        <table border="1" cellpadding="10" cellspacing="0">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody id="taskTable">

                <?php
                //include "task-db.php";
                $conn = mysqli_connect("localhost", "root", "", "task_management_system");
                $result = mysqli_query($conn, "SELECT * FROM task_db");
                $rowCount = mysqli_num_rows($result);
                
                if ($rowCount > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['task_id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['due_date'] ?></td>
                        <td>

                            <a href='edit-task.php?task_id=<?= $row['task_id'] ?>' style='text-decoration: none;'><button
                                    title='Edit' class='btn edit-btn'><svg xmlns='http://www.w3.org/2000/svg' width='16'
                                        height='16' fill='currentColor' viewBox='0 0 16 16'>
                                        <path
                                            d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293z' />
                                        <path
                                            d='M13.752 4.396l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
                                        <path fill-rule='evenodd'
                                            d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z' />
                                    </svg>
                                </button>
                            </a>

                            <form action='delete-task.php' method='POST' onsubmit="return confirmDelete();" style='display:inline;'>
                                <input type='hidden' name='task_id' value="<?= $row['task_id'] ?>">
                                <button type='submit' title='Delete' class='btn delete-btn'><svg
                                        xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                        class='bi bi-trash3' viewBox='0 0 16 16'>
                                        <path
                                            d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5' />
                                    </svg></button>
                            </form>


                        </td>
                    </tr>
                    <?php }
                } ?>
            </tbody>
        </table>

        <!-- No Tasks Message -->
        <?php if ($rowCount == 0) { ?>
        <div class="no-tasks-message">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            <h3>No Tasks Available</h3>
            <p>You don't have any tasks yet</p>
        </div>
        <?php } ?>
    </section>

    

    <!-- Add Task Button -->
    <section class="add-task-section" id="addTaskSection">
        <a href="add-task.php">
            <button class="btn add-btn">Add New Task</button>
        </a>
    </section>

</body>

<script>
document.getElementById("statusFilter").addEventListener("change", function() {
    let status = this.value;

    if (status === "All") {
        document.getElementById("taskTable").innerHTML = `<?php
                //include "task-db.php";
                $conn = mysqli_connect("localhost", "root", "", "task_management_system");
                $result = mysqli_query($conn, "SELECT * FROM task_db");
                while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['task_id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td class="status"><?= $row['status'] ?></td>
                    <td><?= $row['due_date'] ?></td>
                    <td>

                        <a href='edit-task.php?task_id=<?= $row['task_id'] ?>' style='text-decoration: none;'><button
                                title='Edit' class='btn edit-btn'><svg xmlns='http://www.w3.org/2000/svg' width='16'
                                    height='16' fill='currentColor' viewBox='0 0 16 16'>
                                    <path
                                        d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293z' />
                                    <path
                                        d='M13.752 4.396l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
                                    <path fill-rule='evenodd'
                                        d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z' />
                                </svg>
                            </button>
                        </a>

                        <form action='delete-task.php' method='POST' onsubmit="return confirmDelete();" style='display:inline;'>
                            <input type='hidden' name='task_id' value="<?= $row['task_id'] ?>">
                            <button type='submit' title='Delete' class='btn delete-btn'><svg
                                    xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                    class='bi bi-trash3' viewBox='0 0 16 16'>
                                    <path
                                        d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5' />
                                </svg></button>
                        </form>


                    </td>
                </tr>
                <?php } ?>`
    } else if (status === "Pending") {
        document.getElementById("taskTable").innerHTML = `<?php
                $conn = mysqli_connect("localhost", "root", "", "task_management_system");
                $result = mysqli_query($conn, "SELECT * FROM task_db WHERE STATUS='pending'");
                while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['task_id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td class="status"><?= $row['status'] ?></td>
                    <td><?= $row['due_date'] ?></td>
                    <td>

                        <a href='edit-task.php?task_id=<?= $row['task_id'] ?>' style='text-decoration: none;'><button
                                title='Edit' class='btn edit-btn'><svg xmlns='http://www.w3.org/2000/svg' width='16'
                                    height='16' fill='currentColor' viewBox='0 0 16 16'>
                                    <path
                                        d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293z' />
                                    <path
                                        d='M13.752 4.396l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
                                    <path fill-rule='evenodd'
                                        d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z' />
                                </svg>
                            </button>
                        </a>

                        <form action='delete-task.php' method='POST' onsubmit="return confirmDelete();" style='display:inline;'>
                            <input type='hidden' name='task_id' value="<?= $row['task_id'] ?>">
                            <button type='submit' title='Delete' class='btn delete-btn'><svg
                                    xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                    class='bi bi-trash3' viewBox='0 0 16 16'>
                                    <path
                                        d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5' />
                                </svg></button>
                        </form>


                    </td>
                </tr>
                <?php } ?>` 
    } else if (status === "Completed") {
        document.getElementById("taskTable").innerHTML = `<?php
                //include "task-db.php";
                $conn = mysqli_connect("localhost", "root", "", "task_management_system");
                $result = mysqli_query($conn, "SELECT * FROM task_db WHERE STATUS='completed'");
                while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['task_id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td class="status"><?= $row['status'] ?></td>
                    <td><?= $row['due_date'] ?></td>
                    <td>

                        <a href='edit-task.php?task_id=<?= $row['task_id'] ?>' style='text-decoration: none;'><button
                                title='Edit' class='btn edit-btn'><svg xmlns='http://www.w3.org/2000/svg' width='16'
                                    height='16' fill='currentColor' viewBox='0 0 16 16'>
                                    <path
                                        d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293z' />
                                    <path
                                        d='M13.752 4.396l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
                                    <path fill-rule='evenodd'
                                        d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z' />
                                </svg>
                            </button>
                        </a>

                        <form action='delete-task.php' method='POST' onsubmit="return confirmDelete();" style='display:inline;'>
                            <input type='hidden' name='task_id' value="<?= $row['task_id'] ?>">
                            <button type='submit' title='Delete' class='btn delete-btn'><svg
                                    xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                    class='bi bi-trash3' viewBox='0 0 16 16'>
                                    <path
                                        d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5' />
                                </svg></button>
                        </form>


                    </td>
                </tr>
                <?php } ?>`
    }

    // Check if table is empty after filtering and show/hide message
    updateNoTasksMessage();
});

// Function to check if table is empty and show/hide the no tasks message
function updateNoTasksMessage() {
    const taskTable = document.getElementById("taskTable");
    const existingMessage = document.querySelector(".no-tasks-message");
    
    // Remove existing message if present
    if (existingMessage) {
        existingMessage.remove();
    }
    
    // Check if table is empty
    if (taskTable.innerHTML.trim() === "" || taskTable.querySelectorAll("tr").length === 0) {
        // Create and insert the no tasks message
        const noTasksDiv = document.createElement("div");
        noTasksDiv.className = "no-tasks-message";
        noTasksDiv.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            <h3>No Tasks Available</h3>
            <p>No tasks match the selected filter</p>
        `;
        
        // Insert after the table
        const table = document.querySelector("table");
        table.parentNode.insertBefore(noTasksDiv, table.nextSibling);
    }
}

// Reminder feature
 
const reminderTime = 24 * 60 * 60 * 1000; // 24 hours before deadline

function checkReminder() {
    const now = new Date().getTime();
    const timeLeft = projectDeadline - now;

    if (timeLeft > 0 && timeLeft <= reminderTime) {
        alert("⏰ Reminder: Project deadline is within 24 hours!");
    }
}

checkReminder();


function confirmDelete() {
    return confirm("Are you sure you want to delete this task?");
}


 
</script>


</html>