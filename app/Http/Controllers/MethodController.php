<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Models\Equipment;
use App\Models\Coffee;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    public function index()
    {
        $methods = Method::latest()->get();
        return view('methods.index', compact('methods'));
    }

    public function create()
    {
        return view('methods.create', [
            'equipments' => Equipment::all(),
            'coffees' => Coffee::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'ratio' => 'required|numeric',
            'grind_size' => 'required',
            'temperature' => 'required|numeric',
            'temperature_label' => 'required',
            'brew_time' => 'required|numeric',
            'brew_time_label' => 'required',
            'steps' => 'required',
            'equipments' => 'array',
            'coffees' => 'array',
        ]);

        $method = Method::create($validated);

        if ($request->equipments) {
            $method->equipments()->sync($request->equipments);
        }

        if ($request->coffees) {
            $method->coffees()->sync($request->coffees);
        }

        return redirect()
            ->route('methods.index')
            ->with('success', 'Metode seduh berhasil ditambahkan');
    }

    public function edit(Method $method)
    {
        return view('methods.edit', [
            'method' => $method,
            'equipments' => Equipment::all(),
            'coffees' => Coffee::all(),
        ]);
    }

    public function update(Request $request, Method $method)
    {
        $validated = $request->validate([
            'name' => 'required',
            'ratio' => 'required|numeric',
            'grind_size' => 'required',
            'temperature' => 'required|numeric',
            'temperature_label' => 'required',
            'brew_time' => 'required|numeric',
            'brew_time_label' => 'required',
            'steps' => 'required',
            'equipments' => 'array',
            'coffees' => 'array',
        ]);

        $method->update($validated);

        $method->equipments()->sync($request->equipments ?? []);
        $method->coffees()->sync($request->coffees ?? []);

        return redirect()
            ->route('methods.index')
            ->with('success', 'Metode seduh berhasil diperbarui');
    }

    public function destroy(Method $method)
    {
        $method->delete();

        return redirect()
            ->route('methods.index')
            ->with('success', 'Metode seduh berhasil dihapus');
    }
}
