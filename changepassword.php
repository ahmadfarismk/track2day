<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.html");
    exit();
}

include('dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_SESSION['email'];
    $current_password = mysqli_real_escape_string($dbconn, $_POST['current-password']);
    $new_password = mysqli_real_escape_string($dbconn, $_POST['new-password']);
    $confirm_password = mysqli_real_escape_string($dbconn, $_POST['confirm-password']);

    // Check if the new password and confirm password match
    if ($new_password !== $confirm_password) {
        echo "<script>
                alert('New password and confirm password do not match.');
                window.history.back();
              </script>";
        exit();
    }

    // Fetch the current password from the database
    $sql = "SELECT user_password FROM user WHERE user_email = '$user_email'";
    $result = mysqli_query($dbconn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['user_password'];

        // Check if the current password matches
        if ($stored_password !== $current_password) {
            echo "<script>
                    alert('Current password is incorrect.');
                    window.history.back();
                  </script>";
            exit();
        }

        // Update the password in the database
        $update_sql = "UPDATE user SET user_password = '$new_password' WHERE user_email = '$user_email'";
        if (mysqli_query($dbconn, $update_sql)) {
            echo "<script>
                    alert('Password changed successfully.');
                    window.location.href = 'userprofile.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error updating password.');
                    window.history.back();
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error fetching user data.');
                window.history.back();
              </script>";
    }
    
    mysqli_close($dbconn);
}
?>
