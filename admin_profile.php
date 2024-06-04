<?php
// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "track2daydb";

// Create connection
$dbconn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}

// Check if the admin is logged in
if (!isset($_SESSION['adm_email'])) {
    // If not logged in, redirect to login page
    header("Location: login.html");
    exit(); // Stop further execution
}

// Fetch admin details based on session variable
$admin_email = $_SESSION['adm_email']; // Example email, dynamically fetch based on logged-in admin
$admin_sql = "SELECT * FROM admin WHERE adm_email='$admin_email'";
$admin_result = $dbconn->query($admin_sql);
$admin = $admin_result->fetch_assoc();

// Fetch users associated with this admin
$user_sql = "SELECT * FROM user WHERE adm_email='" . $admin['adm_email'] . "'";
$user_result = $dbconn->query($user_sql);

// Fetch therapists (assuming therapists are in the user table and have a specific role)
$therapist_sql = "SELECT * FROM admin"; // This query might need to be adjusted based on your database structure
$therapist_result = $dbconn->query($therapist_sql);

// Close the database connection
$dbconn->close();

// Include the view file to display the admin profile
include 'admin_profile_view.php';
?>
