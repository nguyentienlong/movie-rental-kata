<?php

namespace MovieRental;

class NewReleaseMovie extends Movie implements Statement
{
    public function getAmount(int $daysRented)
    {
        return $daysRented * 3;
    }

    public function getFrequentRentalPoints(int $daysRented)
    {
        if ($daysRented > 1) {
            return 2;
        }

        return 1;
    }
}
