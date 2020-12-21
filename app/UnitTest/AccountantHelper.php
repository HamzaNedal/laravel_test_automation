<?php 

namespace App\UnitTest;

class AccountantHelper{

    public static function findProfit($amount)
    {
        $profitProfit = 10;

        return $amount*$profitProfit / 100;
    }
}