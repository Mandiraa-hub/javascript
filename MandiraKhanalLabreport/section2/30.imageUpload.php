<!-- 30. Write PHP script to upload Profile Image with following details:
a. File type: PNG & JPEG
b. File size less than 500 KB
 -->
 <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Directory to store uploaded files
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir); // Create the directory if it doesn't exist
    }

    // Get file details
    $file_name = $_FILES['profile_image']['name'];
    $file_tmp = $_FILES['profile_image']['tmp_name'];
    $file_size = $_FILES['profile_image']['size'];
    $file_error = $_FILES['profile_image']['error'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    // Allowed file types and size
    $allowed_types = ['png', 'jpeg', 'jpg'];
    $max_file_size = 500 * 1024; // 500 KB

    // Generate unique file name
    $new_file_name = uniqid() . "." . $file_ext;

    // Validation
    if ($file_error === 0) {
        if (in_array($file_ext, $allowed_types)) {
            if ($file_size <= $max_file_size) {
                // Move the file to the uploads directory
                if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                    echo "Success: Your profile image has been uploaded!";
                    echo "<br><img src='" . $upload_dir . $new_file_name . "' alt='Profile Image' style='width:150px;height:150px;border:2px solid #000;margin-top:10px;'>";
                } else {
                    echo "Error: Failed to upload your file.";
                }
            } else {
                echo "Error: File size exceeds 500 KB.";
            }
        } else {
            echo "Error: Only PNG and JPEG files are allowed.";
        }
    } else {
        echo "Error: An error occurred during file upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Image Upload</title>
</head>
<body>
    <h2>Upload Profile Image</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="profile_image">Select Profile Image (PNG, JPEG):</label>
        <input type="file" name="profile_image" id="profile_image" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
