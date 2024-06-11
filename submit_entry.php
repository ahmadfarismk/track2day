<?php
include 'dbconn.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are set
    if (isset($_POST['week']) && isset($_POST['mood']) && isset($_POST['user_email'])) {
        $week = $_POST['week'];
        $mood = $_POST['mood'];
        $user_email = $_POST['user_email'];

        // Perform SQL query to insert data into the database
        $query = "INSERT INTO `user_mood` (`week`, `user_email`, `mood_id`) VALUES ('$week', '$user_email', '$mood')";
        if (mysqli_query($dbconn, $query)) {
            header("Location: tools.php");
            exit();
        } else {
            echo "<p>Database error: " . mysqli_error($dbconn) . "</p>";
        }
    } else {
        echo '<p>Mood has been logged-in. <a href="tools.php">Go Back To Tools</a></p>';
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>
