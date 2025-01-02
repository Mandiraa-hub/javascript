<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: 28.sessionAndcookie.php");
    exit();
}

// Retrieve username from session or cookie
$username = $_SESSION['username'] ?? $_COOKIE['username'] ?? 'Guest';

echo "<h1>Welcome, $username!</h1>";
echo "<p>You are logged in.</p>";

// Logout link
echo '<a href="logout.php">Logout</a>';
?>
