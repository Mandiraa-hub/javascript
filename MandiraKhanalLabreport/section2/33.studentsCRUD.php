<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scripting_language";  // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create course
if (isset($_POST['add_course'])) {
    $title = htmlspecialchars(trim($_POST['title']));
    $duration = htmlspecialchars(trim($_POST['duration']));
    $status = htmlspecialchars(trim($_POST['status']));

    $sql = "INSERT INTO courses (title, duration, status) VALUES ('$title', '$duration', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "New course added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Update course
if (isset($_POST['update_course'])) {
    $id = $_POST['id'];
    $title = htmlspecialchars(trim($_POST['title']));
    $duration = htmlspecialchars(trim($_POST['duration']));
    $status = htmlspecialchars(trim($_POST['status']));

    $sql = "UPDATE courses SET title='$title', duration='$duration', status='$status' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Course updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch course details for update
$course_to_update = null;
if (isset($_GET['update_course'])) {
    $id = $_GET['update_course'];
    $sql = "SELECT * FROM courses WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $course_to_update = $result->fetch_assoc();
    }
}

// Create student
if (isset($_POST['add_student'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $course_id = htmlspecialchars(trim($_POST['course_id']));
    $fee = htmlspecialchars(trim($_POST['fee']));
    $rollno = htmlspecialchars(trim($_POST['rollno']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $status = htmlspecialchars(trim($_POST['status']));

    $sql = "INSERT INTO students (name, course_id, fee, rollno, phone, address, dob, status) VALUES ('$name', '$course_id', '$fee', '$rollno', '$phone', '$address', '$dob', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Update student
if (isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $name = htmlspecialchars(trim($_POST['name']));
    $course_id = htmlspecialchars(trim($_POST['course_id']));
    $fee = htmlspecialchars(trim($_POST['fee']));
    $rollno = htmlspecialchars(trim($_POST['rollno']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $status = htmlspecialchars(trim($_POST['status']));

    $sql = "UPDATE students SET name='$name', course_id='$course_id', fee='$fee', rollno='$rollno', phone='$phone', address='$address', dob='$dob', status='$status' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch student details for update
$student_to_update = null;
if (isset($_GET['update_student'])) {
    $id = $_GET['update_student'];
    $sql = "SELECT * FROM students WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $student_to_update = $result->fetch_assoc();
    }
}

// Fetch and list all courses
function fetchCourses()
{
    global $conn;
    $sql = "SELECT * FROM courses";
    return $conn->query($sql);
}

// Fetch and list all students
function fetchStudents()
{
    global $conn;
    $sql = "SELECT students.id, students.name, students.rollno, students.phone, students.status, courses.title as course_title 
            FROM students 
            JOIN courses ON students.course_id = courses.id";
    return $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations - Courses and Students</title>
</head>

<body>

    <!-- Add or Update Course Form -->
    <h2><?php echo $course_to_update ? 'Update Course' : 'Add New Course'; ?></h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $course_to_update['id'] ?? ''; ?>">
        <label for="title">Course Title:</label>
        <input type="text" name="title" required value="<?php echo $course_to_update['title'] ?? ''; ?>"><br><br>
        <label for="duration">Duration:</label>
        <input type="text" name="duration" required value="<?php echo $course_to_update['duration'] ?? ''; ?>"><br><br>
        <label for="status">Status:</label>
        <select name="status" required>
            <option value="active" <?php echo isset($course_to_update['status']) && $course_to_update['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
            <option value="inactive" <?php echo isset($course_to_update['status']) && $course_to_update['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
        </select><br><br>
        <input type="submit" name="<?php echo $course_to_update ? 'update_course' : 'add_course'; ?>" value="<?php echo $course_to_update ? 'Update Course' : 'Add Course'; ?>">
    </form>

    <!-- Add Student Form -->
    <h2>Add New Student</h2>
    <form method="POST">
        <label for="name">Student Name:</label>
        <input type="text" name="name" required><br><br>
        <label for="course_id">Course:</label>
        <select name="course_id" required>
            <?php
            $courses = fetchCourses();
            while ($course = $courses->fetch_assoc()) {
                echo "<option value='{$course['id']}'>{$course['title']}</option>";
            }
            ?>
        </select><br><br>
        <label for="fee">Fee:</label>
        <input type="number" name="fee" step="0.01" required><br><br>
        <label for="rollno">Roll Number:</label>
        <input type="text" name="rollno" required><br><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br><br>
        <label for="address">Address:</label>
        <textarea name="address" required></textarea><br><br>
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required><br><br>
        <label for="status">Status:</label>
        <select name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br><br>
        <input type="submit" name="add_student" value="Add Student">
    </form>

    <!-- Update Student Form -->
    <h2><?php echo $student_to_update ? 'Update Student' : ''; ?></h2>
    <?php if ($student_to_update): ?>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $student_to_update['id'] ?? ''; ?>">
        <label for="name">Student Name:</label>
        <input type="text" name="name" required value="<?php echo $student_to_update['name'] ?? ''; ?>"><br><br>
        <label for="course_id">Course:</label>
        <select name="course_id" required>
            <?php
            $courses = fetchCourses();
            while ($course = $courses->fetch_assoc()) {
                $selected = isset($student_to_update['course_id']) && $student_to_update['course_id'] == $course['id'] ? 'selected' : '';
                echo "<option value='{$course['id']}' $selected>{$course['title']}</option>";
            }
            ?>
        </select><br><br>
        <label for="fee">Fee:</label>
        <input type="number" name="fee" step="0.01" required value="<?php echo $student_to_update['fee'] ?? ''; ?>"><br><br>
        <label for="rollno">Roll Number:</label>
        <input type="text" name="rollno" required value="<?php echo $student_to_update['rollno'] ?? ''; ?>"><br><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required value="<?php echo $student_to_update['phone'] ?? ''; ?>"><br><br>
        <label for="address">Address:</label>
        <textarea name="address" required><?php echo $student_to_update['address'] ?? ''; ?></textarea><br><br>
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required value="<?php echo $student_to_update['dob'] ?? ''; ?>"><br><br>
        <label for="status">Status:</label>
        <select name="status" required>
            <option value="active" <?php echo isset($student_to_update['status']) && $student_to_update['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
            <option value="inactive" <?php echo isset($student_to_update['status']) && $student_to_update['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
        </select><br><br>
        <input type="submit" name="update_student" value="Update Student">
    </form>
    <?php endif; ?>

    <!-- List of Courses -->
    <h2>Courses</h2>
    <?php
    $courses = fetchCourses();
    if ($courses->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Title</th><th>Duration</th><th>Status</th><th>Actions</th></tr>";
        while ($course = $courses->fetch_assoc()) {
            echo "<tr><td>" . $course['id'] . "</td><td>" . $course['title'] . "</td><td>" . $course['duration'] . "</td><td>" . $course['status'] . "</td><td>
                <a href='?delete_course=" . $course['id'] . "'>Delete</a> | 
                <a href='?update_course=" . $course['id'] . "'>Update</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No courses found.";
    }
    ?>

    <!-- List of Students -->
    <h2>Students</h2>
    <?php
    $students = fetchStudents();
    if ($students->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Course</th><th>Roll No</th><th>Phone</th><th>Status</th><th>Actions</th></tr>";
        while ($student = $students->fetch_assoc()) {
            echo "<tr><td>" . $student['id'] . "</td><td>" . $student['name'] . "</td><td>" . $student['course_title'] . "</td><td>" . $student['rollno'] . "</td><td>" . $student['phone'] . "</td><td>" . $student['status'] . "</td><td>
                <a href='?delete_student=" . $student['id'] . "'>Delete</a> | 
                <a href='?update_student=" . $student['id'] . "'>Update</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No students found.";
    }
    ?>

</body>

</html>

<?php
$conn->close();
?>