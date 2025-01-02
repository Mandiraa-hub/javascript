<!-- 23. Write a PHP program to check the largest number among three given integers.
 -->
<!DOCTYPE html>
<html>
<head>
    <title>Largest Number Checker</title>
</head>
<body>
    <h2>Largest Number Checker</h2>
    <form method="post">
        <label for="num1">Enter First Integer:</label>
        <input type="number" id="num1" name="num1" required value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>"><br><br>
        <label for="num2">Enter Second Integer:</label>
        <input type="number" id="num2" name="num2" required value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>"><br><br>
        <label for="num3">Enter Third Integer:</label>
        <input type="number" id="num3" name="num3" required value="<?php echo isset($_POST['num3']) ? $_POST['num3'] : ''; ?>"><br><br>
        <input type="submit" value="Find Largest">
    </form>

    <?php
    function findLargest($num1, $num2, $num3) {
        return max($num1, $num2, $num3);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];
        $largest = findLargest($num1, $num2, $num3);
        echo "<h3>The largest number is: " . $largest . ".</h3>";
    }
    ?>
</body>
</html>