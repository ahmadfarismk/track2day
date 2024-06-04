<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['email'])) {
    echo "Unauthorized access";
    exit();
}

// Check if the request method is POST and the user_email parameter is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_email'])) {
    include('dbconn.php');

    $user_email = $_POST['user_email'];

    // Constructing the delete query
    $delete_query = "DELETE FROM user WHERE user_email = '$user_email'"; 

    // Executing the delete query
    if (mysqli_query($dbconn, $delete_query)) {
        echo "<script>alert('User deleted successfully.');
        window.location.href='adminprofile.php';</script>";
    } else {
        echo "<script>alert('Error deleting user.');
        window.location.href='adminprofile.php';</script>";
    }

    mysqli_close($dbconn);
} else {
    echo "Invalid request";
}
?>