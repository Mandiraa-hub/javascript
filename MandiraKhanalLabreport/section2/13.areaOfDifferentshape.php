<!-- 13. Write a function that accepts base (decimal), height (decimal) and shape ("triangle", 
"parallelogram") as input and calculates the area of that shape.. -->
<!DOCTYPE html>
<html>
<head>
    <title>Area Calculator</title>
</head>
<body>
    <h2>Area Calculator</h2>
    <form method="post">
        <label for="base">Base (decimal):</label>
        <input type="number" step="0.01" id="base" name="base" required><br><br>
        <label for="height">Height (decimal):</label>
        <input type="number" step="0.01" id="height" name="height" required><br><br>
        <label for="shape">Shape:</label>
        <select id="shape" name="shape" required>
            <option value="triangle">Triangle</option>
            <option value="parallelogram">Parallelogram</option>
        </select><br><br>
        <input type="submit" value="Calculate Area">
    </form>

    <?php
    function calculateArea($base, $height, $shape) {
        if ($shape === "triangle") {
            return 0.5 * $base * $height;
        } elseif ($shape === "parallelogram") {
            return $base * $height;
        } else {
            return 0;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = $_POST['base'];
        $height = $_POST['height'];
        $shape = $_POST['shape'];
        $area = calculateArea($base, $height, $shape);
        echo "<h3>The area of the $shape is: " . $area . " square units.</h3>";
    }
    ?>
</body>
</html> 