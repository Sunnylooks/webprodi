@extends('layouts.admin')

@section('title', 'Kelola Users')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Kelola Users</h2>
    <a href="{{ url('/admin/users/create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah User
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Program Studi</th>
                <th style="width: 140px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td><strong>{{ $user->name }}</strong></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role === 'superadmin')
                            <span class="badge badge-danger">Super Admin</span>
                        @elseif($user->role === 'kaprodi')
                            <span class="badge badge-warning">Kaprodi</span>
                        @elseif($user->role === 'universitas')
                            <span class="badge badge-info">Universitas</span>
                        @endif
                    </td>
                    <td>{{ $user->program?->name ?? '-' }}</td>
                    <td>
                        <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" class="btn btn-sm btn-primary btn-sm-action">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ url('/admin/users/' . $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-sm-action">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">Tidak ada user</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<nav aria-label="Page navigation">
    {{ $users->links() }}
</nav>

@endsection
