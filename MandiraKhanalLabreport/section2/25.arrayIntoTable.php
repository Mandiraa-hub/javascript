<!-- 25. Write PHP Script to display following array into HTML table.
$info = [ 'name' => 'Ram Bahadur', 'address' => 'Lalitpur','email' => 'info@ram.com', 
'phone' => 98454545,'website' => 'www.ram.com']; -->

<!DOCTYPE html>
<html>
<head>
    <title>Display Array in HTML Table</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Display Array in HTML Table</h2>

    <?php
    $info = [
        'name' => 'Ram Bahadur',
        'address' => 'Lalitpur',
        'email' => 'info@ram.com',
        'phone' => 98454545,
        'website' => 'www.ram.com'
    ];
    ?>

    <table>
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        <?php foreach ($info as $key => $value): ?>
        <tr>
            <td><?php echo htmlspecialchars($key); ?></td>
            <td><?php echo htmlspecialchars($value); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>