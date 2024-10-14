@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Edit Supplier</h1>
</div>
<div class="content">
    <form action="{{ route('supplier.update', $supplier) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nama">Name</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $supplier->nama) }}" required>
        </div>
        
        <div class="form-group">
            <label for="alamat">Address</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat', $supplier->alamat) }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $supplier->email) }}" required>
        </div>
        
        <div class="form-group">
            <label for="nomor_handphone">Phone Number</label>
            <input type="text" name="nomor_handphone" class="form-control" id="nomor_handphone" value="{{ old('nomor_handphone', $supplier->nomor_handphone) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection