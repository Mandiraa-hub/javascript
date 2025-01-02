<!-- 2. Calculate area of circle taking radius input and defining value of PI as constant value.  -->
<?php
// Define the value of PI as a constant
define("PI", 3.14159);

// Function to calculate the area of a circle
function calculateCircleArea($radius) {
    return PI * $radius * $radius;
}

// Get the radius from user input (via form or hardcoded for demonstration)
$radius = isset($_POST['radius']) ? floatval($_POST['radius']) : 0;
$area = $radius > 0 ? calculateCircleArea($radius) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area of a Circle</title>
</head>
<body>
    <h1>Calculate Area of a Circle</h1>
    <form method="POST">
        <label for="radius">Enter the radius of the circle:</label>
        <input type="number" id="radius" name="radius" step="0.01" required>
        <button type="submit">Calculate</button>
    </form>

    <?php if ($area !== null): ?>
        <h2>Results:</h2>
        <p>The radius of the circle is: <?php echo $radius; ?></p>
        <p>The area of the circle is: <?php echo number_format($area, 2); ?> square units.</p>
    <?php endif; ?>
</body>
</html>
