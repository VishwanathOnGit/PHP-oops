<?php

// Traits
trait myName
{
    public function msg1()
    {
        return "MyName trait is being executed";
    }
}

class Customer
{
    use myName;
}

$customer = new Customer;
echo $customer->msg1();