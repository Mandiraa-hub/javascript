<!-- 3. Write a function that takes an integer minutes and converts it to seconds. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert Minutes to Seconds</title>
</head>
<body>
    <h1>Convert Minutes to Seconds</h1>
    <form method="POST" action="">
        <label for="minutes">Enter Minutes:</label>
        <input type="number" id="minutes" name="minutes" required>
        <button type="submit">Convert</button>
    </form>

    <?php
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the user input
        $minutes = $_POST['minutes'];

        // Function to convert minutes to seconds
        function convertMinutesToSeconds($minutes) {
            return $minutes * 60;
        }

        // Calculate seconds
        $seconds = convertMinutesToSeconds($minutes);

        // Display the result
        echo "<h2>$minutes minutes is equal to $seconds seconds.</h2>";
    }
    ?>
</body>
</html>
