<?php
// CLASSES BASICS

class User {

    public $user;

    public function sayHello() {
        return "Hello " .$this->user;
    }
}

$user1 = new User();
$user1->user = "Vishwanath";
echo $user1->sayHello();
echo "<br>";
$user2 = new User();
$user2->user = "TheUnOrthodoxGuy";
echo $user2->sayHello();
?>