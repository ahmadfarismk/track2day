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
    $adm_fname = mysqli_real_escape_string($dbconn, $_POST['first-name']);
    $adm_lname = mysqli_real_escape_string($dbconn, $_POST['last-name']);

    $update_fields = array(); // Array to store fields to be updated

    // Check which fields are updated and add them to the update_fields array
    if (!empty($adm_fname)) {
        $update_fields[] = "adm_fname = '$adm_fname'";
    }
    if (!empty($adm_lname)) {
        $update_fields[] = "adm_lname = '$adm_lname'";
    }

    // If there are fields to update
    if (!empty($update_fields)) {
        // Uupdate only the updated fields
        $update_sql = "UPDATE admin SET " . implode(", ", $update_fields) . " WHERE adm_email = '$adm_email'";
        
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
            window.location.href = 'adminprofile.php';
          </script>";

    mysqli_close($dbconn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Edit Profile</h1>
        <form action="admineditprofile.php" method="post">
            <label for="first-name">First Name:</label>
            <input type="text" id="first-name" name="first-name" required>
            <label for="last-name">Last Name:</label>
            <input type="text" id="last-name" name="last-name" required>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
