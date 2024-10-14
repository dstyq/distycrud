@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Create User</h1>
</div>
<div class="content">
    <form action="{{ route('master.user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nomor_handphone">Nomor Handphone</label>
            <input type="text" class="form-control @error('nomor_handphone') is-invalid @enderror" name="nomor_handphone" value="{{ old('nomor_handphone') }}" required>
            @error('nomor_handphone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('master.user.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
