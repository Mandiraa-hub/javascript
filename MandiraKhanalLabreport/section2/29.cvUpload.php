<!-- 29. Write PHP script to upload CV with following details:
a. File type: PDF & DOCS
b. File size less than 1 MB
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Upload</title>
</head>
<body>
    <h2>Upload Your CV</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="cv">Choose your CV (PDF or DOCX, max 1MB):</label>
        <input type="file" id="cv" name="cv" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
<?php
// Define allowed file types and maximum file size (in bytes)
$allowed_types = ['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
$max_file_size = 1 * 1024 * 1024; // 1 MB

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        // Get file details
        $file_name = $_FILES['cv']['name'];
        $file_tmp = $_FILES['cv']['tmp_name'];
        $file_type = $_FILES['cv']['type'];
        $file_size = $_FILES['cv']['size'];
        $upload_dir = 'uploads/'; // Directory to save the uploaded files

        // Create upload directory if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Validate file type
        if (!in_array($file_type, $allowed_types)) {
            echo "Error: Only PDF and DOCX files are allowed.";
            exit();
        }

        // Validate file size
        if ($file_size > $max_file_size) {
            echo "Error: File size must be less than 1MB.";
            exit();
        }

        // Generate a unique file name to avoid overwriting
        $new_file_name = uniqid() . "_" . basename($file_name);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
            echo "Success: Your CV has been uploaded!";
            echo "<br>File Name: $new_file_name";
            echo "<br>File Size: " . round($file_size / 1024, 2) . " KB";
            echo "<br><a href='" . $upload_dir . $new_file_name . "' target='_blank'>View Your CV</a>";
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        echo "Error: No file uploaded or file upload error.";
    }
} else {
    echo "Invalid request method.";
}
?>
