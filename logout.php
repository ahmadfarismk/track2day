<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logout-container">
        <?php
        session_start();

        if (isset($_POST['logout'])) {
            // Clear all session variables
            session_unset();
            // Destroy the session
            session_destroy();
            // Redirect to the login page or any other page
            header("Location: login.html");
            exit();
        }
        ?>

        <h1>Are you sure you want to log out?</h1>
        <div class="logout-actions">
            <form method="post">
                <button type="submit" name="logout">Yes, Logout</button>
            </form>
            <button onclick="cancelLogout()">Cancel</button>
        </div>
    </div>

    <script>
        function cancelLogout() {
            window.location.href = "userprofile.php";
        }
    </script>
</body>
</html>