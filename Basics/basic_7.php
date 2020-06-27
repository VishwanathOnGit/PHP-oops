<?php

// Traits


class Customer
{
    public function __construct()
    {
        self::msg1();
    }
    public static function msg1()
    {
        return "Static function msg1";
    }
}

class Namer extends Customer
{
    public $name;

    public function __construct()
    {
        $this->name = parent::msg1();
        echo $this->name;
    }
}

// $customer = new Customer;
$cust1 = new Namer;
