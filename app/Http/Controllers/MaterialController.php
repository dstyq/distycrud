<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('master.material.index', compact('materials'));
    }

    public function create()
    {
        return view('master.material.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_material' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'harga' => 'required|integer',
            'brand' => 'nullable|string|max:255',
            'part_number' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Material::create($request->all());
        return redirect()->route('master.material.index')->with('success', 'Material berhasil dibuat.');
    }

    public function edit(Material $material)
    {
        return view('master.material.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'nama_material' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'harga' => 'required|integer',
            'brand' => 'nullable|string|max:255',
            'part_number' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $material->update($request->all());
        return redirect()->route('master.material.index')->with('success', 'Material berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $material = Material::findOrfail($id);
        $material->delete();
        return redirect()->route('master.material.index')->with('success', 'Material berhasil dihapus.');
    }
}