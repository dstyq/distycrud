<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Supplier;
use App\Models\Material;
use App\Models\PurchaseOrder;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $supplierCount = Supplier::count();
        $materialCount = Material::count();
        $productCount = Product::count(); 
        $purchaseOrderCount = PurchaseOrder::count();

        return view('dashboard.index', compact('userCount', 'supplierCount', 'materialCount', 'productCount', 'purchaseOrderCount')); 
    }
}
