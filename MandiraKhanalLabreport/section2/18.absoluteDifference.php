<!-- 18. Write a PHP program to get the absolute difference between n and 51. If n is greater than 
51 return triple the absolute difference. -->
<!DOCTYPE html>
<html>
<head>
    <title>Absolute Difference Calculator</title>
</head>
<body>
    <h2>Absolute Difference Calculator</h2>
    <form method="post">
        <label for="number">Enter an Integer:</label>
        <input type="number" id="number" name="number" required value="<?php echo isset($_POST['number']) ? $_POST['number'] : ''; ?>"><br><br>
        <input type="submit" value="Calculate Difference">
    </form>

    <?php
    function absoluteDifference($n) {
        $difference = abs($n - 51);
        if ($n > 51) {
            return 3 * $difference;
        } else {
            return $difference;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];
        $result = absoluteDifference($number);
        echo "<h3>The result is: " . $result . ".</h3>";
    }
    ?>
</body>
</html>