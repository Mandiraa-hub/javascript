<!-- 4. Create a class called Product.
The class should have 3 properties: $description, $quantity and $price Create constructor 
method accepting 3 arguments ($description, $quantity and $price).

In the constructor, when setting these arguments, check if the description is a string and if the quantity and 
price are numbers. If they are not, print an error message.

Create setter and getter methods for the $description, $quantity and $price properties. 
Create a method called calculatePrice() that will return the product’s price as: $quantity * 
$price; 
Create an object from the Product class. Print all properties in newlines and then 
print the result from the calculatePrice() method.-->

<?php
class Product{
    private $description;
    private $quantity;
    private $price;

    public function __construct($description, $quantity, $price){
        if(is_string($description) && is_numeric($quantity) && is_numeric($price)){
            $this->description = $description;
            $this->quantity = $quantity;
            $this->price = $price;
        }else{
            echo "Error: Description must be a string and quantity and price must be numbers.";
        }
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function getPrice(){
        return $this->price;
    }
    public function calculatePrice(){
        return $this->quantity * $this->price;
    }
   
}
$product = new Product("Laptop", 2, 500);
echo $product->getDescription() . "<br>";
echo $product->getQuantity() . "<br>";
echo $product->getPrice() . "<br>";
echo $product->calculatePrice();
?>