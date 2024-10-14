@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Purchase Orders</h1>
    <a href="{{ route('purchase.purchase-orders.create') }}" class="btn btn-primary">Add Purchase Order</a>
</div>
<div class="content">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Search Bar -->
    <div class="mb-3">
        <form action="{{ route('purchase.purchase-orders.index') }}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Search by Purchase Name or Supplier" value="{{ request()->get('search') }}">
        </form>
    </div>

    <!-- Purchase Orders Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Purchase Name</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Material</th>
                <th>Supplier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($purchaseOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->nama_pembelian }}</td>
                    <td>{{ $order->jumlah_pembelian }}</td>
                    <td>{{ $order->tanggal->format('d-m-Y') }}</td> <!-- Date format -->
                    <td>{{ $order->material->nama_material }}</td>
                    <td>{{ $order->supplier->nama }}</td>
                    <td>
                        <a href="{{ route('purchase.purchase-orders.edit', $order) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('purchase.purchase-orders.destroy', $order) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this purchase order?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No purchase order data available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
