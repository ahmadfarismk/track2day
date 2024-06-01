<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.html");
    exit();
}

include('dbconn.php');

$user_email = $_SESSION['email'];

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
                    <span id="progress-percentage">0%</span>
                </div>
                <p>Tasks Completed</p>
            </div>
            <div class="tasks-box">
                <h3>Tasks</h3>
                <form id="tasks-form">
                    <table class="task-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Task Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Task 1</td>
                                <td>Not Completed</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Task 2</td>
                                <td>Pending</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Task 3</td>
                                <td>Completed</td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <button onclick="location.href='tasks.html'">Edit</button>
            </div>
        </div>
    </main>
</body>

<footer>
    <div class="footer-container">
        <div class="footer-content">
            <h3>Contact Us</h3>
            <p>Email: track2day@enquiries.com</p>
            <p>Phone: +03-84532900</p>
            <p>Address: 56 Jln 14/48 Seksyen 14 Petaling Jaya</p>
        </div>
        <div class="footer-content">
            <h3>Quick Links</h3>
            <ul class="list">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="footer-content">
            <h3>Follow Us</h3>
            <ul class="social-icons">
                <!-- Social media links -->
            </ul>
        </div>
    </div>
    <div class="bottom-bar">
        <p>&copy; 2023 Track2Day. All rights reserved</p>
    </div>
</footer>
</html>
