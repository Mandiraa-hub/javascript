<!-- 3. Create a class called Student. The class should have:
 3 public properties: $name, $surname and $country;
 1 private property: $tuition;
 1 protected property: $indexNumber.
o Create getter methods for the name and the surname of the student. Create a 
public method helloWorld() that will return “Hello World” string. Create a 
protected method helloFamily() that will return “Hello Family” string. Create a 
private method helloMe() that will return “Hello me!” string. Create a private 
getter method getTuition() that will print the value of the tuition property. Do not 
use a constructor with arguments. Create a subclass PartTimeStudent. Add a 
public method helloParent() that will call the method helloFamily() from the 
Student class. Create objects from both the Student and the PartTimeStudent 
classes, and call all the methods within. -->
<?php
class Student {
    public $name;
    public $surname;
    public $country;
    private $tuition;
    protected $indexNumber;

    public function __construct($name, $surname, $country) {
        $this->name = $name;
        $this->surname = $surname;
        $this->country = $country;
    }

    // Getter methods for name and surname
    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    // Public method helloWorld
    public function helloWorld() {
        return "Hello World";
    }

    // Protected method helloFamily
    protected function helloFamily() {
        return "Hello Family";
    }

    // Private method helloMe
    private function helloMe() {
        return "Hello me!";
    }

    // Private getter method for tuition
    private function getTuition() {
        return $this->tuition;
    }
}

class PartTimeStudent extends Student {
    // Public method helloParent that calls protected method helloFamily
    public function helloParent() {
        return $this->helloFamily();
    }
}

// Instantiate the Student class
$student = new Student("John", "Doe", "USA");

echo "<h3>Student:</h3>";
echo $student->helloWorld() . "<br>"; // Access public method
echo "Name: " . $student->getName() . "<br>";
echo "Surname: " . $student->getSurname() . "<br>";
echo "Country: " . $student->country . "<br>";

// Instantiate the PartTimeStudent class
$partTimeStudent = new PartTimeStudent("Jane", "Smith", "Canada");

echo "<h3>Part-Time Student:</h3>";
echo $partTimeStudent->helloWorld() . "<br>"; // Access public method
echo "Name: " . $partTimeStudent->getName() . "<br>";
echo "Surname: " . $partTimeStudent->getSurname() . "<br>";
echo "Country: " . $partTimeStudent->country . "<br>";
echo "Calling protected method through public helloParent(): " . $partTimeStudent->helloParent() . "<br>";
//echo "Calling private method helloMe(): " . $partTimeStudent->helloMe() . "<br>"; // Error
?>