<?php

// Abstract Class

abstract class User
{
    protected $name;
    protected $age;

    // public function __construct($name, $age)
    public function __construct()
    {
        // $this->name = $name;
        // $this->age = $age;
        // echo "Constructor Running";
    }
    abstract function getTitle();
}

class Customer extends User
{
    private $balance;
    private $title;

    // public function __construct($name, $age, $balance)
    public function __construct($balance, $title)
    {
        // parent::__construct($name, $age);
        parent::__construct();
        $this->balance = $balance;
        $this->title = $title;
    }

    public function pay($amount)
    {
        return $this->name . " Pays $" . $amount;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getBalance()
    {
        return $this->balance;
    }
}

// $user = new User;
$customer = new Customer(500, "UPI");
// echo $customer->pay(100);
echo $customer->getBalance();
echo $customer->getTitle();
