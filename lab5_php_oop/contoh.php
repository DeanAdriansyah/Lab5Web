<?php
class Person {
  // properti
  public $name;
  public $age;
  
  // konstruktor
  function __construct($name, $age) {
    $this->name = $name;
    $this->age = $age;
  }

  // metode
  function say_hello() {
    echo "Hello, my name is " . $this->name . " and I am " . $this->age . " years old.";
  }
}

// membuat objek dari kelas Person
$person1 = new Person("John", 25);

// memanggil metode say_hello
$person1->say_hello();
?>
