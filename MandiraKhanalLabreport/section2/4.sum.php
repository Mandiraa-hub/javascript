<!-- 4. Create a function that takes two numbers as arguments and returns their sum -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum of Two Numbers</title>
</head>
<body>
    <h1>Calculate the Sum of Two Numbers</h1>
    <form method="POST" action="">
        <label for="num1">Enter First Number:</label>
        <input type="number" id="num1" name="num1" required>
        <br><br>
        <label for="num2">Enter Second Number:</label>
        <input type="number" id="num2" name="num2" required>
        <br><br>
        <button type="submit">Calculate Sum</button>
    </form>

    <?php
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the user inputs
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        // Function to calculate the sum
        function calculateSum($a, $b) {
            return $a + $b;
        }

        // Calculate the sum
        $sum = calculateSum($num1, $num2);

        // Display the result
        echo "<h2>The sum of $num1 and $num2 is: $sum</h2>";
    }
    ?>
</body>
</html>
