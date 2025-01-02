<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scripting_language";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    $name = htmlspecialchars(trim($_POST['name']));
    $rank = htmlspecialchars(trim($_POST['rank']));
    $status = htmlspecialchars(trim($_POST['status']));
    $image = $_FILES['image']['name'];
    $created_by = "admin";  // Example created_by (you can get this dynamically if needed)
    $updated_by = "admin";  // Example updated_by

    // Image validation
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['image']['type'], $allowed_types)) {
        $errors[] = "Invalid image format. Only JPEG, PNG, and GIF are allowed.";
    }

    // Basic validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (!in_array($status, ['active', 'inactive'])) {
        $errors[] = "Status must be 'active' or 'inactive'.";
    }

    if (empty($errors)) {
        // File upload handling
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO users (name, rank, status, image, created_by, updated_by) 
                    VALUES ('$name', '$rank', '$status', '$target_file', '$created_by', '$updated_by')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}

// Fetch and list records
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo "<h3>Users List</h3>";
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Rank</th><th>Status</th><th>Image</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["rank"]. "</td><td>" . $row["status"]. "</td><td><img src='" . $row["image"] . "' width='50'></td><td>
        <a href='?update=" . $row["id"] . "'>Update</a> | 
        <a href='?delete=" . $row["id"] . "'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

// Update record
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $name = htmlspecialchars(trim($_POST['name']));
        $rank = htmlspecialchars(trim($_POST['rank']));
        $status = htmlspecialchars(trim($_POST['status']));
        $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $user['image'];
        
        // File upload
        if ($_FILES['image']['name']) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        }
        
        $sql = "UPDATE users SET name='$name', rank='$rank', status='$status', image='$target_file', updated_by='admin' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
?>

    <h3>Update User</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
        <label for="rank">Rank:</label>
        <input type="text" name="rank" value="<?php echo $user['rank']; ?>"><br>
        <label for="status">Status:</label>
        <select name="status">
            <option value="active" <?php echo $user['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
            <option value="inactive" <?php echo $user['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
        </select><br>
        <label for="image">Profile Image:</label>
        <input type="file" name="image" accept="image/*"><br>
        <input type="submit" name="update" value="Update">
    </form>

<?php
}

// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location: ' . $_SERVER['PHP_SELF']);
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
</head>
<body>

    <h2>Add New User</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>
        <label for="rank">Rank:</label>
        <input type="text" name="rank"><br><br>
        <label for="status">Status:</label>
        <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br><br>
        <label for="image">Profile Image:</label>
        <input type="file" name="image" accept="image/*"><br><br>
        <input type="submit" value="Add User">
    </form>

</body>
</html>
