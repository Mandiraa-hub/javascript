<!-- 6. Create 3 classes – User, AdminUser and Customer.
class User
 Should have 3 protected properties: $name , $surname and $username;
 Set their values using a constructor method;
 Add 1 protected property $is_admin. Its default value should be false;
 Create a method that checks if the user is admin;
 Create a method that prints the user’s full name. If the user is admin, 
print (admin) at the end.
class Customer
 Should extend the User class;
 Add 3 private properties: $city, $state, $country;
 The Customer’s class constructor should have the same parameters as the parent 
constructor;
 For the other properties create setter and getter methods;
 Create a method location() that returns ‘$city, $state, $country’.
class AdminUser
 Should extend the User class;
 The constructor should have the same parameters as the parent constructor;
 The constructor should set the value of the $is_admin property to true.
Create objects from each class. Print the full name and is_admin values for each object, 
and additionally the location (city, state and country) for the customer objects only.
 -->
 <?php

// Base User class
class User {
    protected $name;
    protected $surname;
    protected $username;
    protected $is_admin = false;

    public function __construct($name, $surname, $username) {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
    }

    // Check if the user is an admin
    public function isAdmin() {
        return $this->is_admin;
    }

    // Get the full name of the user
    public function getFullName() {
        $fullName = "{$this->name} {$this->surname}";
        if ($this->is_admin) {
            $fullName .= " (admin)";
        }
        return $fullName;
    }
}

// Customer class extending User
class Customer extends User {
    private $city;
    private $state;
    private $country;

    public function __construct($name, $surname, $username) {
        parent::__construct($name, $surname, $username);
    }

    // Setters
    public function setCity($city) {
        $this->city = $city;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    // Getters
    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getCountry() {
        return $this->country;
    }

    // Get the location of the customer
    public function getLocation() {
        return "{$this->city}, {$this->state}, {$this->country}";
    }
}

// AdminUser class extending User
class AdminUser extends User {
    public function __construct($name, $surname, $username) {
        parent::__construct($name, $surname, $username);
        $this->is_admin = true;
    }
}

// Create instances
$user = new User("John", "Doe", "johndoe");
$admin = new AdminUser("Admin", "Smith", "adminsmith");
$customer = new Customer("Alice", "Brown", "alicebrown");

// Set location for the customer
$customer->setCity("New York");
$customer->setState("NY");
$customer->setCountry("USA");

// Display information
echo "User Full Name: " . $user->getFullName() . "<br>";
echo "Is Admin: " . ($user->isAdmin() ? "Yes" : "No") . "<br><br>";

echo "Admin Full Name: " . $admin->getFullName() . "<br>";
echo "Is Admin: " . ($admin->isAdmin() ? "Yes" : "No") . "<br><br>";

echo "Customer Full Name: " . $customer->getFullName() . "<br>";
echo "Is Admin: " . ($customer->isAdmin() ? "Yes" : "No") . "<br>";
echo "Location: " . $customer->getLocation() . "<br>";

?>
