<?php
include 'dbconn.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both week, mood, and user_email fields are set
    if (isset($_POST['week']) && isset($_POST['mood']) && isset($_POST['user_email'])) {
        $week = $_POST['week'];
        $mood = $_POST['mood'];
        $user_email = $_POST['user_email'];

        // Perform SQL query to insert data into the database
        $query = "INSERT INTO `user_mood` (`week`, `user_email`, `mood_id`) VALUES ('$week', '$user_email', '$mood')";
        if (mysqli_query($dbconn, $query)) {
            // Redirect back to tools.html or do something else
            header("Location: tools.html");
            exit();
        } else {
            echo "<p>Database error: " . mysqli_error($dbconn) . "</p>";
        }
    } else {
        echo "<p>Please fill in all fields.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>
