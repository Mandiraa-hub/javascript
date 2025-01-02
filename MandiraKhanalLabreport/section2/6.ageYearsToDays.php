<!-- 6. Create a function that takes the age in years and returns the age in days.
 -->
<!DOCTYPE html>
<html>
<head>
    <title>Age in Days Calculator</title>
</head>
<body>
    <h2>Age in Days Calculator</h2>
    <form method="post">
        <label for="age">Age in Years:</label>
        <input type="number" id="age" name="age" required><br><br>
        <input type="submit" value="Calculate Age in Days">
    </form>

    <?php
    function ageYearsToDays($years) {
        return $years * 365;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $age = $_POST['age'];
        $days = ageYearsToDays($age);
        echo "<h3>Your age in days is: " . $days . " days.</h3>";
    }
    ?>
</body>
</html>