<?php

namespace MovieRental;

use MovieRental\Rental;

class Customer {
	private $name;
	private $rentals = array();
	private $rentalAmount = 0;
	private $frequentRenterPoints = 0;

	public function __construct($name){
		$this->name = $name;
	}

	public function addRental(Rental $rental){
		array_push($this->rentals, $rental);
	}

	public function getName(){
		return $this->name;
	}

	public function calculateRentalFee()
	{
		foreach($this->rentals as $rental) {
			$this->rentalAmount += $rental->getMovie()->getAmount($rental->getDaysRented());
		}

		return $this->rentalAmount;
	}

	public function calculateFrequentRentalPoint()
	{
		foreach($this->rentals as $rental) {
			$this->frequentRenterPoints += $rental->getMovie()->getFrequentRentalPoints($rental->getDaysRented());
		}

		return $this->frequentRenterPoints;
	}

	public function printStatement()
	{
		$output = '';

		$output .= 'customer name: ' . $this->name;
		$output .= 'rental amount: ' . $this->rentalAmount . PHP_EOL;
		$output .= 'freq point: ' . $this->frequentRenterPoints . PHP_EOL;

		return $output;
	}
}
