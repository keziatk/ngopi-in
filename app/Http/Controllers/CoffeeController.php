<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoffeeController extends Controller
{
    public function index()
    {
        $coffees = Coffee::latest()->get();
        return view('coffees.index', compact('coffees'));
    }

    public function create()
    {
        return view('coffees.create', [
            'processes' => Coffee::processes(),
            'roastLevels' => Coffee::roastLevels(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'origin'      => 'nullable|string|max:255',
            'process'     => 'nullable|string|max:255',
            'roast_level' => 'nullable|string|max:255',
            'flavor_notes' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        // upload image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('coffees', 'public');
        }

        Coffee::create($data);

        return redirect()->route('coffees.index')
            ->with('success', 'Data kopi berhasil ditambahkan ☕');
    }

    public function edit(Coffee $coffee)
    {
        return view('coffees.edit', [
            'coffee'      => $coffee,
            'processes'   => Coffee::processes(),
            'roastLevels' => Coffee::roastLevels(),
        ]);
    }

    public function update(Request $request, Coffee $coffee)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'origin'      => 'nullable|string|max:255',
            'process'     => 'nullable|string|max:255',
            'roast_level' => 'nullable|string|max:255',
            'flavor_notes' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        // replace image
        if ($request->hasFile('image')) {
            if ($coffee->image) {
                Storage::disk('public')->delete($coffee->image);
            }

            $data['image'] = $request->file('image')
                ->store('coffees', 'public');
        }

        $coffee->update($data);

        return redirect()->route('coffees.index')
            ->with('success', 'Data kopi berhasil diperbarui ✅');
    }

    public function destroy(Coffee $coffee)
    {
        if ($coffee->image) {
            Storage::disk('public')->delete($coffee->image);
        }

        $coffee->delete();

        return redirect()->route('coffees.index')
            ->with('success', 'Data kopi berhasil dihapus 🗑');
    }
}
