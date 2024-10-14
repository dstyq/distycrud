@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Tambah Purchase Order</h1>
</div>
<div class="content">
    <form action="{{ route('purchase.purchase-orders.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nama_pembelian">Nama Pembelian</label>
            <input type="text" name="nama_pembelian" class="form-control @error('nama_pembelian') is-invalid @enderror" required placeholder="Masukkan nama pembelian" value="{{ old('nama_pembelian') }}">
            @error('nama_pembelian')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jumlah_pembelian">Jumlah Pembelian</label>
            <input type="number" name="jumlah_pembelian" class="form-control @error('jumlah_pembelian') is-invalid @enderror" required placeholder="Masukkan jumlah pembelian" value="{{ old('jumlah_pembelian') }}">
            @error('jumlah_pembelian')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" required value="{{ old('tanggal') }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="material_id">Material</label>
            <select name="material_id" class="form-control @error('material_id') is-invalid @enderror" required>
                <option value="">Pilih Material</option>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}" {{ old('material_id') == $material->id ? 'selected' : '' }}>{{ $material->nama_material }}</option>
                @endforeach
            </select>
            @error('material_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" required>
                <option value="">Pilih Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->nama }}</option>
                @endforeach
            </select>
            @error('supplier_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-success mr-2">Simpan</button>
            <a href="{{ route('purchase.purchase-orders.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
