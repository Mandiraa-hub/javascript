<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Interest </title>
  <style>
    h2
    {
        text-align:center;
        margin-right:100px;
        
    }
form
{
  border:12px solid purple;
  width: 300px;
  padding-left:80px;
  border-radius: 15px 15px; 
  
}
 .form-group {
  margin-bottom: 20px;
 }

input[type="number"]{
  border:1px solid red;
  display: block;
  align-items: center;
  height:30px;
  border-radius:5px;
  width: 200px;
}
input[type="submit"]
{
height:30px;
width: 200px;
color:white;
background-color: purple;
}
  </style>
</head>
<body>



<form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Simple Interest </h2>
  <div class="form-group">
    <label for="principal">Principal</label>
    <input type="number" id="principal" name="principal" required>
  </div>
  <div class="form-group">
    <label for="rate">Rate of Interest</label>
    <input type="number" id="rate" name="rate" required>
  </div>
  <div class="form-group">
    <label for="time">Time</label>
    <input type="number" id="time" name="time" required>
  </div>
  <?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $principal = (float)$_POST["principal"];
  $rate = (float)$_POST["rate"] / 100;  // Convert rate to decimal
  $time = (float)$_POST["time"];

  // Check if calculating simple or compound interest
  if (isset($_POST["simple"])) {
    $interest = $principal * $rate * $time;
    $amount = $principal + $interest;
    echo "<p>Interest: $$interest</p>";
    echo "<p>Total Amount: $$amount</p>";
  }
}
?>
  <div class="form-group">
    <input type="submit" value="Calculate" name="simple">
    <br>
</div>
    
</form>



</body>
</html>
