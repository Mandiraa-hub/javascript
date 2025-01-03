<!-- 2. Create a class called Bicycle.
 The class should have 5 public properties: $brand, $model, $year, $description 
and $weight.
Default value for the $description property is “Used bicycle” (hint: 
you can set it either when declaring the property or through the constructor). 

Create getInfo method (a getter) that will return information about the bike in the 
following format: “$brand $model ($year)”.

 Create getWeight method that will return weight in grams. Make this method 
configurable so that it accepts one argument which by default is false. If it is true, 
the weight should be returned in kilograms and if it is false (default), it should 
return weight in grams. 
Create a setter method for the weight property. The 
weight property stores the weight in grams. Create two objects from the Bicycle 
class and set values for all properties.

rint each bike’s information. Print each 
bike’s weight in kilograms. Print each bike’s weight in grams. -->

<?php

class Bicycle {
    // Properties
    public $brand;
    public $model;
    public $year;
    public $description;
    private $weight; // Stores weight in grams

    // Constructor
    public function __construct($brand, $model, $year, $description = "Used bicycle") {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->description = $description;
    }

    // Getter for bike info
    public function getInfo() {
        return "{$this->brand} {$this->model} ({$this->year})";
    }

    // Setter for weight
    public function setWeight($weightInGrams) {
        if ($weightInGrams > 0) {
            $this->weight = $weightInGrams;
        } else {
            echo "Weight must be a positive number.<br>";
        }
    }

    // Getter for weight
    public function getWeight($inKilograms = false) {
        if ($inKilograms) {
            return $this->weight / 1000 . " kg";
        } else {
            return $this->weight . " grams";
        }
    }
}

// Create two Bicycle objects
$bicycle1 = new Bicycle("Trek", "Domane", 2022, "High-performance road bike");
$bicycle1->setWeight(8500); // Weight in grams

$bicycle2 = new Bicycle("Giant", "Defy", 2021);
$bicycle2->setWeight(9000); // Weight in grams

// Print information and weights of each bike
echo "<h3>Bicycle 1:</h3>";
echo "Info: " . $bicycle1->getInfo() . "<br>";
echo "Description: " . $bicycle1->description . "<br>";
echo "Weight: " . $bicycle1->getWeight() . "<br>";
echo "Weight (in kilograms): " . $bicycle1->getWeight(true) . "<br>";

echo "<h3>Bicycle 2:</h3>";
echo "Info: " . $bicycle2->getInfo() . "<br>";
echo "Description: " . $bicycle2->description . "<br>";
echo "Weight: " . $bicycle2->getWeight() . "<br>";
echo "Weight (in kilograms): " . $bicycle2->getWeight(true) . "<br>";

?>
