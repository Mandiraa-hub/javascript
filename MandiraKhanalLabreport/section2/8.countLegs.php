<!-- 8. A farmer is asking you to tell him how many legs can be counted among all his animals. 
The farmer breeds three species:
chickens = 2 legs
cows = 4 legs
pigs = 4 legs
Write PHP program to calculate total number of legs of all the animals asking input from 
user using form. -->
<html>
<head>
    <title>Animal Legs Counter</title>
</head>
<body>
    <h2>Animal Legs Counter</h2>
    <form method="post">
        <label for="chickens">Number of Chickens:</label>
        <input type="number" id="chickens" name="chickens" required><br><br>
        <label for="cows">Number of Cows:</label>
        <input type="number" id="cows" name="cows" required><br><br>
        <label for="pigs">Number of Pigs:</label>
        <input type="number" id="pigs" name="pigs" required><br><br>
        <input type="submit" value="Calculate Total Legs">
    </form>

    <?php
    function calculateTotalLegs($chickens, $cows, $pigs) {
        $chickenLegs = $chickens * 2;
        $cowLegs = $cows * 4;
        $pigLegs = $pigs * 4;
        return $chickenLegs + $cowLegs + $pigLegs;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $chickens = $_POST['chickens'];
        $cows = $_POST['cows'];
        $pigs = $_POST['pigs'];
        $totalLegs = calculateTotalLegs($chickens, $cows, $pigs);
        echo "<h3>The total number of legs is: " . $totalLegs . " legs.</h3>";
    }
    ?>
</body>
</html> 