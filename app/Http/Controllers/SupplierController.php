<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('master.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('master.supplier.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:suppliers',
            'nomor_handphone' => 'required|string|max:15',
        ]);

        // Buat supplier baru
        Supplier::create($request->all());
        return redirect()->route('master.supplier.index')->with('success', 'Supplier created successfully.');
    }

    public function edit(Supplier $supplier)
    {
        return view('master.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:suppliers,email,' . $supplier->id,
            'nomor_handphone' => 'required|string|max:15',
        ]);

        // Update supplier
        $supplier->update($request->all());
        return redirect()->route('master.supplier.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        // Hapus supplier
        $supplier->delete();
        return redirect()->route('master.supplier.index')->with('success', 'Supplier deleted successfully.');
    }
}
