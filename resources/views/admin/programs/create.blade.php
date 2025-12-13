@extends('layouts.admin-no-search')

@section('title', 'Tambah Program Studi')

@section('content')

<div class="mb-3">
    <a href="{{ url('/admin/programs') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<h2 class="mb-4">Tambah Program Studi Baru</h2>

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
    <form method="POST" action="{{ url('/admin/programs') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nama Program Studi <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                   id="slug" name="slug" value="{{ old('slug') }}" required>
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="faculty">Fakultas</label>
            <input type="text" class="form-control @error('faculty') is-invalid @enderror" 
                   id="faculty" name="faculty" value="{{ old('faculty') }}">
            @error('faculty')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" name="description" rows="5">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan Program
            </button>
            <a href="{{ url('/admin/programs') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

@endsection

