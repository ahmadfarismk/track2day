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
        <img src="icon.jpg" alt=""></i>
        <a href="menu2.php">Track2Day</a>

      </div>
      <div class="navbar_content">
        <i class='bi bi-grid'></i>
        <i class='bx bx-sun' id="darkLight"></i>
        <i class='bx bx-bell' ></i>
        <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="userprofile.php">Profile</a></li>
        </ul>
      </div>
      <!-- <div id="menuToggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
        <ul id="menu">
          <a href="#"><li>Home</li></a>
          <a href="#"><li>About</li></a>
          <a href="#"><li>Info</li></a>
          <a href="#"><li>Contact</li></a>
          <a href="https://github.com/gevendra2004" target="_blank"><li>Show me more</li></a>
        </ul>
      </div> -->
    </nav>
    
    <main>
        <h2 id="title">Welcome to Track2Day! <br> Tracking mood is now ease! </h2><br>
        <div class="container">
            <p>“Pleasure in the job puts perfection in the work.”<br> - Aristotle</p>
            <!--<button>Join Us Now!</button> -->
        </div>
        <!-- Sections -->
        <div class="container-2">
            <!-- <div class="box">
              <h2>Daily Goals</h2>
              <p></p>
            </div> -->
            <div class="box">
              <h2>Tasks</h2>
              <p></p>
              <button onclick="location.href='tasks.php'">Tasks</button>
            </div>
            <div class="box">
              <h2>Tools</h2>
              <p>Log on your daily mood, breathing exercise and write your journal today!</p>
              <button onclick="location.href='tools.html'">tools</button>
            </div>
          </div>


          <h2 id="title-review">Reviews</h2>
          <div class="container-2">
            <div class="oval">
              
            </div>
            <div class="oval">
              
            </div>
            <div class="oval">
              
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