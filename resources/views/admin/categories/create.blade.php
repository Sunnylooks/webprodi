@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')

<div class="mb-3">
    <a href="{{ url('/admin/categories') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<h2 class="mb-4">Tambah Kategori Baru</h2>

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

<div class="table-card" style="padding: 30px;">
    <form method="POST" action="{{ url('/admin/categories') }}">
        @csrf

        <div class="form-group">
            <label for="program_id">Program Studi <span class="text-danger">*</span></label>
            <select class="form-control @error('program_id') is-invalid @enderror" 
                    id="program_id" name="program_id" required>
                <option value="">Pilih Program Studi</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                        {{ $program->name }}
                    </option>
                @endforeach
            </select>
            @error('program_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nama Kategori <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Contoh: SOP & Tata Kelola, Profil, Informasi</small>
        </div>

        <div class="form-group">
            <label for="icon">Icon (Font Awesome)</label>
            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                   id="icon" name="icon" value="{{ old('icon') }}" placeholder="fa-folder">
            @error('icon')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Opsional. Contoh: fa-folder, fa-file-text, fa-info-circle (Lihat <a href="https://fontawesome.com/v4/icons/" target="_blank">Font Awesome 4.7</a>)</small>
        </div>

        <div class="form-group">
            <label for="sort_order">Urutan</label>
            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                   id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
            @error('sort_order')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Kategori akan diurutkan dari angka terkecil</small>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="{{ url('/admin/categories') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

@endsection
