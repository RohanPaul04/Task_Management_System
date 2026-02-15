<?php
$conn = mysqli_connect("localhost", "root", "", "task_management_system");

$status = $_GET['status'] ?? "";

// build query
if ($status != "") {
    $query = "SELECT * FROM task_db WHERE status='$status'";
} else {
    $query = "SELECT * FROM task_db";
}

$result = mysqli_query($conn, $query);

// output ONLY table rows
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['task_id']}</td>
            <td>{$row['title']}</td>
            <td>{$row['description']}</td>
            <td>{$row['status']}</td>
            <td>
                <a href='edit-task.php?id={$row['task_id']}'>Edit</a> |
                <a href='delete-task.php?id={$row['task_id']}'
                   onclick='return confirm(\"Are you sure?\")'>
                   Delete
                </a>
            </td>
        </tr>";
    }
} else {
    echo "<tr>
        <td colspan='5' style='text-align:center;'>No tasks found</td>
    </tr>";
}
?>
