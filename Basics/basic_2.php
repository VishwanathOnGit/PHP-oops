<?php

// Constructor and Destructor

class User {

    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function sayHello() {
        return "Hello " .$this->name;
    }
    public function sayAge() {
        return "Your Age is " .$this->age;
    }
}

$user1 = new User("Vishwanath", 24);
echo $user1->sayHello();
echo "<br>";
echo $user1->sayAge();
