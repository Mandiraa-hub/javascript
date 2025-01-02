<!-- 5. Write a function that takes the base and height of a triangle and return its area. -->
 <!DOCTYPE html>
<html>
<head>
    <title>Triangle Area Calculator</title>
</head>
<body>
    <h2>Triangle Area Calculator</h2>
    <form method="post">
        <label for="base">Base:</label>
        <input type="number" id="base" name="base" required><br><br>
        <label for="height">Height:</label>
        <input type="number" id="height" name="height" required><br><br>
        <input type="submit" value="Calculate Area">
    </form>

    <?php
    function calculateTriangleArea($base, $height) {
        return 0.5 * $base * $height;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = $_POST['base'];
        $height = $_POST['height'];
        $area = calculateTriangleArea($base, $height);
        echo "<h3>The area of the triangle is: " . $area . " square units.</h3>";
    }
    ?>
</body>
</html>