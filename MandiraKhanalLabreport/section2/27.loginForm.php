<!-- 27. Write PHP Script to create and validate login form with username and password. -->
<?php
// Start session to manage user login status
session_start();

// Example hardcoded credentials (you should fetch these from a database)
$valid_credentials = [
    'username' => 'admin',
    'password' => 'Password123!'
];

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data); // Remove extra spaces
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data); // Convert special characters
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] ==='POST') {
    // Sanitize and validate inputs
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['password']);

    // Validate username (alphanumeric, 3-20 characters)
    if (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $username)) {
        die("Invalid username format. Only alphanumeric characters and underscores are allowed.");
    }

    // Validate password (at least 8 characters)
    if (strlen($password) < 8) {
        die("Password must be at least 8 characters long.");
    }

    // Check credentials
    if ($username === $valid_credentials['username'] && $password === $valid_credentials['password']) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        echo "Login successful. Welcome, $username!";
        // Redirect or load the dashboard
    } else {
        echo "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>
    <form action="27.loginForm.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required value="<?php echo isset($username) ? $username : ''; ?>">
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required value="<?php echo isset($password) ? $password : ''; ?>">
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
