<?php

namespace App\Services;


use App\Models\OpenSell;
use App\Models\Ticket;

class OpenSellService
{

    public static function openSell()
    {
        if (OpenSell::exists()) {
            $open_sell = OpenSell::class::first();
        } else {
            OpenSell::class::create();
        }
        return $open_sell;
    }

    public static function openSellConf($open_sell): void
    {
        if ($open_sell->confirmed === 1) {
            $open_sell->confirmed = 0;
        } else {
            $open_sell->confirmed = 1;
            Ticket::class::truncate();
        }
        $open_sell->save();
    }

    public static function openSellClose($close)
    {
        if ($close === true) {
            $close = false;
        } else {
            $close = true;
        }
        return $close;
    }
}
