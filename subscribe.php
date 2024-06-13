<?php
include('dbconn.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
include('dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_SESSION['email'];
    
    // Update the user_type to 'premium' in the database
    $query = "UPDATE user SET user_type='premium' WHERE user_email='$user_email'";
    $_SESSION['user_type'] = 'premium';

        
    if (mysqli_query($dbconn, $query)) {
        $message = "Welcome to Premium!";
    } else {
        $message = "Error upgrading to Premium: " . mysqli_error($dbconn);
    }
    echo $message;
    // Display pop up message
    die("<script>
            alert('$message');
            window.location.href = 'userprofile.php';
          </script>");

    mysqli_close($dbconn);
}
?>