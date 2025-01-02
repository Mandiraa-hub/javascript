<!-- Write a PHP program to create a new string which is 4 copies of the 2 front characters of 
a given string. If the given string length is less than 2 return the original string.
 -->
<!DOCTYPE html>
<html>
<head>
    <title>Duplicate Characters</title>
</head>
<body>
    <h2>Duplicate Characters</h2>
    <form method="post">
        <label for="inputString">Enter a String:</label>
        <input type="text" id="inputString" name="inputString" required value="<?php echo isset($_POST['inputString']) ? $_POST['inputString'] : ''; ?>"><br><br>
        <input type="submit" value="Process String">
    </form>

    <?php
    function duplicateCharacters($str) {
        if (strlen($str) < 2) {
            return $str;
        } else {
            $front = substr($str, 0, 2);
            return str_repeat($front, 4);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];
        $result = duplicateCharacters($inputString);
        echo "<h3>The result is: " . $result . ".</h3>";
    }
    ?>
</body>
</html>