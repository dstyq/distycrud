@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Edit Material</h1>
</div>
<div class="content">
    <form action="{{ route('master.material.update', $material) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_material">Nama Material</label>
            <input type="text" name="nama_material" class="form-control" value="{{ $material->nama_material }}" required>
        </div>
        <div class="form-group">
            <label for="unit">Unit</label>
            <input type="text" name="unit" class="form-control" value="{{ $material->unit }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $material->harga }}" required>
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $material->brand }}" required>
        </div>
        <div class="form-group">
            <label for="part_number">Part Number</label>
            <input type="text" name="part_number" class="form-control" value="{{ $material->part_number }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type=text name="deskripsi" class="form-control" value="{{ $material->deskripsi }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection