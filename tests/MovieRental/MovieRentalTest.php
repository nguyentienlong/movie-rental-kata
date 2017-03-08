<?php

namespace Test;

use MovieRental\Customer;
use MovieRental\Movie;
use MovieRental\Rental;
use MovieRental\RegularMovie;
use MovieRental\ChildrenMovie;
use MovieRental\NewReleaseMovie;

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

    public function testChildrenMovie()
    {
        $movie  = new ChildrenMovie("Transformer");
        $rental = new Rental($movie, 3);

        $customer = new Customer("alien");
        $customer->addRental($rental);

        $rentalFee = $customer->calculateRentalFee();
        $this->assertEquals($rentalFee, 1.5);

        $freqPoints = $customer->calculateFrequentRentalPoint();
        $this->assertEquals($freqPoints, 1);
    }

    public function testChildrenMovieWithRentalDayGt3()
    {
        $movie  = new ChildrenMovie("Transformer");
        $rental = new Rental($movie, 4);

        $customer = new Customer("alien");
        $customer->addRental($rental);

        $rentalFee = $customer->calculateRentalFee();
        $this->assertEquals($rentalFee, 3);

        $freqPoints = $customer->calculateFrequentRentalPoint();
        $this->assertEquals($freqPoints, 1);
    }

    public function testNewReleaseMovie()
    {
        $movie  = new NewReleaseMovie("Transformer");
        $rental = new Rental($movie, 4);

        $customer = new Customer("alien");
        $customer->addRental($rental);

        $rentalFee = $customer->calculateRentalFee();
        $this->assertEquals($rentalFee, 12);

        $freqPoints = $customer->calculateFrequentRentalPoint();
        $this->assertEquals($freqPoints, 2);
    }

    public function testRegularMovie()
    {
        $movie  = new RegularMovie("XYZ");
        $rental = new Rental($movie, 5);

        $customer = new Customer("alien");
        $customer->addRental($rental);

        $rentalFee = $customer->calculateRentalFee();
        $this->assertEquals($rentalFee, 6.5);

        $freqPoints = $customer->calculateFrequentRentalPoint();
        $this->assertEquals($freqPoints, 1);
    }

}
