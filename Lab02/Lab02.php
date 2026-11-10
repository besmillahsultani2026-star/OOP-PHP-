
<?php


class Library
{
    const MAX_BOOKS = 3;
}

echo "<h2>Task 1: Class Constant</h2>";

echo "Maximum books allowed: " . Library::MAX_BOOKS;

echo "<br><br>";

class StudentCounter
{
    public static $count = 0;

    public static function addStudent()
    {
        self::$count++;
    }
}

StudentCounter::addStudent();
StudentCounter::addStudent();
StudentCounter::addStudent();

echo "<h2>Task 2: Static Property and Method</h2>";

echo "Total students: " . StudentCounter::$count;

echo "<br><br>";

abstract class Vehicle
{
    abstract public function start(?string $message = null);
}

class Car extends Vehicle
{
    public function start(?string $message = null)
    {
        echo $message ?? "Car engine started.";
    }
}

class Bike extends Vehicle
{
    public function start(?string $message = null)
    {
        echo $message ?? "Bike started.";
    }
}

echo "<h2>Task 3: Abstract Class and Method</h2>";

$myCar = new Car();
$myBike = new Bike();

$myCar->start("Car engine started.");

echo "<br>";

$myBike->start();

?>
