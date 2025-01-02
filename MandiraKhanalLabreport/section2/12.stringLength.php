<!-- 12. Write a function that returns the length of a string. Make your function recursive -->
 <!DOCTYPE html>
<html>
<head>
    <title>String Length Calculator</title>
</head>
<body>
    <h2>String Length Calculator</h2>
    <form method="post">
        <label for="string">Enter a String:</label>
        <input type="text" id="string" name="string" required value="<?php echo isset($_POST['string']) ? $_POST['string'] : ''; ?>"><br><br>
        <input type="submit" value="Calculate Length">
    </form>

    <?php
    function recursiveStringLength($str) {
        if ($str === "") {
            return 0;
        } else {
            return 1 + recursiveStringLength(substr($str, 1));
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $string = $_POST['string'];
        $length = recursiveStringLength($string);
        echo "<h3>The length of the string is: " . $length . " characters.</h3>";
    }
    ?>
</body>
</html>