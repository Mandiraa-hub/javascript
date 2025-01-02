<!-- 19. Write a PHP program to create a new string where 'if' is added to the front of a given 
string. If the string already begins with 'if', return the string unchanged. -->
<!DOCTYPE html>
<html>
<head>
    <title>Add 'if' to String</title>
</head>
<body>
    <h2>Add 'if' to String</h2>
    <form method="post">
        <label for="inputString">Enter a String:</label>
        <input type="text" id="inputString" name="inputString" required value="<?php echo isset($_POST['inputString']) ? $_POST['inputString'] : ''; ?>"><br><br>
        <input type="submit" value="Process String">
    </form>

    <?php
    function addIfToString($str) {
        //start from 0 and extract 2 characters
        if (substr($str, 0, 2) === "if") {
            return $str;
        } else {
            return "if " . $str;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];
        $result = addIfToString($inputString);
        echo "<h3>The result is: " . $result . ".</h3>";
    }
    ?>
</body>
</html>