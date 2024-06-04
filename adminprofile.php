<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.html");
    exit();
}

include('dbconn.php');

$adm_email = $_SESSION['email'];

// Admin profile container
// Fetch admin information from the database
$sql = "SELECT * FROM admin WHERE adm_email = '$adm_email'";
$result = mysqli_query($dbconn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $adm_fname = $row['adm_fname'];
    $adm_lname = $row['adm_lname'];
} else {
    // Error if user data is not found
    echo "Error: User data not found.";
    exit();
}

// Fetch user information related to this admin
$user_sql = "SELECT * FROM user WHERE adm_email = '$adm_email'";
$user_result = mysqli_query($dbconn, $user_sql);

// Fetch therapist information
$therapist_sql = "SELECT * FROM admin"; // Assuming therapists are stored in the admin table
$therapist_result = mysqli_query($dbconn, $therapist_sql);

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
    <link rel="stylesheet" href="style.css">
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
            <h1>Admin Profile</h1>
            <div class="profile-details">
                <div class="profile-pic">
                    <img src="nopfp.png" alt="Profile Picture">
                </div>
                <div class="profile-details">
                    <p><strong>Name: </strong><?php echo htmlspecialchars($adm_fname) . ' ' . htmlspecialchars($adm_lname); ?></p>
                    <p><strong>Email: </strong><?php echo htmlspecialchars($adm_email); ?></p>
                </div>
            </div>

            <div class="profile-actions">
                <button onclick="location.href='editprofile.html'">Edit Profile</button>
                <button onclick="location.href='changepassword.html'">Change Password</button>
            </div>
        </div>
    
        <!-- Container for Users Data Table -->
        <div class="data-table-container">
            <h2>Users</h2>
            <table id="user-table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user_row = mysqli_fetch_assoc($user_result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user_row['user_email']); ?></td>
                        <td><?php echo htmlspecialchars($user_row['user_fname']); ?></td>
                        <td><?php echo htmlspecialchars($user_row['user_lname']); ?></td>
                        <td><?php echo htmlspecialchars($user_row['user_password']); ?></td>
                        <td>
                            <form action="delete_user.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <input type="hidden" name="user_email" value="<?php echo htmlspecialchars($user_row['user_email']); ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <!-- Container for Therapists Data Table -->
        <div class="data-table-container">
            <h2>Therapists</h2>
            <table id="therapist-table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($therapist_row = mysqli_fetch_assoc($therapist_result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($therapist_row['adm_email']); ?></td>
                        <td><?php echo htmlspecialchars($therapist_row['adm_fname']); ?></td>
                        <td><?php echo htmlspecialchars($therapist_row['adm_lname']); ?></td>
                        <td><?php echo htmlspecialchars($therapist_row['adm_password']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

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
                    <li><a href="menu2.php">Home</a></li>
                    <li><a href="aboutus2.php">About</a></li>
                    <li><a href="login.html">Log In</a></li>
                </ul>
            </div>
        </div>
        <div class="bottom-bar">
            <p>&copy; 2023 Track2Day. All rights reserved</p>
        </div>
    </footer>
</body>
</html>
