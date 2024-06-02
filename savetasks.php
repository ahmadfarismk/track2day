<?php
include('dbconn.php');
session_start();
$user_email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Check if the form fields are set and not empty
    if (isset($_POST['task_name']) && isset($_POST['task_duration']) && isset($_POST['task_desc']) && isset($_POST['task_status'])) {
        $taskNames = $_POST['task_name'];
        $taskDurations = $_POST['task_duration'];
        $taskDescs = $_POST['task_desc'];
        $taskStatuses = $_POST['task_status'];
        $task_id = "SELECT task_id from task where user_email= $user_email";

        // Loop through the tasks array to insert each task into the database
        foreach ($taskNames as $index => $taskName) {
            $taskDuration = $taskDurations[$index];
            $taskDesc = $taskDescs[$index];
            $taskStatus = $taskStatuses[$index];

            // if (isset($_POST['delete'])) 
            // {
            //     $sqlSel = "SELECT * FROM task WHERE task_id= '$task_id'";

            //     $sqlDelete = "DELETE FROM task WHERE task_id = '" . $task_id . "'  ";
            //     echo"<br>";
            //     echo $sqlDelete;
            //     mysqli_query($dbconn, $sqlDelete) or die ("Error: " . mysqli_error($dbconn));
            // }

                
            

            

            // Perform the insert query
            $sql = "INSERT INTO task (task_name, task_duration, task_desc, task_status, user_email) 
                    VALUES ('$taskName', '$taskDuration', '$taskDesc', '$taskStatus', '$user_email')";

            if ($dbconn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $dbconn->error;
            }
        }
        echo "<script>
        alert('The task has been added!');
        window.history.back();
        </script>";
    } else {
        echo "Error: All form fields are required.";
    }

    mysqli_close($dbconn);
}
else {
    echo "Error: Invalid request method.";
}

?>
