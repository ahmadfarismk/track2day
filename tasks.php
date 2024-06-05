<!DOCTYPE html>
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
            <img src="track2daylogo.jpg" alt="Track2Day Logo">
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
            <i class='bx bx-bell'></i>
            <ul>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="userprofile.php">Profile</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="tasks-container">
            <h1>Manage Tasks</h1>
            <form action="savetasks.php" method="POST">
                <table class="task-table">
                    <thead>
                        <tr>
                            <th>Task Name</th>
                            <th>Task Due</th>
                            <th>Task Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP to fetch and display tasks -->
                        <?php
                        include('dbconn.php');
                        $user_email = $_SESSION['email'];
                        $sql_tasks = "SELECT * FROM task WHERE user_email = '$user_email'";
                        $result_tasks = mysqli_query($dbconn, $sql_tasks);

                        if ($result_tasks && mysqli_num_rows($result_tasks) > 0) {
                            while ($row_task = mysqli_fetch_assoc($result_tasks)) {
                                echo "<tr>";
                                echo "<td><input type='text' name='task_name[]' value='" . htmlspecialchars($row_task['task_name']) . "'></td>";
                                echo "<td><input type='date' name='task_duration[]' value='" . htmlspecialchars($row_task['task_duration']) . "'></td>";
                                echo "<td><input type='text' name='task_desc[]' value='" . htmlspecialchars($row_task['task_desc']) . "'></td>";
                                echo "<td><select name='task_status[]'><option value='pending'" . ($row_task['task_status'] == 'pending' ? ' selected' : '') . ">Pending</option><option value='completed'" . ($row_task['task_status'] == 'completed' ? ' selected' : '') . ">Completed</option></select></td>";
                                echo "<td><button type='submit' class='delete-task'>Delete</button></td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <button type="button" id="add-task">Add Task</button>
                <button type="submit" name="save">Save Changes</button>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('add-task').addEventListener('click', function() {
            var table = document.querySelector('.task-table tbody');
            var newRow = table.insertRow();
            newRow.innerHTML = `
                <td><input type="text" name="task_name[]"></td>
                <td><input type="date" name="task_duration[]"></td>
                <td><input type="text" name="task_desc[]"></td>
                <td><select name="task_status[]"><option value="pending">Pending</option><option value="completed">Completed</option></select></td>
                <td><button type="submit" class="delete-task">Delete</button></td>
            `;
        });

        document.querySelector('.task-table').addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-task')) {
                var row = e.target.closest('tr');
                row.remove();
            }
        });
    </script>
</body>
</html>
