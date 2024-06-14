<?php
session_start();
include('dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['user_email'];
    $week = $_POST['week'];

    $sql_delete = "DELETE FROM user_mood WHERE user_email = ? AND week = ?";
    $stmt = $dbconn->prepare($sql_delete);
    $stmt->bind_param("ss", $user_email, $week);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Mood entry deleted successfully.";
    } else {
        echo "No mood entry found to delete.";
    }

    $stmt->close();
    $dbconn->close();
}
?>
