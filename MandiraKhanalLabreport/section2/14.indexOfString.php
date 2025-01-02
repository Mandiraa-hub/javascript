<!-- 14. Create a function that takes an array and a string as arguments and returns the index of 
the string -->
<!DOCTYPE html>
<html>
<head>
    <title>Index of String in Array</title>
</head>
<body>
    <h2>Index of String in Array</h2>
    <form method="post">
        <label for="array">Enter Array (comma-separated):</label>
        <input type="text" id="array" name="array" required value="<?php echo isset($_POST['array']) ? $_POST['array'] : ''; ?>"><br><br>
        <label for="string">Enter String to Find:</label>
        <input type="text" id="string" name="string" required value="<?php echo isset($_POST['string']) ? $_POST['string'] : ''; ?>"><br><br>
        <input type="submit" value="Find Index">
    </form>

    <?php
    function indexOfString($array, $string) {
        return array_search($string, $array);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $array = explode(',', $_POST['array']);
        $string = $_POST['string'];
        $index = indexOfString($array, $string);
        if ($index !== false) {
            echo "<h3>The index of '$string' in the array is: " . $index . ".</h3>";
        } else {
            echo "<h3>The string '$string' was not found in the array.</h3>";
        }
    }
    ?>
</body>
</html>