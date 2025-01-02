<!-- 28. Write PHP Script to create and login form to implement session and cookie.
 -->
 <?php
// Start session
session_start();

// Example hardcoded credentials (replace with database query in production)
$valid_credentials = [
    'username' => 'admin',
    'password' => 'Password123!'
];

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize user inputs
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['password']);
    $remember = isset($_POST['remember']);

    // Check credentials
    if ($username === $valid_credentials['username'] && $password === $valid_credentials['password']) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Set a cookie if "Remember Me" is checked
        if ($remember) {
            setcookie("username", $username, time() + (86400 * 30), "/"); // Expires in 30 days
        }

        // Redirect to the dashboard
        header("Location:28.dashboard.php");
        exit();
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
    <form action="28.sessionAndcookie.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <label for="remember">
            <input type="checkbox" id="remember" name="remember">
            Remember Me
        </label>
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
