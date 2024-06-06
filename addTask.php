<?php
include('dbconn.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
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
            <h1>Add New Task</h1>
            <form action="saveTasks.php" method="POST">
                <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
                <div>
                    <label for="task_name">Task Name:</label>
                    <input type="text" id="task_name" name="task_name" required>
                </div>
                <div>
                    <label for="task_duration">Task Due:</label>
                    <input type="date" id="task_duration" name="task_duration" required>
                </div>
                <div>
                    <label for="task_desc">Task Description:</label>
                    <input type="text" id="task_desc" name="task_desc" required>
                </div>
                <div>
                    <label for="task_status">Status:</label>
                    <select id="task_status" name="task_status" required>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <button type="submit" name="Add new task">Add Task</button>
            </form>
        </div>
    </main>
</body>
</html>
