<?php
// Mock user data (for demonstration purposes)
$validUserId = "user123";
$validPassword = "password123";

// Set the content type to plain text
header('Content-Type: text/plain');

// Check if data was sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted data
    $userid = isset($_POST['userid']) ? trim($_POST['userid']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validate the login credentials
    if ($userid === $validUserId && $password === $validPassword) {
        echo "success";
    } else {
        echo "fail";
    }
} else {
    // If accessed directly, deny access
    echo "Unauthorized access";
}
?>
