<!-- 24. Write a PHP program to convert the last 3 characters of a given string in upper case. If 
the length of the string has less than 3 then uppercase all the characters -->
<!DOCTYPE html>
<html>
<head>
    <title>Convert Last 3 Characters to Uppercase</title>
</head>
<body>
    <h2>Convert Last 3 Characters to Uppercase</h2>
    <form method="post">
        <label for="inputString">Enter a String:</label>
        <input type="text" id="inputString" name="inputString" required value="<?php echo isset($_POST['inputString']) ? $_POST['inputString'] : ''; ?>"><br><br>
        <input type="submit" value="Process String">
    </form>

    <?php
    function convertLast3CharsToUpper($str) {
        if (strlen($str) < 3) {
            return strtoupper($str);
        } else {
            $front = substr($str, 0, -3);
            $last3 = substr($str, -3);
            return $front . strtoupper($last3);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];
        $result = convertLast3CharsToUpper($inputString);
        echo "<h3>The result is: " . $result . ".</h3>";
    }
    ?>
</body>
</html>