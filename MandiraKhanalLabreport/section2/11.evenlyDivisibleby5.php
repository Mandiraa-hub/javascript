<!-- 11. Create a function that returns true if an integer is evenly divisible by 5, 
and false otherwise.
 -->
<!DOCTYPE html>
<html>
<head>
    <title>Divisibility Checker</title>
</head>
<body>
    <h2>Check if a Number is Evenly Divisible by 5</h2>
    <form method="post">
        <label for="number">Enter an Integer:</label>
        <input type="number" id="number" name="number" value="<?php echo isset($_POST['number']) ? $_POST['number'] : ''; ?>"><br><br>
        <input type="submit" value="Check Divisibility">
    </form>

    <?php
    function isEvenlyDivisibleBy5($number) {
        return $number % 5 === 0;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];
        $result = isEvenlyDivisibleBy5($number);
        if ($result) {
            echo "<h3>The number $number is evenly divisible by 5.</h3>";
        } else {
            echo "<h3>The number $number is not evenly divisible by 5.</h3>";
        }
    }
    ?>
</body>
</html>