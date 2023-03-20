<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Hall;
use App\Models\ShowTime;
use App\Models\Ticket;
use App\Services\OpenSellService;
use App\Services\TicketService;
use App\Services\UserService;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CinemaController extends Controller
{

    private $openSellService;
    private $userService;


    public function __construct(OpenSellService $service, UserService $userServices)
    {
        $this->openSellService = $service;
        $this->userService = $userServices;
    }


    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $this->userService->userCreate();
        $this->openSellService->openSell();

        $halls = Hall::class::get();
        $films = Film::class::get();
        return view('client.indexClient', ['films' => $films, 'halls' => $halls]);
    }

    public function hall($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        Ticket::class::where('qr', '0')->delete();
        $showTime = ShowTime::class::find($id);
        return view('client.hall', ['show_time' => $showTime]);
    }

}
