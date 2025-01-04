<?php
// Database connection
$host = 'localhost';
$dbname = 'pms';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error connecting to database: " . $e->getMessage();
    exit();
}

// Get the username from the request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $inputUsername = trim($_POST['username']);

    if (empty($inputUsername)) {
        echo "invalid";
        exit();
    }

    // Query to check if the username exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $stmt->bindParam(':username', $inputUsername, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "unavailable";
    } else {
        echo "available";
    }
} else {
    echo "invalid_request";
}
?>
