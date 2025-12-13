@extends('layouts.admin')

@section('title', 'Kelola Subpage')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Subpage Prodi</h2>
    <a href="{{ url('/admin/pages/create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah Subpage
    </a>
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Program</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Slug</th>
                <th style="width:160px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pages as $p)
            <tr>
                <td>{{ $p->program->name }}</td>
                <td><span class="badge badge-secondary">{{ $p->category }}</span></td>
                <td><strong><a href="{{ url('/p/'.$p->program->slug.'/'.$p->slug) }}" target="_blank" style="color: #667eea;">{{ $p->title }}</a></strong></td>
                <td><small>{{ $p->slug }}</small></td>
                <td>
                    <a href="{{ url('/admin/pages/'.$p->id.'/edit') }}" class="btn btn-sm btn-primary btn-sm-action">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form method="POST" action="{{ url('/admin/pages/'.$p->id) }}" style="display:inline" onsubmit="return confirm('Hapus subpage ini?')">
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
                <td colspan="5" class="text-center text-muted py-4">Tidak ada subpage</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<nav aria-label="Page navigation">
    {{ $pages->links('pagination::bootstrap-4') }}
</nav>

@endsection
