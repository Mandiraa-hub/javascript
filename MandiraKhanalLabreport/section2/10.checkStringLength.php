<!-- 10. Create a function that takes two strings as arguments and return 
either true or false depending on whether the total number of characters in the first string 
is equal to the total number of characters in the second string.
 -->
<!DOCTYPE html>
<html>
<head>
    <title>String Length Checker</title>
</head>
<body>
    <h2>String Length Checker</h2>
    <form method="post">
        <label for="string1">First String:</label>
        <input type="text" id="string1" name="string1" required><br><br>
        <label for="string2">Second String:</label>
        <input type="text" id="string2" name="string2" required><br><br>
        <input type="submit" value="Check Lengths">
    </form>

    <?php
    function checkStringLength($str1, $str2) {
        return strlen($str1) === strlen($str2);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $string1 = $_POST['string1'];
        $string2 = $_POST['string2'];
        $result = checkStringLength($string1, $string2);
        if ($result) {
            echo "<h3>The lengths of the two strings are equal.</h3>";
        } else {
            echo "<h3>The lengths of the two strings are not equal.</h3>";
        }
    }
    ?>
</body>
</html>