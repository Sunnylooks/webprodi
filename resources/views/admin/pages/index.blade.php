@extends('layouts.main')

@section('title', 'Kelola Subpage')

@section('content')
<section class="tm-container-outer py-5" style="background: white;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Subpage Prodi</h3>
            <a href="{{ url('/admin/pages/create') }}" class="btn btn-primary">Tambah Subpage</a>
        </div>
        <form method="GET" action="{{ url('/admin/pages') }}" class="mb-3">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Program Studi</label>
                    <select name="program_id" class="form-control">
                        <option value="">Semua</option>
                        @foreach(($programs ?? []) as $pr)
                            <option value="{{ $pr->id }}" {{ request('program_id') == $pr->id ? 'selected' : '' }}>{{ $pr->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Kategori</label>
                    <select name="category" class="form-control">
                        <option value="">Semua</option>
                        @foreach(($categories ?? []) as $cat)
                            <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Pencarian</label>
                    <input type="text" name="q" class="form-control" value="{{ request('q') }}" placeholder="Cari judul, slug, atau isi">
                </div>
                <div class="form-group col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary mr-2">Filter</button>
                    <a href="{{ url('/admin/pages') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Program</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Urutan</th>
                    <th style="width:160px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $p)
                <tr>
                    <td>{{ $p->program->name }}</td>
                    <td>{{ $p->category }}</td>
                    <td><a href="{{ url('/p/'.$p->program->slug.'/'.$p->slug) }}" target="_blank">{{ $p->title }}</a></td>
                    <td>{{ $p->slug }}</td>
                    <td>{{ $p->sort_order }}</td>
                    <td>
                        <a href="{{ url('/admin/pages/'.$p->id.'/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="POST" action="{{ url('/admin/pages/'.$p->id) }}" style="display:inline" onsubmit="return confirm('Hapus subpage ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">Menampilkan {{ $pages->count() }} dari total {{ $pages->total() }} subpage</small>
            {{ $pages->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>
@endsection
