@extends('layouts.main')

@section('title', 'Edit Program Studi')

@section('content')
<section class="tm-container-outer py-5" style="background: white;">
    <div class="container" style="max-width: 720px;">
        <h3 class="mb-4">Edit Program Studi</h3>
        <form method="POST" action="{{ url('/admin/programs/'.$program->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $program->name) }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug', $program->slug) }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Fakultas</label>
                <input type="text" name="faculty" class="form-control" value="{{ old('faculty', $program->faculty) }}">
            </div>
            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="5">{{ old('description', $program->description) }}</textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('/admin/programs') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
        <form method="POST" action="{{ url('/admin/programs/'.$program->id) }}" class="mt-3" onsubmit="return confirm('Hapus program ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Hapus Program</button>
        </form>
    </div>
    
</section>
@endsection
