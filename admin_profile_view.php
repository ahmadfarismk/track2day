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
      <img src="icon.jpg" alt="">
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
            <p id="admin-name"><?php echo htmlspecialchars($admin['adm_fname'] . ' ' . $admin['adm_lname']); ?></p>
            <p id="admin-email"><?php echo htmlspecialchars($admin['adm_email']); ?></p>
          </div>
        </div>
        <div class="profile-actions">
          <button onclick="location.href='editprofile.html'">Edit Profile</button>
        </div>
      </div>

      <div class="data-tables">
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
            <?php while($row = $user_result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo htmlspecialchars($row['user_email']); ?></td>
              <td><?php echo htmlspecialchars($row['user_fname']); ?></td>
              <td><?php echo htmlspecialchars($row['user_lname']); ?></td>
              <td><?php echo htmlspecialchars($row['user_password']); ?></td>
              <td>
                <form action="delete_user.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                  <input type="hidden" name="user_email" value="<?php echo htmlspecialchars($row['user_email']); ?>">
                  <button type="submit">Delete</button>
                </form>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        <br>

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
            <?php while($row = $therapist_result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo htmlspecialchars($row['adm_email']); ?></td>
              <td><?php echo htmlspecialchars($row['adm_fname']); ?></td>
              <td><?php echo htmlspecialchars($row['adm_lname']); ?></td>
              <td><?php echo htmlspecialchars($row['adm_password']); ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <br></br>
      </div>
    </section>
  </main>

</body>
</html>
