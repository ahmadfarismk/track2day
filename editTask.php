<?php
include('dbconn.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

// Get task ID from query parameter
$task_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch task details
$sql_task = "SELECT * FROM task WHERE task_id = $task_id AND user_email = '".$_SESSION['email']."'";
$result_task = mysqli_query($dbconn, $sql_task);
if ($result_task && mysqli_num_rows($result_task) == 1) {
    $task = mysqli_fetch_assoc($result_task);
} else {
    // Handle case where task is not found or user is not authorized
    echo "Task not found or you do not have permission to edit this task.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Edit Task</title>
    <link rel="icon" type="image/x-icon" href="track2daylogo.jpg">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <main>
        <div class="tasks-container">
            <h1>Edit Task</h1>
            <form action="updateTask.php" method="POST">
                <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
                <div>
                    <label for="task_name">Task Name:</label>
                    <input type="text" id="task_name" name="task_name" value="<?php echo htmlspecialchars($task['task_name']); ?>">
                </div>
                <div>
                    <label for="task_duration">Task Due:</label>
                    <input type="date" id="task_duration" name="task_duration" value="<?php echo htmlspecialchars($task['task_duration']); ?>">
                </div>
                <div>
                    <label for="task_desc">Task Description:</label>
                    <input type="text" id="task_desc" name="task_desc" value="<?php echo htmlspecialchars($task['task_desc']); ?>">
                </div>
                <div>
                    <label for="task_status">Status:</label>
                    <select id="task_status" name="task_status">
                        <option value="pending" <?php echo ($task['task_status'] == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="completed" <?php echo ($task['task_status'] == 'completed' ? 'selected' : ''); ?>>Completed</option>
                    </select>
                </div>
                <button type="submit" name="update">Update Task</button>
            </form>
        </div>
    </main>
</body>
</html>
