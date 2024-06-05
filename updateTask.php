<?php
include('dbconn.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

// Get task details from POST request
$task_id = isset($_POST['task_id']) ? intval($_POST['task_id']) : 0;
$task_name = isset($_POST['task_name']) ? mysqli_real_escape_string($dbconn, $_POST['task_name']) : '';
$task_duration = isset($_POST['task_duration']) ? mysqli_real_escape_string($dbconn, $_POST['task_duration']) : '';
$task_desc = isset($_POST['task_desc']) ? mysqli_real_escape_string($dbconn, $_POST['task_desc']) : '';
$task_status = isset($_POST['task_status']) ? mysqli_real_escape_string($dbconn, $_POST['task_status']) : '';

// Update task details in the database
$sql_update = "UPDATE task SET task_name='$task_name', task_duration='$task_duration', task_desc='$task_desc', task_status='$task_status' WHERE task_id=$task_id AND user_email='".$_SESSION['email']."'";

if (mysqli_query($dbconn, $sql_update)) {
    echo "<script>
    alert('The task has been updated!');
    window.history.back();
    </script>";
    
} else {
    echo "Error updating record: " . mysqli_error($dbconn);
}
header("Location: tasks.php");
?>
