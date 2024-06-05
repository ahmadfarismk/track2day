<?php
include('dbconn.php');
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

$user_email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set and not empty
    if (!empty($_POST['task_name']) && !empty($_POST['task_duration']) && !empty($_POST['task_desc']) && !empty($_POST['task_status'])) {
        $taskName = $_POST['task_name'];
        $taskDuration = $_POST['task_duration'];
        $taskDesc = $_POST['task_desc'];
        $taskStatus = $_POST['task_status'];
        
        // Prepare the insert statement
        $stmt = $dbconn->prepare("INSERT INTO task (task_name, task_duration, task_desc, task_status, user_email) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $taskName, $taskDuration, $taskDesc, $taskStatus, $user_email);
        
        if ($stmt->execute()) {
            echo "<script>
                alert('The task has been added!');
                location.href = 'tasks.php';
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error: All form fields are required.";
    }
    
    $dbconn->close();
} else {
    echo "Error: Invalid request method.";
}
?>
