<!-- 21. Write a PHP program to create a new string with the last char added at the front and back 
of a given string of length 1 or more. -->
<!DOCTYPE html>
<html>
<head>
    <title>Add Last Character to String</title>
</head>
<body>
    <h2>Add Last Character to String</h2>
    <form method="post">
        <label for="inputString">Enter a String:</label>
        <input type="text" id="inputString" name="inputString" required value="<?php echo isset($_POST['inputString']) ? $_POST['inputString'] : ''; ?>"><br><br>
        <input type="submit" value="Process String">
    </form>

    <?php
    function addLastCharToStr($str) {
        if (strlen($str) >= 1) {
            $lastChar = substr($str, -1);
            return $lastChar . $str . $lastChar;
        } else {
            return $str;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];
        $result = addLastCharToStr($inputString);
        echo "<h3>The result is: " . $result . ".</h3>";
    }
    ?>
</body>
</html>