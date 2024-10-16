@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Products</h1>
    <a href="{{ route('master.products.create') }}" class="btn btn-primary">Create Product</a>
</div>

<div class="content">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Search Bar -->
    <div class="mb-3">
        <form action="{{ route('master.products.index') }}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Search by Title or Brand" value="{{ request()->get('search') }}">
        </form>
    </div>

    <!-- Products Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th> <!-- Judul Kolom -->
                <th>Description</th>
                <th>Price</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td> 
                    <td>{{ $product->description }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->category }}</td>
                    <td>
                        <a href="{{ route('master.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('master.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection