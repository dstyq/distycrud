@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Create Product</h1>
</div>
<div class="content">
    <form action="{{ route('master.products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" required>
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('master.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection