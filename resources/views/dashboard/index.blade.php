@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Dashboard</h1>
</div>
<div class="content">
    <p>Selamat datang di dashboard Anda. Berikut adalah ringkasan data:</p>
    
    <!-- Stats Cards -->
    <div class="row">
        @foreach ([
            ['title' => 'Users', 'count' => $userCount, 'color' => 'info', 'icon' => 'users', 'route' => 'master.user.index'],
            ['title' => 'Suppliers', 'count' => $supplierCount, 'color' => 'success', 'icon' => 'truck', 'route' => 'master.supplier.index'],
            ['title' => 'Materials', 'count' => $materialCount, 'color' => 'warning', 'icon' => 'box', 'route' => 'master.material.index'],
            ['title' => 'Purchase Orders', 'count' => $purchaseOrderCount, 'color' => 'danger', 'icon' => 'file-invoice-dollar', 'route' => 'purchase.purchase-orders.index'],
        ] as $stat)
        <div class="col-lg-3">
            <div class="card bg-{{ $stat['color'] }} text-white">
                <div class="card-header">
                    <h4><i class="fas fa-{{ $stat['icon'] }}"></i> {{ $stat['title'] }} </h4>
                </div>
                <div class="card-body">
                    <h1 class="display-4">{{ $stat['count'] }}</h1>
                    <a href="{{ route($stat['route']) }}" class="btn btn-light btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Quick Actions -->
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-tools"></i> Quick Actions </h4>
                </div>
                <div class="card-body">
                    <div class="btn-group">
                        <a href="{{ route('master.user.create') }}" class="btn btn-primary">Add User</a>
                        <a href="{{ route('master.supplier.create') }}" class="btn btn-primary">Add Supplier</a>
                        <a href="{{ route('master.material.create') }}" class="btn btn-primary">Add Material</a>
                        <a href="{{ route('purchase.purchase-orders.create') }}" class="btn btn-primary">Create Purchase Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Functionality -->
    <div class="row mb-3">
        <div class="col-lg-12">
            <input type="text" class="form-control" placeholder="Search...">
            <select class="form-control mt-2">
                <option value="">All Categories</option>
                <option value="users">Users</option>
                <option value="suppliers">Suppliers</option>
                <option value="materials">Materials</option>
                <option value="purchase_orders">Purchase Orders</option>
            </select>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="row">
        <div class="col-lg-12">
            <canvas id="monthlyOverviewChart"></canvas>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('monthlyOverviewChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Users',
                data: [12, 19, 3, 5, 2, 3],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false,
            }, {
                label: 'Purchase Orders',
                data: [2, 3, 20, 5, 1, 4],
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                fill: false,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
