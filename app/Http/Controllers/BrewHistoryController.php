<?php

namespace App\Http\Controllers;

use App\Models\BrewHistory;
use Illuminate\Http\Request;

class BrewHistoryController extends Controller
{
    public function index()
    {
        $histories = BrewHistory::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('brew-history.index', compact('histories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'method_id'   => 'required|exists:methods,id',
            'coffee_gram' => 'required|numeric|min:1',
            'water_ml'    => 'required|numeric|min:1',
            'ratio'       => 'required',
        ]);

        BrewHistory::create([
            'user_id'     => auth()->id(),
            'method_id'   => $request->method_id,
            'coffee_gram' => $request->coffee_gram,
            'water_ml'    => $request->water_ml,
            'ratio'       => $request->ratio,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Brew berhasil disimpan ☕');
    }
}
