<!-- 34. Wrote PHP Script to take user marks using form and generate mark sheet when user input 
all data -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Sheet Generator</title>
</head>
<body>
    <h2>Enter Your Marks</h2>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="rollno">Roll Number:</label>
        <input type="text" id="rollno" name="rollno" required><br><br>
        <label for="web">Web Development:</label>
        <input type="number" id="web" name="web" required><br><br>
        <label for="dbms">Database Management System:</label>
        <input type="number" id="dbms" name="dbms" required><br><br>
        <label for="economics">Economics:</label>
        <input type="number" id="economics" name="economics" required><br><br>
        <label for="dsa">Data Structures and Algorithms:</label>
        <input type="number" id="dsa" name="dsa" required><br><br>
        <label for="account">Accounting:</label>
        <input type="number" id="account" name="account" required><br><br>
        <input type="submit" value="Generate Mark Sheet">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars(trim($_POST['name']));
        $rollno = htmlspecialchars(trim($_POST['rollno']));
        $web = htmlspecialchars(trim($_POST['web']));
        $dbms = htmlspecialchars(trim($_POST['dbms']));
        $economics = htmlspecialchars(trim($_POST['economics']));
        $dsa = htmlspecialchars(trim($_POST['dsa']));
        $account = htmlspecialchars(trim($_POST['account']));

        $total = $web + $dbms + $economics + $dsa + $account;
        $percentage = $total / 5;
        $result = ($web >= 40 && $dbms >= 40 && $economics >= 40 && $dsa >= 40 && $account >= 40) ? 'Pass' : 'Fail';

        echo "<h2>Mark Sheet</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Roll Number: $rollno</p>";
        echo "<table border='1'>
                <tr><th>Subject</th><th>Marks</th></tr>
                <tr><td>Web Development</td><td>$web</td></tr>
                <tr><td>Database Management System</td><td>$dbms</td></tr>
                <tr><td>Economics</td><td>$economics</td></tr>
                <tr><td>Data Structures and Algorithms</td><td>$dsa</td></tr>
                <tr><td>Accounting</td><td>$account</td></tr>
                <tr><th>Total</th><th>$total</th></tr>
                <tr><th>Percentage</th><th>$percentage%</th></tr>
                <tr><th>Result</th><th>$result</th></tr>
              </table>";
    }
    ?>
</body>
</html>