<!-- 26. Write PHP Script to display student mark sheet into table, store data into PHP 
multidimensional array. -->
<!DOCTYPE html>
<html>
<head>
    <title>Student Mark Sheet</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .pass {
            background-color: green;
            color: white;
        }
        .fail {
            background-color: red;
            color: white;
        }
        .alt-row:nth-child(even) {
            background-color: black;
            color: white;
        }
        .alt-row:nth-child(odd) {
            background-color: white;
            color: black;
        }
    </style>
</head>
<body>
    <h2>Student Mark Sheet</h2>

    <?php
    $students = [
        ['sn' => 1, 'name' => 'John Doe', 'roll' => 101, 'web' => 85, 'DBMS' => 78, 'Economics' => 90, 'DSA' => 88, 'account' => 92],
        ['sn' => 2, 'name' => 'Jane Smith', 'roll' => 102, 'web' => 45, 'DBMS' => 55, 'Economics' => 60, 'DSA' => 50, 'account' => 65],
        ['sn' => 3, 'name' => 'Alice Johnson', 'roll' => 103, 'web' => 95, 'DBMS' => 88, 'Economics' => 92, 'DSA' => 90, 'account' => 94],
    ];

    foreach ($students as &$student) {
        $student['total'] = $student['web'] + $student['DBMS'] + $student['Economics'] + $student['DSA'] + $student['account'];
        $student['result'] = ($student['web'] >= 50 && $student['DBMS'] >= 50 && $student['Economics'] >= 50 && $student['DSA'] >= 50 && $student['account'] >= 50) ? 'Pass' : 'Fail';
    }
    ?>

    <h3>Table 1: Green for Pass, Red for Fail</h3>
    <table>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Web</th>
            <th>DBMS</th>
            <th>Economics</th>
            <th>DSA</th>
            <th>Account</th>
            <th>Total</th>
            <th>Result</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr class="<?php echo $student['result'] == 'Pass' ? 'pass' : 'fail'; ?>">
            <td><?php echo $student['sn']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['roll']; ?></td>
            <td><?php echo $student['web']; ?></td>
            <td><?php echo $student['DBMS']; ?></td>
            <td><?php echo $student['Economics']; ?></td>
            <td><?php echo $student['DSA']; ?></td>
            <td><?php echo $student['account']; ?></td>
            <td><?php echo $student['total']; ?></td>
            <td><?php echo $student['result']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Table 2: Alternate Black and White Rows</h3>
    <table>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Web</th>
            <th>DBMS</th>
            <th>Economics</th>
            <th>DSA</th>
            <th>Account</th>
            <th>Total</th>
            <th>Result</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr class="alt-row">
            <td><?php echo $student['sn']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['roll']; ?></td>
            <td><?php echo $student['web']; ?></td>
            <td><?php echo $student['DBMS']; ?></td>
            <td><?php echo $student['Economics']; ?></td>
            <td><?php echo $student['DSA']; ?></td>
            <td><?php echo $student['account']; ?></td>
            <td><?php echo $student['total']; ?></td>
            <td><?php echo $student['result']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>