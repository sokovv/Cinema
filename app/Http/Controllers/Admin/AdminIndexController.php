<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\OpenSell;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{

    public $name;
    public $open_sell;

    public function index(Request $request)
    {
        if (OpenSell::exists()) {
            $open_sell = OpenSell::class::first();
        } else {
            OpenSell::class::create();
        }

        $halls = Hall::class::get();
        $this->name = $request->input('chairs-hall');

        return view('admin.indexAdmin', ['halls' => $halls, 'name' => $this->name, 'open_sell' => $open_sell]);
    }

    public function close()
    {
        $halls = Hall::class::get();

        $open_sell = OpenSell::class::first();

        if ($open_sell->confirmed === 1) {
            $open_sell->confirmed = 0;
        } else {
            $open_sell->confirmed = 1;
            Ticket::class::truncate();
        }
        $open_sell->save();

        $open_sell = OpenSell::class::get();
        $this->open_sell = $open_sell;
        return redirect()->back();

    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {

    }
}
