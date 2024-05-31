<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both date and entry fields are set
    if (isset($_POST['date']) && isset($_POST['entry'])) {
        $date = $_POST['date'];
        $entry = $_POST['entry'];

        // Validate if date and entry are not empty
        if (!empty($date) && !empty($entry)) {
            // Escape HTML entities to prevent XSS attacks
            $date = htmlspecialchars($date);
            $entry = nl2br(htmlspecialchars($entry));

            echo "<h2>Journal Entry Submitted</h2>";
            echo "<p><strong>Date:</strong> $date</p>";
            echo "<p><strong>Entry:</strong> $entry</p>";
        } else {
            echo "<p>Please fill in all fields.</p>";
        }
    } else {
        echo "<p>Invalid form submission.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>
