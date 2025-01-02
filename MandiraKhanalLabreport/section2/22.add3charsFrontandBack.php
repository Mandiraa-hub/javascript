<!-- 22. Write a PHP program to create a new string taking the first 3 characters of a given string 
and return the string with the 3 characters added at both the front and back. If the given 
string length is less than 3, use whatever characters are there.
 -->
<!DOCTYPE html>
<html>
<head>
    <title>Add 3 Characters to Front and Back</title>
</head>
<body>
    <h2>Add 3 Characters to Front and Back</h2>
    <form method="post">
        <label for="inputString">Enter a String:</label>
        <input type="text" id="inputString" name="inputString" required value="<?php echo isset($_POST['inputString']) ? $_POST['inputString'] : ''; ?>"><br><br>
        <input type="submit" value="Process String">
    </form>

    <?php
    function add3CharsFrontAndBack($str) {
        $front = substr($str, 0, 3);
        return $front . $str . $front;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];
        $result = add3CharsFrontAndBack($inputString);
        echo "<h3>The result is: " . $result . ".</h3>";
    }
    ?>
</body>
</html>