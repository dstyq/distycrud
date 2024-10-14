@extends('adminlte::page')

@section('content')
<div class="content-header">
    <h1>Users</h1>
    <a href="{{ route('master.user.create') }}" class="btn btn-primary">Create User</a>
</div>
<div class="content">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Search Bar -->
    <div class="mb-3">
        <form action="{{ route('master.user.index') }}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Search by Name or Email" value="{{ request()->get('search') }}">
        </form>
    </div>

    <!-- Users Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Nomor Handphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->alamat }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nomor_handphone }}</td>
                    <td>
                        <a href="{{ route('master.user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('master.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
