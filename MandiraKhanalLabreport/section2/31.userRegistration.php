<!-- 31. Write a PHP script to validate and register (store) user with following data.
a. Username with minimum 8 character
b. Valid email Address
c. Validate Date of Birth
d. Valid phone length -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize inputs
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    
    $errors = [];
    $success_message = "";

    // Validation rules
    if (strlen($username) < 8) {
        $errors[] = "Username must be at least 8 characters long.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (DateTime::createFromFormat('Y-m-d', $dob) === false) {
        $errors[] = "Invalid date of birth. Use format YYYY-MM-DD.";
    }

    if (strlen($phone) < 10 || strlen($phone) > 15 || !ctype_digit($phone)) {
        $errors[] = "Phone number must be between 10-15 digits and contain only numbers.";
    }

    // If no errors, store user data
    if (empty($errors)) {
        $data_file = 'users.csv'; // Save user data in a CSV file for simplicity
        $user_data = [$username, $email, $dob, $phone];

        // Write data to file
        $file_handle = fopen($data_file, 'a');
        if ($file_handle !== false) {
            fputcsv($file_handle, $user_data);
            fclose($file_handle);
            $success_message = "Registration successful!";
        } else {
            $errors[] = "Failed to store user data. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h2>Register User</h2>

    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (!empty($success_message)): ?>
        <div style="color: green;"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <form action="31.userRegistration.php" method="POST">
        <label for="username">Username (min 8 characters):</label><br>
        <input type="text" id="username" name="username" required value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"><br><br>

        <label for="dob">Date of Birth (YYYY-MM-DD):</label><br>
        <input type="date" id="dob" name="dob" required value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : ''; ?>"><br><br>

        <label for="phone">Phone Number:</label><br>
        <input type="text" id="phone" name="phone" required value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>"><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
