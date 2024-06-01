<?php
session_start();

# Check if the required information is present [not sure this code required or not]
if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['user_type'])) {
    die("<script>
            alert('The email and password you entered did not match our records. Please double-check and try again.');
            window.location.href='login.html';
        </script>");
}

include('dbconn.php'); # Include db connection

# Retrieve and sanitize POST data
$email = mysqli_real_escape_string($dbconn, $_POST['email']);
$password = mysqli_real_escape_string($dbconn, $_POST['password']);
$user_type = $_POST['user_type'];

# Define variables based on user type [admin or user]
if ($user_type == 'admin') {
    $table = "admin";
    $field1 = "adm_email";
    $field2 = "adm_fname";
    $field3 = "adm_lname";
    $field4 = "adm_password";
    $location = "adminprofile.html";
} else {
    $table = "user";
    $field1 = "user_email";
    $field2 = "user_fname";
    $field3 = "user_lname";
    $field4 = "user_password";
    $location = "userprofile.php";
}

# Check if the email exists
$sql_email_check = "SELECT * FROM $table WHERE $field1 = '$email' LIMIT 1";
$result_email_check = mysqli_query($dbconn, $sql_email_check);

# If email exists
if (mysqli_num_rows($result_email_check) == 1) {
    $data = mysqli_fetch_array($result_email_check);

    # Check if the password matches
    if ($data[$field4] === $password) {
        # Login successful, assign session variables
        $_SESSION['email'] = $email;
        $_SESSION['fname'] = $data[$field2];
        $_SESSION['lname'] = $data[$field3];
        echo "<script>
                alert('Welcome back, {$_POST['user_type']} {$_SESSION['fname']} {$_SESSION['lname']}');
                window.location.href='$location';
              </script>";
    } else {
        # Password or email is incorrect
        echo "<script>
                alert('Incorrect email or password');
                window.history.back();
            </script>";
    }
} else {
    # Email does not exist
    echo "<script>
            alert('The email and password you entered did not match our records. Please double-check and try again.');
            window.location.href='login.html';
        </script>";
}

# Close the connection between system and db
mysqli_close($dbconn);
?>
