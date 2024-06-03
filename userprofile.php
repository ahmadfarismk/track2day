<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.html");
    exit();
}

include('dbconn.php');

$user_email = $_SESSION['email'];

// User profile container
// Fetch user information from the database
$sql = "SELECT * FROM user WHERE user_email = '$user_email'";
$result = mysqli_query($dbconn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_fname = $row['user_fname'];
    $user_lname = $row['user_lname'];
} else {
    // Error if user data is not found
    echo "Error: User data not found.";
    exit();
}

// Progress box
// Fetch the count of completed tasks for the user
$sql_completed_tasks = "SELECT COUNT(*) AS completed_tasks FROM task WHERE user_email = '$user_email' AND task_status = 'completed'";
$result_completed_tasks = mysqli_query($dbconn, $sql_completed_tasks);

if ($result_completed_tasks && mysqli_num_rows($result_completed_tasks) > 0) {
    $row_completed_tasks = mysqli_fetch_assoc($result_completed_tasks);
    $completed_tasks = $row_completed_tasks['completed_tasks'];
} else {
    // Default to 0 completed tasks if data not found
    $completed_tasks = 0;
}

// Get the total number of tasks for the user
$sql_total_tasks = "SELECT COUNT(*) AS total_tasks FROM task WHERE user_email = '$user_email'";
$result_total_tasks = mysqli_query($dbconn, $sql_total_tasks);

if ($result_total_tasks && mysqli_num_rows($result_total_tasks) > 0) {
    $row_total_tasks = mysqli_fetch_assoc($result_total_tasks);
    $total_tasks = $row_total_tasks['total_tasks'];
} else {
    // Default to 0 total tasks if data not found
    $total_tasks = 0;
}

// Calculate progress percentage
$progress_percentage = ($total_tasks > 0) ? ($completed_tasks / $total_tasks) * 100 : 0;

// Tasks box
// Fetch tasks for the user
$sql_tasks = "SELECT * FROM task WHERE user_email = '$user_email'";
$result_tasks = mysqli_query($dbconn, $sql_tasks);

mysqli_close($dbconn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Track2Day</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="icon.jpg" alt="Track2Day Logo">
            <a href="menu2.php">Track2Day</a>
        </div>
        <div class="navbar_content">
            <i class='bi bi-grid'></i>
            <i class='bx bx-sun' id="darkLight"></i>
            <i class='bx bx-bell'></i>
            <ul>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="userprofile.php">Profile</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="profile-container">
            <h1>User Profile</h1>
            <div class="profile-details">
                <div class="profile-pic">
                    <img src="nopfp.png" alt="Profile Picture">
                </div>
                <div class="profile-details">
                    <p><strong>Name: </strong><?php echo htmlspecialchars($user_fname) . ' ' . htmlspecialchars($user_lname); ?></p>
                    <p><strong>Email: </strong><?php echo htmlspecialchars($user_email); ?></p>
                </div>
            </div>

            <div class="profile-actions">
                <button onclick="location.href='editprofile.html'">Edit Profile</button>
                <button onclick="location.href='changepassword.html'">Change Password</button>
            </div>
        </div>

        <div class="progress-task-container">
            <div class="progress-box">
                <h3>Progress</h3>
                <div class="progress-circle">
                    <span id="progress-percentage"><?php echo round($progress_percentage); ?>%</span>
                </div>
                <p>Tasks Completed: <?php echo $completed_tasks; ?> / <?php echo $total_tasks; ?></p>
            </div>
            <div class="tasks-box">
                <h3>Tasks</h3>
                <table class="task-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Task Name</th>
                            <th>Task Due</th>
                            <th>Task Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($result_tasks && mysqli_num_rows($result_tasks) > 0) {
                            $task_number = 1;
                            while ($row_task = mysqli_fetch_assoc($result_tasks)) {
                                echo "<tr>";
                                echo "<td>" . $task_number . "</td>";
                                echo "<td>" . htmlspecialchars($row_task['task_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row_task['task_duration']) . "</td>";
                                echo "<td>" . htmlspecialchars($row_task['task_desc']) . "</td>";
                                echo "<td>" . htmlspecialchars($row_task['task_status']) . "</td>";
                                echo "</tr>";
                                $task_number++;
                            }
                        } else {
                            echo "<tr><td colspan='5'>No tasks found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <button onclick="location.href='tasks.php'">Edit</button>
            </div>
        </div>
    </main>
</body>

<footer>
    <div class="footer-container">
        <div class="footer-content">
            <h3>Contact Us</h3>
            <p>Email: track2day@enquiries.com</p>
            <p>Phone:+ 03-84532900</p>
            <p>Address: 56 Jln 14/48 Seksyen 14 Petaling Jaya</p>
        </div>
        <div class="footer-content">
            <h3>Quick Links</h3>
             <ul class="list">
                <li><a href="menu2.php">Home</a></li>
                <li><a href="aboutus2.php">About</a></li>
                <li><a href="login.html">Log In</a></li>
             </ul>
        </div>
        
    </div>
    <div class="bottom-bar">
        <p>&copy; 2023 Track2Day . All rights reserved</p>
        
        
    </div>
</footer>
</html>
