<?php

class Person{
public string $name;
public int $age;
public  ?string $address = null;
}

$person1 = new Person();
$person2 = new Person();
$person1->name = "Alice Smith";
$person1->address = "xxxx";
$person1->age = 25;
// Memanipulasi properties
$person1->address = "123 Main St";
echo json_encode($person1);
$person2->name = "Bob Brown";
$person2->age = 35;
echo "<br>";
echo json_encode($person2);
