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
    <title>Side Navigation Bar in HTML CSS JavaScript</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="icon.jpg" alt="">
        <a href="menu.html">Track2Day</a>
        
      </div>
      <div class="navbar_content">
        <i class='bi bi-grid'></i>
        <i class='bx bx-sun' id="darkLight"></i>
        <i class='bx bx-bell' ></i>
        <ul>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Sign Up</a></li>
        </ul>
      </div>
  
    </nav>
    
    <main>
        <h2 id="about-title">About us </h2>
        <div class="about-container">
          <p>Welcome to Track2Day, a revolutionary web application designed to seamlessly integrate task management with mood tracking, promoting both productivity and mental well-being. Track2Day brings together a team of therapists dedicated to integrating task management and emotional well-being for a balanced life.</p>
          <div id="read-more-content" style="display: none;">
              <b>Our Mission</b><br>
              <p>Track2Day enhances quality education and promotes good health and well-being, aligning with key Sustainable Development Goals (SDGs). Our mission is to provide tools for organizing tasks and gaining insights into emotional patterns, fostering a balanced lifestyle.</p>
              <br><b>Our Vision</b><br>
              <p> At Track2Day, our vision is to create a world where individuals seamlessly balance their personal and professional lives, achieving peak productivity while maintaining optimal mental and emotional well-being. We aim to be the leading platform that empowers users to understand and manage their tasks and moods, fostering a more mindful, organized, and fulfilling life for everyone.</p>
              <br><b>Join Us</b><br>
              <p>At Track2Day, we believe in a balanced approach to life management. Our features make us a valuable resource for enhancing productivity while maintaining mental health. Join us towards a more organized, productive, and emotionally balanced life.
                  <br><br>Discover Track2Day today and take the first step towards a harmonious lifestyle.</p>
          </div>
          <button onclick="toggleReadMore()">Read More</button>
      </div>
        <h2 id="about-title">Our Therapists </h2>
        
        <div class="therapist-container-2">
            <div class="therapist-box">
                <h2>Dr. Zarith</h2>
                <img src="messi.jpg" class="center-align image">
                <br>
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <p class="desc">Dr. Zarith, clinical psychologist, uses cognitive-behavioral therapy to help clients with anxiety, depression, and trauma.</p>
              </div>
              <div class="therapist-box">
                <h2>Dr. Auni</h2>
                <img src="messi.jpg" class="center-align image">
                <br>
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <p class="desc">Dr. Zarith, clinical psychologist, uses cognitive-behavioral therapy to help clients with anxiety, depression, and trauma.</p>
              </div>
              
        </div>
        <div class="therapist-container-2">
            <div class="therapist-box">
                <h2>Dr. Faris</h2>
                <img src="messi.jpg" class="center-align image">
                <br>
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <p class="desc">Dr. Zarith, clinical psychologist, uses cognitive-behavioral therapy to help clients with anxiety, depression, and trauma.</p>
              </div>
              <div class="therapist-box">
                <h2>Dr. Syakir</h2>
                <img src="messi.jpg" class="center-align image">
                <br>
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                <img src="rating.jpg" class="center-align rating">
                
                <p class="desc">Dr. Zarith, clinical psychologist, uses cognitive-behavioral therapy to help clients with anxiety, depression, and trauma.</p>
              </div>
        </div>
        
        
    </main>
    
    <script>
      function toggleReadMore() {
          const readMoreContent = document.getElementById('read-more-content');
          const readMoreButton = document.querySelector('button');
          if (readMoreContent.style.display === 'none') {
              readMoreContent.style.display = 'block';
              readMoreButton.textContent = 'Read Less';
          } else {
              readMoreContent.style.display = 'none';
              readMoreButton.textContent = 'Read More';
          }
      }
    </script>


  
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
                <li><a href="menu.html">Home</a></li>
                <li><a href="aboutus.html">About</a></li>
                <li><a href="login.html">Log In</a></li>
             </ul>
        </div>
        
    </div>
    <div class="bottom-bar">
        <p>&copy; 2023 Track2Day . All rights reserved</p>
        
        
    </div>
</footer>


</html>