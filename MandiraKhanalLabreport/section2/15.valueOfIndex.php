<!-- 15. Given an index and an array, return the value of the array with the given index. -->
 <!DOCTYPE html>
<html>
<head>
    <title>Value at Index in Array</title>
</head>
<body>
    <h2>Value at Index in Array</h2>
    <form method="post">
        <label for="array">Enter Array (comma-separated):</label>
        <input type="text" id="array" name="array" required value="<?php echo isset($_POST['array']) ? $_POST['array'] : ''; ?>"><br><br>
        <label for="index">Enter Index:</label>
        <input type="number" id="index" name="index" required value="<?php echo isset($_POST['index']) ? $_POST['index'] : ''; ?>"><br><br>
        <input type="submit" value="Get Value">
    </form>

    <?php
    function valueAtIndex($array, $index) {
        if (isset($array[$index])) {
            return $array[$index];
        } else {
            return "Index out of bounds";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $array = explode(',', $_POST['array']);
        $index = $_POST['index'];
        $value = valueAtIndex($array, $index);
        echo "<h3>The value at index $index is: " . $value . ".</h3>";
    }
    ?>
</body>
</html>