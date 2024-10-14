@extends('layouts.app')

@section('content')
<div class="content-header">
    <h1>Edit Purchase Order</h1>
</div>
<div class="content">
    <form action="{{ route('purchase.orders.update', $purchaseOrder) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_pembelian">Nama Pembelian</label>
            <input type="text" name="nama_pembelian" class="form-control @error('nama_pembelian') is-invalid @enderror" value="{{ old('nama_pembelian', $purchaseOrder->nama_pembelian) }}" required>
            @error('nama_pembelian')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jumlah_pembelian">Jumlah Pembelian</label>
            <input type="number" name="jumlah_pembelian" class="form-control @error('jumlah_pembelian') is-invalid @enderror" value="{{ old('jumlah_pembelian', $purchaseOrder->jumlah_pembelian) }}" required>
            @error('jumlah_pembelian')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $purchaseOrder->tanggal->format('Y-m-d')) }}" required>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="material_id">Material</label>
            <select name="material_id" class="form-control @error('material_id') is-invalid @enderror" required>
                <option value="">Pilih Material</option>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}" {{ old('material_id', $purchaseOrder->material_id) == $material->id ? 'selected' : '' }}>
                        {{ $material->nama_material }}
                    </option>
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
                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $purchaseOrder->supplier_id) == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->nama }}
                    </option>
                @endforeach
            </select>
            @error('supplier_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $purchaseOrder->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
