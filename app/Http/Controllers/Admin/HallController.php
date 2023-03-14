<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HallRequest;

class HallController extends Controller
{
    public function store(HallRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $validated = $request->safe()->only(['name']);
        Hall::class::create($validated);
        return redirect('/admin');
    }

    public function destroy(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $modal_id = $request->input('id');
        $id = substr($modal_id, 6);
        DB::table('halls')->delete($id);
        return redirect('/admin');
    }

}
