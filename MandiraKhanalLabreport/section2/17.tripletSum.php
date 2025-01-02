<!-- 17. Write a PHP program to compute the sum of the two given integer values. If the two 
values are the same, then returns triple their sum. -->
<!DOCTYPE html>
<html>
<head>
    <title>Triplet Sum Calculator</title>
</head>
<body>
    <h2>Triplet Sum Calculator</h2>
    <form method="post">
        <label for="value1">Enter First Integer:</label>
        <input type="number" id="value1" name="value1" required value="<?php echo isset($_POST['value1']) ? $_POST['value1'] : ''; ?>"><br><br>
        <label for="value2">Enter Second Integer:</label>
        <input type="number" id="value2" name="value2" required value="<?php echo isset($_POST['value2']) ? $_POST['value2'] : ''; ?>"><br><br>
        <input type="submit" value="Calculate Sum">
    </form>

    <?php
    function computeSum($value1, $value2) {
        if ($value1 == $value2) {
            return 3 * ($value1 + $value2);
        } else {
            return $value1 + $value2;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value1 = $_POST['value1'];
        $value2 = $_POST['value2'];
        $result = computeSum($value1, $value2);
        echo "<h3>The result is: " . $result . ".</h3>";
    }
    ?>
</body>
</html>