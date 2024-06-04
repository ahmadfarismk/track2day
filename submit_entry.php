<?php
include 'dbconn.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both week and mood fields are set
    if (isset($_POST['week']) && isset($_POST['mood'])) {
        $week = $_POST['week'];
        $mood = $_POST['mood'];

        // Perform SQL query to insert data into the database
        $query = "INSERT INTO `user_mood` (`user_email`, `mood_id`) VALUES ('$week', '$mood')";
        mysqli_query($dbconn, $query);

        // Redirect back to tools.html or do something else
        header("Location: tools.html");
        exit();
    } else {
        echo "<p>Please fill in all fields.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>
