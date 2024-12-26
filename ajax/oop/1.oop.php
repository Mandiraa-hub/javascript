<?php
class Car{
    public $year;
    public $model;
    public $company;
    public $speed = 0;

    function _construct($y,$m,$c){
        $this->year =$y;
        $this->model =$m;
        $this->company= $c;
    }

function _destruct(){
    echo "Process Completed";
}
    public function startEngine(){
        echo "<br/>Engine Started";
    }
    public function stopEngine(){
        echo "<br/>Engine Stopped";
        $this->speed = 0;
    }
    public function accelerate(){
        $this->speed  += 5;
        echo $this->printSpeed();
    }
    public function printDetails(){
        echo "<br/>Company: " . $this->company . 
        "<br/>Model: " . $this->model . 
        "<br/>Year:" . $this->year. 
        "<br/>Current Speed:" . $this->speed;
    }
    public function printSpeed(){
        return "<br/>Current Speed:" . $this->speed;
    }
}
$car1 = new Car(2023,'BYD','EV-98');
$car1->year = 2023;
$car1->company = 'BYD';
$car1->model = 'EV-98';
print_r($car1);
$car1->startEngine();
$car1->accelerate();
$car1->accelerate();

$car1->printDetails();
$car1->stopEngine();
echo $car1->printSpeed();
?>
