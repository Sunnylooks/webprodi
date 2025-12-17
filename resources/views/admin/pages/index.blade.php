@extends('layouts.admin')

@section('title', 'Kelola Subpage')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Subpage Prodi</h2>
    <a href="{{ url('/admin/pages/create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah Subpage
    </a>
</div>

<!-- Filter Section -->
<div class="table-card mb-3" style="padding: 20px;">
    <form method="GET" action="{{ url('/admin/pages') }}" id="filterForm">
        <div class="row align-items-end">
            <div class="col-md-4 mb-3">
                <label for="searchQuery" class="form-label" style="font-weight: 600; margin-bottom: 8px;">Cari Subpage</label>
                <input type="text" name="q" id="searchQuery" class="form-control" placeholder="Cari judul, slug, atau konten..." value="{{ request('q') }}">
            </div>
            <div class="col-md-3 mb-3">
                <label for="filterProgram" class="form-label" style="font-weight: 600; margin-bottom: 8px;">Program Studi</label>
                <select name="program_id" id="filterProgram" class="form-control" onchange="this.form.submit()">
                    <option value="">Semua Program</option>
                    @foreach($programs as $pr)
                        <option value="{{ $pr->id }}" {{ request('program_id') == $pr->id ? 'selected' : '' }}>
                            {{ $pr->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="filterCategory" class="form-label" style="font-weight: 600; margin-bottom: 8px;">Kategori</label>
                <select name="category" id="filterCategory" class="form-control" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <button class="btn btn-primary w-100" type="submit" style="height: 38px;">
                    <i class="fa fa-search"></i> Cari
                </button>
            </div>
        </div>
        @if(request()->hasAny(['program_id', 'category', 'q']))
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/admin/pages') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-times"></i> Reset Semua Filter
                </a>
            </div>
        </div>
        @endif
    </form>
</div>

<!-- Results Info -->
@if(request()->hasAny(['program_id', 'category', 'q']))
<div class="alert alert-info">
    <i class="fa fa-info-circle"></i> 
    Menampilkan {{ $pages->total() }} hasil
    @if(request('program_id'))
        untuk program <strong>{{ $programs->firstWhere('id', request('program_id'))->name }}</strong>
    @endif
    @if(request('category'))
        kategori <strong>{{ request('category') }}</strong>
    @endif
    @if(request('q'))
        dengan pencarian "<strong>{{ request('q') }}</strong>"
    @endif
</div>
@endif

<div class="table-card">
    <div class="table-responsive">
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
                <td colspan="5" class="text-center text-muted py-4">
                    @if(request()->hasAny(['program_id', 'category', 'q']))
                        Tidak ada subpage yang sesuai dengan filter
                    @else
                        Tidak ada subpage
                    @endif
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<nav aria-label="Page navigation" class="mt-3">
    {{ $pages->appends(request()->query())->links('pagination::bootstrap-4') }}
</nav>

@endsection
