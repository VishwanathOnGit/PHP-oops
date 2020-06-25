<?php

// Getters and Setters

class User
{

    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }
}

$user1 = new User("Vishwanath", 24);
$user1->__set('name', "TheUnOrthodoxGuy");
echo $user1->__get('name');
