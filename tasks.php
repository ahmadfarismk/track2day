<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.html");
    exit();
}

include('dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $tasks = array();
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'task')!== false) {
            $task_name = $_POST[$key. '-name'];
            $task_status = $_POST[$key. '-status'];
            $sql = "UPDATE tasks SET name = '$task_name', status = '$task_status' WHERE email = '{$_SESSION['email']}'";
            $conn->query($sql);
        }
    }
    header("Location: tasks.php");
    exit();
}

// Retrieve tasks for current user
$sql = "SELECT * FROM tasks WHERE email = '{$_SESSION['email']}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
} else {
    $tasks = array();
}

// Close connection
$conn->close();

// Output tasks in HTML format
echo '<table class="task-table">';
echo '<thead>';
echo '<tr>';
echo '<th>No.</th>';
echo '<th>Task Name</th>';
echo '<th>Status</th>';
echo '<th>Action</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody id="task-tbody">';

foreach ($tasks as $task) {
    echo '<tr>';
    echo '<td>'. $task['id']. '</td>';
    echo '<td><input type="text" name="task'. $task['id']. '-name" value="'. $task['name']. '"></td>';
    echo '<td>';
    echo '<select name="task'. $task['id']. '-status">';
    echo '<option value="completed" '. ($task['status'] == 'completed'? 'elected' : ''). '>Completed</option>';
    echo '<option value="not_completed" '. ($task['status'] == 'not_completed'? 'elected' : ''). '>Not Completed</option>';
    echo '<option value="pending" '. ($task['status'] == 'pending'? 'elected' : ''). '>Pending</option>';
    echo '</select>';
    echo '</td>';
    echo '<td><button type="button" onclick="deleteTask(this)">Delete</button></td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

?>