<?php

namespace MovieRental;

interface Statement
{
    public function getAmount(int $daysRented);

    public function getFrequentRentalPoints(int $daysRented);
}
