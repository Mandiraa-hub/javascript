<!-- 7. Create a function that takes voltage and current and returns the calculated power. -->
<html>
<head>
    <title>Power Calculator</title>
</head>
<body>
    <h2>Power Calculator</h2>
    <form method="post">
        <label for="voltage">Voltage (V):</label>
        <input type="number" id="voltage" name="voltage" required><br><br>
        <label for="current">Current (A):</label>
        <input type="number" id="current" name="current" required><br><br>
        <input type="submit" value="Calculate Power">
    </form>

    <?php
    function calculatePower($voltage, $current) {
        return $voltage * $current;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $voltage = $_POST['voltage'];
        $current = $_POST['current'];
        $power = calculatePower($voltage, $current);
        echo "<h3>The calculated power is: " . $power . " watts.</h3>";
    }
    ?>
</body>
</html>