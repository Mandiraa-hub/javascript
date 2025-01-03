<!-- 7. Implement interface in PHP with specific properties (e.g., radius for Circle class and side
for Square class) to ensure that multiple classes provide their own implementations of a 
method (e.g., calculateArea), while leveraging these properties for calculations. -->
<?php

// Define the Shape interface
interface Shape {
    // Abstract method to calculate area
    public function calculateArea();
}

// Circle class implementing Shape interface
class Circle implements Shape {
    private $radius;

    // Constructor to initialize radius
    public function __construct($radius) {
        $this->radius = $radius;
    }

    // Implementation of calculateArea for Circle
    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}

// Square class implementing Shape interface
class Square implements Shape {
    private $side;

    // Constructor to initialize side
    public function __construct($side) {
        $this->side = $side;
    }

    // Implementation of calculateArea for Square
    public function calculateArea() {
        return pow($this->side, 2);
    }
}

// Create objects and calculate area
$circle = new Circle(5); // Radius = 5
$square = new Square(4); // Side = 4

echo "Area of Circle: " . $circle->calculateArea() . " square units<br>";
echo "Area of Square: " . $square->calculateArea() . " square units<br>";

?>
