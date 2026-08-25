<?php

class Student
{
    public $name;
    public $studentId;
    public $department;

    function __construct($name, $studentId, $department)
    {
        $this->name = $name;
        $this->studentId = $studentId;
        $this->department = $department;
    }

    function showInfo()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Student ID: " . $this->studentId . "<br>";
        echo "Department: " . $this->department . "<br>";
    }
}

$student1 = new Student(
    "Ahmad",
    1001,
    "Computer Science"
);

$student1->showInfo();

echo "<br>";

$student2 = new Student(
    "Sara",
    1002,
    "Information Systems"
);

$student2->showInfo();

?>