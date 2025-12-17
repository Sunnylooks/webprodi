@extends('layouts.admin-no-search')

@section('title', 'Tambah User')

@section('content')

<div class="mb-3">
    <a href="{{ url('/admin/users') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<h2 class="mb-4">Tambah User Baru</h2>

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
    <form method="POST" action="{{ url('/admin/users') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                   id="password" name="password" required>
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Role <span class="text-danger">*</span></label>
            <select class="form-control @error('role') is-invalid @enderror" 
                    id="role" name="role" required onchange="toggleProgramField()">
                <option value="">Pilih Role</option>
                <option value="kaprodi" {{ old('role') === 'kaprodi' ? 'selected' : '' }}>Kaprodi</option>
                <option value="superadmin" {{ old('role') === 'superadmin' ? 'selected' : '' }}>Super Admin</option>
            </select>
            @error('role')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group" id="programField" style="display: none;">
            <label for="program_id">Program Studi <span class="text-danger">*</span></label>
            <select class="form-control @error('program_id') is-invalid @enderror" 
                    id="program_id" name="program_id">
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
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan User
            </button>
            <a href="{{ url('/admin/users') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script>
function toggleProgramField() {
    const role = document.getElementById('role').value;
    const programField = document.getElementById('programField');
    const programInput = document.getElementById('program_id');
    
    if (role === 'kaprodi') {
        programField.style.display = 'block';
        programInput.required = true;
    } else {
        programField.style.display = 'none';
        programInput.required = false;
        programInput.value = '';
    }
}

document.addEventListener('DOMContentLoaded', toggleProgramField);
</script>
@endsection
