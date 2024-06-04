<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.html");
    exit();
}

include('dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adm_email = $_SESSION['email'];
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
    $sql = "SELECT adm_password FROM admin WHERE adm_email = '$adm_email'";
    $result = mysqli_query($dbconn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['adm_password'];

        // Check if the current password matches
        if ($stored_password !== $current_password) {
            echo "<script>
                    alert('Current password is incorrect.');
                    window.history.back();
                  </script>";
            exit();
        }

        // Update the password in the database
        $update_sql = "UPDATE admin SET adm_password = '$new_password' WHERE adm_email = '$adm_email'";
        if (mysqli_query($dbconn, $update_sql)) {
            echo "<script>
                    alert('Password changed successfully.');
                    window.location.href = 'adminprofile.php';
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Change Password</h1>
        <form action="adminchangepassword.php" method="post">
            <label for="current-password">Current Password:</label>
            <input type="password" id="current-password" name="current-password" required>
            <label for="new-password">New Password:</label>
            <input type="password" id="new-password" name="new-password" required>
            <label for="confirm-password">Confirm New Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            <button type="submit">Change Password</button>
        </form>
    </div>
</body>
</html>