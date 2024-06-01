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
    $user_fname = mysqli_real_escape_string($dbconn, $_POST['first-name']);
    $user_lname = mysqli_real_escape_string($dbconn, $_POST['last-name']);

    $update_fields = array(); // Array to store fields to be updated

    // Check which fields are updated and add them to the update_fields array
    if (!empty($user_fname)) {
        $update_fields[] = "user_fname = '$user_fname'";
    }
    if (!empty($user_lname)) {
        $update_fields[] = "user_lname = '$user_lname'";
    }
    if (!empty($user_lname)) {
        $update_fields[] = "user_email = '$user_email'";
    }

    // If there are fields to update
    if (!empty($update_fields)) {
        // Uupdate only the updated fields
        $update_sql = "UPDATE user SET " . implode(", ", $update_fields) . " WHERE user_email = '$user_email'";
        
        if (mysqli_query($dbconn, $update_sql)) {
            $message = "Profile updated successfully.";
        } else {
            $message = "Error updating profile.";
        }
    } else {
        $message = "No changes were made.";
    }

    // Display pop up message
    echo "<script>
            alert('$message');
            window.location.href = 'userprofile.php';
          </script>";

    mysqli_close($dbconn);
}
?>
