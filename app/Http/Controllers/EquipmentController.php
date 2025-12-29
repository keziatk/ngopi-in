<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::latest()->get();

        return view('equipments.index', compact('equipments'));
    }

    public function create()
    {
        return view('equipments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'function' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('equipments', 'public');
        }

        Equipment::create($data);

        return redirect()->route('equipments.index');
    }

    public function edit(Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $data = $request->validate([
            'name' => 'required',
            'function' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {

            // hapus gambar lama (opsional tapi rapi)
            if ($equipment->image) {
                Storage::disk('public')->delete($equipment->image);
            }

            $data['image'] = $request->file('image')->store('equipments', 'public');
        }

        $equipment->update($data);

        return redirect()->route('equipments.index');
    }


    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Peralatan berhasil dihapus');
    }
}
