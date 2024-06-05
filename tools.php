HTML <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Track2Day</title>
  <link rel="icon" type="image/x-icon" href="track2daylogo.jpg">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php
  session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: login.html");
        exit();
    }
    ?>
    
  <!-- navbar -->
  <nav class="navbar">
    <div class="logo_item">
      <img src="track2daylogo.jpg" alt=""></i>
      <a href="menu2.php">Track2Day</a>
      <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
              <a href="menu2.php"><li>Home</li></a>
              <a href="aboutus.html"><li>About</li></a>
              <a href="userprofile.php"><li>Profile</li></a>
            </ul>
          </div>
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
  </nav>
  
  <main>
    <br>
    <section id="mood-tracker">
  <h1 style="text-align: center;">How are you feeling today?</h1>
  <div class="tools">
    <h2 style="text-align: left;">Mood Tracker</h2>
    <form id="mood-form" action="submit_entry.php" method="POST"> 
    <input type="hidden" name="user_email" value="<?php echo $_SESSION['email']; ?>">
      <select id="week" name="week" class="date">
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
      </select><br>

      <div class="mood">
        <input type="radio" id="mood1" name="mood" value="M001">
        <label for="mood1">Relaxed, Content</label><br>
        
        <input type="radio" id="mood2" name="mood" value="M002">
        <label for="mood2">Energetic, Motivated</label><br>
  
        <input type="radio" id="mood3" name="mood" value="M003">
        <label for="mood3">Average, Uneventful</label><br>
  
        <input type="radio" id="mood4" name="mood" value="M004">
        <label for="mood4">Sick, Tired, Dull, Unmotivated</label><br>
  
        <input type="radio" id="mood5" name="mood" value="M005">
        <label for="mood5">Sad, Lonely, Numb</label><br>
  
        <input type="radio" id="mood6" name="mood" value="M006">
        <label for="mood6">Frustrated, Anxious, Grumpy</label><br><br>
  
        <button id="button1" class="button">Submit</button>
        <button id="button2" class="button">Delete</button>
      </div>
    </form>
  </div>
  <div>
    <table id="table" class="tables">
      <thead>
        <tr>
          <td class="white">Weekday</td>
          <td class="white">Mood</td>
        </tr>
      </thead>
      <tbody>
      <?php
      include('dbconn.php');
      $user_email = $_SESSION['email'];
      $sql_tools = "SELECT um.week, m.mood_desc FROM user_mood um JOIN mood m ON um.mood_id = m.mood_id WHERE um.user_email = '$user_email'";
      $result_tools = mysqli_query($dbconn, $sql_tools);
      
      if ($result_tools) {
        while ($row_task = mysqli_fetch_assoc($result_tools)) {
          echo "<tr>";
          echo "<td>". $row_task['week']. "</td>";
          echo "<td>". $row_task['mood_desc']. "</td>";
          echo "</tr>";
        }
      }
      ?>
      </tbody>
    </table>
  </div>
</section>

    <br>

    <section id="B. Exercise">
      <div class="breathing-exercise">
        <h2>Breathing Exercise</h2>
        <p>Inhale... Exhale...</p>
        <p>Repeat the cycle for 5 minutes to relax.</p>
        <img src="https://alexandraheller.com/wp-content/uploads/2021/02/4_7_8_w_precopose.gif" alt="Breathing exercise GIF"
        style="max-width: 100%; height:auto;">
      </div>
    </section>

    <br> </br>
    
   
    <section class="journal">
     <header><h1 style="text-align: center;">My Personal Journal</h1></header>
      <section class="section journal-section">
        <div class="container">
          <div class="container-row container-row-journal">
            <div class="container-item container-item-journal">
              <form id="entryForm" action="">
                <label for="journal-id" class="journal-label">Journal ID:</label>
                <input type="text" id="journal-id" name="journal_id" required><br>
                <label for="entry-title" class="journal-label">Entry Title</label>
                <input
                type="text"
                name="entry-title"
                id="entry-title"
                class="entry-text-title"
                placeholder="Name of entry"
                />
            <label for="entry" class="journal-label">Today's Entry</label>
            <textarea
              name="daily-entry"
              id="entry"
              class="entry-text-box"
              placeholder="What's on your mind today? 💭"
            ></textarea>
            <button class="btn-main entry-submit-btn" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Journal Entry Results -->
  <section class="section sectionEntryResults" id="entryResultsSection">
    <div class="container">
      <div class="container-row entryResultRow"></div>
    </div>
    <script src="index.js"></script>
  </section>
</section>
    
  </main>

  <br> </br>

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
                </li>
                <a href="https://github.com/ahmadfarismk/track2day.git" class="github-link">
                    <img src="github.png" alt="GitHub" class="github-img" >
                </a>
             </ul>
        </div>
        
    </div>
    <div class="bottom-bar">
        <p>&copy; 2023 Track2Day . All rights reserved</p>
        
        
    </div>
</footer>

<script src="mood.js"></script>
</body>
</html>