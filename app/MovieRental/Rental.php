<?php

namespace MovieRental;

use MovieRental\Movie;

class Rental {
	private $movie;
	private $daysRented;

	public function __construct(Movie $movie, $daysRented) {
		$this->movie = $movie;
		$this->daysRented = $daysRented;
	}

	public function getDaysRented(){
		return $this->daysRented;
	}
	
	public function getMovie(){
		return $this->movie;
	}
}