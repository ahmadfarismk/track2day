<?php
// Database connection setup
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "track2daydb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch admin details
$admin_email = 'auni@gmail.com'; // Example email, dynamically fetch based on logged-in admin
$admin_sql = "SELECT * FROM admin WHERE adm_email='$admin_email'";
$admin_result = $conn->query($admin_sql);
$admin = $admin_result->fetch_assoc();

// Fetch users
$user_sql = "SELECT * FROM user";
$user_result = $conn->query($user_sql);

// Fetch therapists (assuming therapists are in the user table and have a specific role)
$therapist_sql = "SELECT * FROM user WHERE user_email IN (SELECT user_email FROM user_mood WHERE mood_id = 'M005')"; // Example condition
$therapist_result = $conn->query($therapist_sql);

$conn->close();

// Pass data to the view
include 'admin_profile_view.php';
?>
