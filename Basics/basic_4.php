<?php

// Inheritance

class User
{
    protected $name;
    protected $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

class Customer extends User
{
    private $balance;

    public function __construct($name, $age, $balance)
    {
        parent::__construct($name, $age);
        $this->balance = $balance;
    }

    public function pay($amount)
    {
        return $this->name . " Pays $" . $amount;
    }

    public function getBalance()
    {
        return $this->balance;
    }
}


$customer = new Customer("Vishu", 24, 500);
// echo $customer->pay(100);
echo $customer->getBalance();
