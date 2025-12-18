@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')

<div class="mb-3">
    <a href="{{ url('/admin') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<h2 class="mb-4">Kelola Kategori</h2>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
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

<div class="table-card mb-3" style="padding: 20px;">
    <form method="GET" action="{{ url('/admin/categories') }}" id="filterForm">
        <div class="row align-items-end">
            <div class="col-md-10">
                <label for="program_id">Filter berdasarkan Program Studi</label>
                <select class="form-control" id="program_id" name="program_id" onchange="document.getElementById('filterForm').submit()">
                    <option value="">-- Semua Program --</option>
                    @foreach($programs as $prog)
                        <option value="{{ $prog->id }}" {{ request('program_id') == $prog->id ? 'selected' : '' }}>
                            {{ $prog->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <a href="{{ url('/admin/categories') }}" class="btn btn-secondary btn-block">Reset</a>
            </div>
        </div>
    </form>
</div>

<div class="table-card">
    <div class="table-card-header">
        <span>Daftar Kategori</span>
        <a href="{{ url('/admin/categories/create') }}" class="btn btn-light btn-sm">
            <i class="fa fa-plus"></i> Tambah Kategori
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>Program Studi</th>
                <th>Nama Kategori</th>
                <th>Slug</th>
                <th>Icon</th>
                <th>Urutan</th>
                <th>Jumlah Subpage</th>
                <th style="width: 140px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td><strong>{{ $category->program?->name ?? '-' }}</strong></td>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td><code>{{ $category->slug }}</code></td>
                    <td>
                        @if($category->icon)
                            <i class="fa {{ $category->icon }}"></i> {{ $category->icon }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $category->sort_order }}</td>
                    <td>{{ $category->pages()->count() }}</td>
                    <td>
                        <a href="{{ url('/admin/categories/' . $category->id . '/edit') }}" class="btn btn-sm btn-primary btn-sm-action">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form method="POST" action="{{ url('/admin/categories/' . $category->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-sm-action" 
                                    onclick="return confirm('Yakin hapus kategori ini?')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Belum ada kategori</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<nav aria-label="Page navigation" class="mt-3">
    {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
</nav>

@endsection
