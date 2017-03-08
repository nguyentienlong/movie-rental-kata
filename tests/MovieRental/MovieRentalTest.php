<?php

namespace Test;

use MovieRental\Customer;
use MovieRental\Movie;
use MovieRental\Rental;
use MovieRental\RegularMovie;
use MovieRental\ChildrenMovie;

class MovieRentalTest extends \PHPUnit_Framework_TestCase {

    public function testHello()
    {

        $movie  = new RegularMovie("Transformer");
        $rental = new Rental($movie, 3);

        $customer = new Customer("jpartogi");
        $customer->addRental($rental);
        $customer->calculateRentalFee();
        $customer->calculateFrequentRentalPoint();

        $statement = $customer->printStatement();

        $this->assertContains('jpartogi', $statement);

    }

    public function testGetChildrenMovieAmount()
    {
        $movie  = new ChildrenMovie("Transformer");
        $rental = new Rental($movie, 3);

        $customer = new Customer("alien");
        $customer->addRental($rental);
        $rentalFee = $customer->calculateRentalFee();

        $this->assertEquals($rentalFee, 1.5);
    }

    public function testGetChildrenMovieAmountWithRentalDayGt3()
    {
        $movie  = new ChildrenMovie("Transformer");
        $rental = new Rental($movie, 4);

        $customer = new Customer("alien");
        $customer->addRental($rental);
        $rentalFee = $customer->calculateRentalFee();

        $this->assertEquals($rentalFee, 3);
    }

}
