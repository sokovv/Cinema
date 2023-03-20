<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\OpenSell;
use App\Services\OpenSellService;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{

    public $name;
    public $open_sell;

    private $openSellService;
    public function __construct(OpenSellService $service)
    {
        $this->openSellService = $service;
    }

    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $open_sell = $this->openSellService->openSell();
        $halls = Hall::class::get();
        $this->name = $request->input('chairs-hall');

        return view('admin.indexAdmin', ['halls' => $halls, 'name' => $this->name, 'open_sell' => $open_sell]);
    }

    public function close(): \Illuminate\Http\RedirectResponse
    {

        $open_sell = OpenSell::class::first();
        $this->openSellService->openSellConf($open_sell);
        $open_sell = OpenSell::class::get();
        $this->open_sell = $open_sell;
        return redirect()->back();
    }

}
