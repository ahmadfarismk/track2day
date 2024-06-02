<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Admin Profile</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <!-- navbar -->
  <nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <img src="icon.jpg" alt="">Track2Day
      <a href="menu.html">Track2Day</a>
    </div>
    <div class="navbar_content">
      <i class='bi bi-grid'></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <i class='bx bx-bell'></i>
      <ul>
        <li><a href="login.html">Login</a></li>
        <li><a href="signup.html">Sign Up</a></li>
      </ul>
    </div>
  </nav>

  <main>
    <section>
      <div class="adminprofile-container">
        <h1>Admin Profile</h1>
        <div class="profile-details">
          <div class="profile-pic">
            <img src='profile-pic.jpg' alt="profile-pic">
          </div>
          <div class="profile-info">
            <p id="admin-name"><?php echo $admin['adm_fname'] . ' ' . $admin['adm_lname']; ?></p>
            <p id="admin-email"><?php echo $admin['adm_email']; ?></p>
          </div>
        </div>
        <div class="profile-actions">
          <button onclick="location.href='editprofile.html'">Edit Profile</button>
        </div>
      </div>

      <div class="data-ttables">
        <h2>Users</h2>
        <table id="user-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Password</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $user_result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['user_id']; ?></td>
              <td><?php echo $row['user_email']; ?></td>
              <td><?php echo $row['user_fname']; ?></td>
              <td><?php echo $row['user_lname']; ?></td>
              <td><?php echo $row['user_password']; ?></td>
              <td>
                <button onclick="location.href='edituser.php?email=<?php echo $row['user_email']; ?>'">Edit</button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        <br></br>

        <h2>Therapists</h2>
        <table id="therapist-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Password</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $therapist_result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['user_id']; ?></td>
              <td><?php echo $row['user_email']; ?></td>
              <td><?php echo $row['user_fname']; ?></td>
              <td><?php echo $row['user_lname']; ?></td>
              <td><?php echo $row['user_password']; ?></td>
              <td>
                <button onclick="location.href='edittherapist.php?email=<?php echo $row['user_email']; ?>'">Edit</button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <br></br>
      </div>
    </section>
  </main>

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
</body>
</html>
