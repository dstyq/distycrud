@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Materials</h1>
    <a href="{{ route('master.material.create') }}" class="btn btn-primary">Add Material</a>
</div>
<div class="content">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <form action="{{ route('master.material.index') }}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Search by Name or Brand" value="{{ request()->get('search') }}">
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Material Name</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Brand</th>
                <th>Part Number</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($materials as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->nama_material }}</td>
                    <td>{{ $material->unit }}</td>
                    <td>{{ number_format($material->harga, 2, ',', '.') }}</td>
                    <td>{{ $material->brand }}</td>
                    <td>{{ $material->part_number }}</td>
                    <td>{{ $material->deskripsi }}</td>
                    <td>
                        <a href="{{ route('master.material.edit', $material->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('master.material.destroy', $material->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this material?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No materials found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
