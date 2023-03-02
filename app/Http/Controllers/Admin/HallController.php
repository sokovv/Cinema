<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hall = $request->all();
        Hall::class::create($hall);
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Hall $hall
     * @return \Illuminate\Http\Response
     */
    public function show(Hall $hall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Hall $hall
     * @return string
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hall $hall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hall $hall)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Hall $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $modal_id = $request->input('id');
        $id = substr($modal_id, 6);
        $hall = DB::table('halls')->delete($id);
        return redirect('/admin');
    }

}
