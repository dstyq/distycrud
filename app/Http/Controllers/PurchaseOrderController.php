<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Material; 
use App\Models\Supplier; 
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
        $materials = Material::all();
        $suppliers = Supplier::all();

        return view('purchase.purchase-orders.create', compact('materials', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah_pembelian' => 'required|integer|min:1', // Pastikan ini sesuai dengan field di form
        ]);

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
        $materials = Material::all();
        $suppliers = Supplier::all();

        return view('purchase.purchase-orders.edit', compact('purchaseOrder', 'materials', 'suppliers'));
    }

    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah_pembelian' => 'required|integer|min:1',
        ]);

        $purchaseOrder->update([
            'material_id' => $request->material_id,
            'supplier_id' => $request->supplier_id,
            'jumlah_pembelian' => $request->jumlah_pembelian,
            'tanggal' => $request->tanggal, 
        ]);

        return redirect()->route('purchase.purchase-orders.index')->with('success', 'Purchase order updated successfully.');
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();

        return redirect()->route('purchase.purchase-orders.index')->with('success', 'Purchase order deleted successfully.');
    }
}
