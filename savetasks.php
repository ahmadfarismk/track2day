<?php
include('dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set and not empty
    if (isset($_POST['task_name']) && isset($_POST['task_duration']) && isset($_POST['task_desc']) && isset($_POST['task_status'])) {
        $taskNames = $_POST['task_name'];
        $taskDurations = $_POST['task_duration'];
        $taskDescs = $_POST['task_desc'];
        $taskStatuses = $_POST['task_status'];

        // Loop through the tasks array to insert each task into the database
        foreach ($taskNames as $index => $taskName) {
            $taskDuration = $taskDurations[$index];
            $taskDesc = $taskDescs[$index];
            $taskStatus = $taskStatuses[$index];

            // Perform the insert query
            $sql = "INSERT INTO task (task_name, task_duration, task_desc, task_status, user_email) 
                    VALUES ('$taskName', '$taskDuration', '$taskDesc', '$taskStatus', '$user_email')";

            if ($dbconn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $dbconn->error;
            }
        }
    } else {
        echo "Error: All form fields are required.";
    }

    mysqli_close($dbconn);
} else {
    echo "Error: Invalid request method.";
}
?>
