<?php

namespace MovieRental;

class RegularMovie extends Movie implements Statement
{
    public function getAmount(int $daysRented)
    {
        $amount = 2;

        if($daysRented) {
            $amount += ($daysRented - 2) * 1.5;
        }

        return $amount;
    }

    public function getFrequentRentalPoints(int $daysRented)
    {
        return 1;
    }
}
