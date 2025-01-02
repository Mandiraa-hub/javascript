<!-- 16. A typical car can hold four passengers and one driver, allowing five people to travel 
around. Given n number of people, return how many cars are needed to seat everyone 
comfortably.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Find the total number of Car Needed according to people</h2>
    <form action="" method="post">
        <label for="people">Enter the number of people:</label>
        <input type="number" id="people" name="people" required>
        <button type="submit">Calculate</button>
    </form>
</body>
</html>
 <?php
function carsNeeded($people) {
    // Each car can hold 5 people (4 passengers + 1 driver)
    $peoplePerCar = 5;
    
    // Calculate the number of cars needed
    $cars = ceil($people / $peoplePerCar);
    
    return $cars;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $people = $_POST['people'];
    $cars = carsNeeded($people);
    echo "<h3>The total number of cars needed is: " . $cars . "</h3>";
}


?>
