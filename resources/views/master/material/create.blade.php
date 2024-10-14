@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Tambah Material</h1>
</div>
<div class="content">
    <form action="{{ route('master.material.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_material">Nama Material</label>
            <input type="text" name="nama_material" class="form-control @error('nama_material') is-invalid @enderror" required placeholder="Masukkan nama material" value="{{ old('nama_material') }}">
            @error('nama_material')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="unit">Unit</label>
            <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" required placeholder="Masukkan unit" value="{{ old('unit') }}">
            @error('unit')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" required placeholder="Masukkan harga" value="{{ old('harga') }}">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" required placeholder="Masukkan brand" value="{{ old('brand') }}">
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="part_number">Part Number</label>
            <input type="text" name="part_number" class="form-control @error('part_number') is-invalid @enderror" required placeholder="Masukkan part number" value="{{ old('part_number') }}">
            @error('part_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" required placeholder="Masukkan deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('master.material.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
