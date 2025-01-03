<!-- 1. Create a Car class with the following properties and methods:
 Properties: $make, $model, $year.

 Methods:
o start(): Print "Car started."
o displayInfo(): Print the car's make, model, and year.

 Implement Encapsulation : Modify the Car class:
o Make properties private.
o Add getter and setter methods for $make, $model, and $year

 Create a ElectricCar class that extends the Car class, 
o Add a new property $batteryCapacity and method charge()
o Add a getDescription() method in the Car class and override it in the 

ElectricCar class.
 Create an interface Vehicle with methods startEngine() and stopEngine(). Implement 
this interface in the Car class. -->
<?php

// Interface definition
interface Vehicle {
    public function startEngine();
    public function stopEngine();
}

// Car Class
class Car implements Vehicle {
    // Private properties
    
    private $make;
    private $model;
    private $year;

    // Constructor to initialize the properties
    public function __construct($make, $model, $year) {
        //$this->make refers to the make property of the current object.
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Getter and Setter for $make
    public function getMake() {
        return $this->make;
    }
    public function setMake($make) {
        $this->make = $make;
    }

    // Getter and Setter for $model
    public function getModel() {
        return $this->model;
    }
    public function setModel($model) {
        $this->model = $model;
    }

    // Getter and Setter for $year
    public function getYear() {
        return $this->year;
    }
    public function setYear($year) {
        $this->year = $year;
    }

    // Method to start the car
    public function start() {
        echo "Car started.<br>";
    }

    // Method to display car information
    public function displayInfo() {
        // $this->make refers to the make property of the current object.
        echo "Make: {$this->make}, Model: {$this->model}, Year: {$this->year}<br>";
    }

    // Method from Vehicle interface
    public function startEngine() {
        echo "Engine started.<br>";
    }

    // Method from Vehicle interface
    public function stopEngine() {
        echo "Engine stopped.<br>";
    }

    // Get description method
    public function getDescription() {
        return "This is a {$this->year} {$this->make} {$this->model}.";
    }
}

// ElectricCar Class extending Car
class ElectricCar extends Car {
    // Additional property
    private $batteryCapacity;

    // Constructor to initialize ElectricCar properties
    public function __construct($make, $model, $year, $batteryCapacity) {
        // Call parent class constructor to get the properties of Car class like make, model, year
        parent::__construct($make, $model, $year);
        $this->batteryCapacity = $batteryCapacity;
    }

    // Method to charge the electric car
    public function charge() {
        echo "Electric car charging...<br>";
    }

    // Overriding getDescription method
    public function getDescription() {
        // Call parent class getDescription method and concatenate additional information
        return parent::getDescription() . " It has a battery capacity of {$this->batteryCapacity} kWh.<br>";
    }

    // Getter and Setter for $batteryCapacity
    public function getBatteryCapacity() {
        return $this->batteryCapacity;
    }
    public function setBatteryCapacity($batteryCapacity) {
        $this->batteryCapacity = $batteryCapacity;
    }
}

// Usage
// Create a Car object
$car = new Car("Toyota", "Corolla", 2020);
$car->start();
$car->displayInfo();
$car->startEngine();
$car->stopEngine();
echo $car->getDescription();

echo "<br><br>Electric Car<br><br>";
// Create an ElectricCar object
$electricCar = new ElectricCar("Tesla", "Model S", 2023, 100);
$electricCar->start();
$electricCar->displayInfo();
$electricCar->charge();
echo $electricCar->getDescription();

?>
