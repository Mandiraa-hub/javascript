<!-- 9. Create a function that takes the number of wins, draws and losses and calculates the 
number of points a football team has obtained so far.
wins get 3 points
draws get 1 point
losses get 0 points
Write PHP program to calculate total number of point of all the games asking input from 
user using form. -->
<!DOCTYPE html>
<html>
<head>
    <title>Football Team Points Calculator</title>
</head>
<body>
    <h2>Football Team Points Calculator</h2>
    <form method="post">
        <label for="wins">Number of Wins:</label>
        <input type="number" id="wins" name="wins" required><br><br>
        <label for="draws">Number of Draws:</label>
        <input type="number" id="draws" name="draws" required><br><br>
        <label for="losses">Number of Losses:</label>
        <input type="number" id="losses" name="losses" required><br><br>
        <input type="submit" value="Calculate Total Points">
    </form>

    <?php
    function calculateTotalPoints($wins, $draws, $losses) {
        $winPoints = $wins * 3;
        $drawPoints = $draws * 1;
        $lossPoints = $losses * 0;
        return $winPoints + $drawPoints + $lossPoints;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $wins = $_POST['wins'];
        $draws = $_POST['draws'];
        $losses = $_POST['losses'];
        $totalPoints = calculateTotalPoints($wins, $draws, $losses);
        echo "<h3>The total number of points is: " . $totalPoints . " points.</h3>";
    }
    ?>
</body>
</html>