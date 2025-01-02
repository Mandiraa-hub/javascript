<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nepalese Income Tax Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        .calculator h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .calculator label {
            display: block;
            margin: 10px 0 5px;
        }
        .calculator input,
        .calculator select,
        .calculator button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .calculator button {
            background-color: #5e42a6;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .calculator button:hover {
            background-color: #482d86;
        }
        .result {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Nepalese Income Tax Calculator</h2>
        <form method="POST">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="status">Marital Status:</label>
            <select id="status" name="status" required>
                <option value="married">Married</option>
                <option value="unmarried">Unmarried</option>
            </select>

            <label for="monthly_salary">Monthly Salary:</label>
            <input type="text" id="monthly_salary" name="monthly_salary" required>

            <label for="annual_income">Annual Gross Salary:</label>
            <input type="text" id="annual_income" name="annual_income" required>

            <button type="submit">Calculate Tax</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $gender = $_POST['gender'];
            $status = $_POST['status'];
            $monthly_salary = trim($_POST['monthly_salary']);
            $annual_income = trim($_POST['annual_income']);
            $errors = [];

            // Validate inputs
            if (!is_numeric($monthly_salary) || $monthly_salary <= 0) {
                $errors[] = "Please enter a valid monthly salary.";
            }
            if (!is_numeric($annual_income) || $annual_income <= 0) {
                $errors[] = "Please enter a valid annual income.";
            }

            if (empty($errors)) {
                $tax = 0;

                if ($status == "married") {
                    if ($annual_income <= 450000) {
                        $tax = $annual_income * 0.01;
                    } elseif ($annual_income <= 550000) {
                        $tax = 4500 + ($annual_income - 450000) * 0.1;
                    } elseif ($annual_income <= 750000) {
                        $tax = 14500 + ($annual_income - 550000) * 0.2;
                    } elseif ($annual_income <= 1300000) {
                        $tax = 54500 + ($annual_income - 750000) * 0.3;
                    } else {
                        $tax = 219500 + ($annual_income - 1300000) * 0.35;
                    }
                } else {
                    if ($annual_income <= 400000) {
                        $tax = $annual_income * 0.01;
                    } elseif ($annual_income <= 500000) {
                        $tax = 4000 + ($annual_income - 400000) * 0.1;
                    } elseif ($annual_income <= 750000) {
                        $tax = 14000 + ($annual_income - 500000) * 0.2;
                    } elseif ($annual_income <= 1300000) {
                        $tax = 64000 + ($annual_income - 750000) * 0.3;
                    } else {
                        $tax = 239000 + ($annual_income - 1300000) * 0.35;
                    }
                }

                if ($gender == "female") {
                    $tax *= 0.9;  // 10% tax discount
                }

                echo "<div class='result'>Annual Tax: NPR " . number_format($tax, 2) . "</div>";
            } else {
                foreach ($errors as $error) {
                    echo "<div class='result'>$error</div>";
                }
            }
        }
        ?>
    </div>
</body>
</html>