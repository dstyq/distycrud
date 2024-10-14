@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Edit User</h1>
</div>
<div class="content">
    <form action="{{ route('master.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $user->nama }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{ $user->alamat }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="nomor_handphone">Nomor Handphone</label>
            <input type="text" class="form-control" name="nomor_handphone" value="{{ $user->nomor_handphone }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
