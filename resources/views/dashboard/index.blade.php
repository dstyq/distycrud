@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Dashboard</h1>
</div>
<div class="content">
    <p>Selamat datang di dashboard :D</p>
    
    <div class="row">
        @foreach ([
            ['title' => 'Users', 'color' => 'info', 'icon' => 'users', 'route' => 'master.user.index'],
            ['title' => 'Suppliers', 'color' => 'success', 'icon' => 'truck', 'route' => 'master.supplier.index'],
            ['title' => 'Materials', 'color' => 'warning', 'icon' => 'box', 'route' => 'master.material.index'],
        ] as $stat)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card bg-{{ $stat['color'] }} text-white shadow-lg">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-{{ $stat['icon'] }}"></i> {{ $stat['title'] }}</h4>
                </div>
                <div class="card-body text-center">
                    <a href="{{ route($stat['route']) }}" class="btn btn-light btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mb-3">
        @foreach ([
            ['title' => 'Products', 'color' => 'primary', 'icon' => 'gift', 'route' => 'master.products.index'], 
            ['title' => 'Purchase Orders', 'color' => 'danger', 'icon' => 'file-invoice-dollar', 'route' => 'purchase.purchase-orders.index'],
        ] as $stat)
        <div class="col-lg-6 mb-4">
            <div class="card bg-{{ $stat['color'] }} text-white shadow-lg">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-{{ $stat['icon'] }}"></i> {{ $stat['title'] }}</h4>
                </div>
                <div class="card-body text-center">
                    <a href="{{ route($stat['route']) }}" class="btn btn-light btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-tools"></i> Quick Actions</h4>
                </div>
                <div class="card-body">
                    <div class="btn-group">
                        @foreach ([
                            ['route' => 'master.user.create', 'text' => 'Add User'],
                            ['route' => 'master.supplier.create', 'text' => 'Add Supplier'],
                            ['route' => 'master.material.create', 'text' => 'Add Material'],
                            ['route' => 'master.products.create', 'text' => 'Add Product'],
                            ['route' => 'purchase.purchase-orders.create', 'text' => 'Create Purchase Order'],
                        ] as $action)
                            <a href="{{ route($action['route']) }}" class="btn btn-primary">{{ $action['text'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
