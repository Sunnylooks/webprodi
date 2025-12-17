@extends('layouts.admin')

@section('title', 'Kelola Program Studi')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Program Studi</h2>
    @if(auth()->user()->role === 'superadmin')
    <a href="{{ url('/admin/programs/create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah Program
    </a>
    @endif
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Slug</th>
                <th>Fakultas</th>
                <th style="width:160px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($programs as $pr)
            <tr>
                <td><strong><a href="{{ url('/p/'.$pr->slug) }}" target="_blank" style="color: #667eea;">{{ $pr->name }}</a></strong></td>
                <td>{{ $pr->slug }}</td>
                <td>{{ $pr->faculty ?? '-' }}</td>
                <td>
                    @if(auth()->user()->role === 'superadmin')
                        <a href="{{ url('/admin/programs/'.$pr->id.'/edit') }}" class="btn btn-sm btn-primary btn-sm-action">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form method="POST" action="{{ url('/admin/programs/'.$pr->id) }}" style="display:inline" onsubmit="return confirm('Hapus program ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-sm-action">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    @else
                        <span class="text-muted">Akses terbatas</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted py-4">Tidak ada program</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

@endsection
