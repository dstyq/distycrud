<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Material; // Tambahkan ini
use App\Models\Supplier; // Tambahkan ini
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with(['material', 'supplier'])->get();
        return view('purchase.purchase-orders.index', compact('purchaseOrders'));
    }

    public function create()
    {
        // Ambil data materials dan suppliers untuk dropdown
        $materials = Material::all();
        $suppliers = Supplier::all();

        return view('purchase.purchase-orders.create', compact('materials', 'suppliers'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah_pembelian' => 'required|integer|min:1', // Pastikan ini sesuai dengan field di form
        ]);

        // Buat purchase order baru
        PurchaseOrder::create([
            'material_id' => $request->material_id,
            'supplier_id' => $request->supplier_id,
            'jumlah_pembelian' => $request->jumlah_pembelian,
            'tanggal' => $request->tanggal, // Jika ada field tanggal
        ]);

        return redirect()->route('purchase.purchase-orders.index')->with('success', 'Purchase order created successfully.');
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        // Ambil data materials dan suppliers untuk dropdown
        $materials = Material::all();
        $suppliers = Supplier::all();

        return view('purchase.purchase-orders.edit', compact('purchaseOrder', 'materials', 'suppliers'));
    }

    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        // Validasi data yang diterima
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah_pembelian' => 'required|integer|min:1',
        ]);

        // Update purchase order
        $purchaseOrder->update([
            'material_id' => $request->material_id,
            'supplier_id' => $request->supplier_id,
            'jumlah_pembelian' => $request->jumlah_pembelian,
            'tanggal' => $request->tanggal, // Jika ada field tanggal
        ]);

        return redirect()->route('purchase.purchase-orders.index')->with('success', 'Purchase order updated successfully.');
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        // Hapus purchase order
        $purchaseOrder->delete();

        return redirect()->route('purchase.purchase-orders.index')->with('success', 'Purchase order deleted successfully.');
    }
}
