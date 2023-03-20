<?php

namespace App\Services;


class PriceService
{

    public function priceVip($vP): mixed
    {
        if ($vP !== null) {
            $priceVip = $vP->price;
        } else {
            $priceVip = 'нет кресел';
        }
        return $priceVip;
    }

    public  function priceStandart($sP): mixed
    {
        if ($sP !== null) {
            $priceStandart = $sP->price;
        } else {
            $priceStandart = 'нет кресел';
        }
        return $priceStandart;
    }

}
