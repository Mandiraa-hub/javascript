<!-- 1. Write a PHP program to create variable with different datatypes,
a. Print all the data using echo and print
b. Display content of array using print_r and var_dump
c. Display result of checking data types. -->

<?php
// Creating variables with different data types
$integerVar = 42;          // Integer
$floatVar = 3.14;          // Float
$stringVar = "Hello, PHP!"; // String
$booleanVar = true;        // Boolean
$arrayVar = array("PHP", "JavaScript", "Python"); // Array

// a. Print all the data using echo 
echo "Integer: $integerVar<br>";
echo "Float: $floatVar<br>";
echo "String: $stringVar<br>";
echo "Boolean: " . ($booleanVar ? "true" : "false") . "<br>";
echo "Array: ";
print_r($arrayVar);
echo "<br>";
//Print all the data using print
print "<h3>Printing Data Using print:</h3>";
print "Integer: $integerVar<br>";
print "Float: $floatVar<br>";
print "String: $stringVar<br>";
print "Boolean: " . ($booleanVar ? "true" : "false") . "<br>";
print "Array: ";
print_r($arrayVar);
print "<br>";

// b. Display content of array using print_r and var_dump
echo "<h3>Displaying Array Using print_r:</h3>";
print_r($arrayVar);
echo "<br>";

echo "<h3>Displaying Array Using var_dump:</h3>";
var_dump($arrayVar);
echo "<br>";

// c. Display result of checking data types
echo "<h3>Checking Data Types:</h3>";
echo "Is \$integerVar an integer? " . (is_int($integerVar) ? "Yes" : "No") . "<br>";
echo "Is \$floatVar a float? " . (is_float($floatVar) ? "Yes" : "No") . "<br>";
echo "Is \$stringVar a string? " . (is_string($stringVar) ? "Yes" : "No") . "<br>";
echo "Is \$booleanVar a boolean? " . (is_bool($booleanVar) ? "Yes" : "No") . "<br>";
echo "Is \$arrayVar an array? " . (is_array($arrayVar) ? "Yes" : "No") . "<br>";
?>
