@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Products</h1>
    <a href="{{ route('master.products.create') }}" class="btn btn-primary">Add Product</a>
</div>

<div class="content">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <form action="{{ route('master.products.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Title or Brand" value="{{ request()->get('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Rating</th>
                    <th>SKU</th>
                    <th>Warranty Information</th>
                    <th>Shipping Information</th>
                    <th>Availability Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->rating ?? 'N/A' }}</td>
                        <td>{{ $product->sku ?? 'N/A' }}</td>
                        <td>{{ $product->warrantyInformation ?? 'N/A' }}</td>
                        <td>{{ $product->shippingInformation ?? 'N/A' }}</td>
                        <td>{{ $product->availabilityStatus ?? 'N/A' }}</td>
                        <td>
                            @if(is_array($product->images) && count($product->images) > 0)
                                <img src="{{ $product->images[0] }}" alt="{{ $product->title }}" style="width: 50px; height: auto;">
                            @else
                                N/A
                            @endif
                        </td>
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
                        <td colspan="14" class="text-center">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
