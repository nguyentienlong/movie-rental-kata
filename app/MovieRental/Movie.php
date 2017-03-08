<?php

namespace MovieRental;

class Movie {

	private $title;

	public function __construct($title){
		$this->title = $title;
	}

	public function getTitle(){
		return $this->title;
	}
}
