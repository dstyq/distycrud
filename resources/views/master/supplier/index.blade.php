@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Suppliers</h1>
    <a href="{{ route('master.supplier.create') }}" class="btn btn-primary">Add Supplier</a>
</div>
<div class="content">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Search Bar -->
    <div class="mb-3">
        <form action="{{ route('master.supplier.index') }}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Search by Name or Email" value="{{ request()->get('search') }}">
        </form>
    </div>

    <!-- Suppliers Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->nama }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->nomor_handphone }}</td>
                    <td>
                        <a href="{{ route('master.supplier.edit', $supplier) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('master.supplier.destroy', $supplier) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this supplier?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No suppliers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
