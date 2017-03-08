<?php

namespace MovieRental;

class ChildrenMovie extends Movie implements Statement
{
    public function getAmount(int $daysRented)
    {
        $amount = 1.5;

        if($daysRented > 3) {
            $amount += ($daysRented - 3) * 1.5;
        }

        return $amount;

    }

    public function getFrequentRentalPoints(int $daysRented)
    {
        return 1;
    }
}
