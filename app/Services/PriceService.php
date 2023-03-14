<?php

namespace App\Services;


class PriceService
{

    public static function priceVip($vP)
    {
        if ($vP !== null) {
            $priceVip = $vP->price;
        } else {
            $priceVip = 'нет кресел';
        }
        return $priceVip;
    }

    public static function priceStandart($sP)
    {
        if ($sP !== null) {
            $priceStandart = $sP->price;
        } else {
            $priceStandart = 'нет кресел';
        }
        return $priceStandart;
    }

}
