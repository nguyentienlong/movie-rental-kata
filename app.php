<?php

spl_autoload_register(function ($class_name) {
    $class_name =  str_replace('\\', '/', $class_name);
    require_once  __DIR__ . '/app/' . $class_name . '.php';
});

use MovieRental\RegularMovie;
use MovieRental\Rental;
use MovieRental\Customer;
use MovieRental\ChildrenMovie;

$movie = new RegularMovie("Transformer");
$rental = new Rental($movie, 3);
$customer = new Customer("jpartogi");
$customer->addRental($rental);
$customer->calculateRentalFee();
$customer->calculateFrequentRentalPoint();
$statement = $customer->printStatement();
print_r($statement);
