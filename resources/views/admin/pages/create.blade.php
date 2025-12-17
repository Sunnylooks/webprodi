@extends('layouts.admin-no-search')

@section('title', 'Tambah Subpage')

@section('content')

<div class="mb-3">
    <a href="{{ url('/admin/pages') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<h2 class="mb-4">Tambah Subpage Baru</h2>

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

<div class="row">
    <div class="col-lg-8">
        <div class="table-card" style="padding: 30px;">
            <form method="POST" action="{{ url('/admin/pages') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="program_id">Program Studi <span class="text-danger">*</span></label>
                    <select name="program_id" id="program_id" class="form-control @error('program_id') is-invalid @enderror" required>
                        <option value="">Pilih Program Studi</option>
                        @foreach($programs as $pr)
                            <option value="{{ $pr->id }}" {{ old('program_id') == $pr->id ? 'selected' : '' }}>{{ $pr->name }}</option>
                        @endforeach
                    </select>
                    @error('program_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="category">Kategori <span class="text-danger">*</span></label>
                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="title">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" 
                           value="{{ old('slug') }}" placeholder="Otomatis dari judul">
                    @error('slug')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="content">Konten</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="8">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="attachments">Lampiran (boleh lebih dari satu)</label>
                    <input type="file" name="attachments[]" id="attachments" class="form-control @error('attachments') is-invalid @enderror" multiple>
                    <small class="text-muted">Anda dapat memilih lebih dari satu file</small>
                    @error('attachments')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan Subpage
                    </button>
                    <a href="{{ url('/admin/pages') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="table-card" style="padding: 20px;">
            <div class="metric-label mb-3" style="color: #667eea; font-weight: 600;">
                <i class="fa fa-info-circle"></i> Bantuan
            </div>
            <div style="font-size: 13px; line-height: 1.6;">
                <p><strong>Program Studi:</strong> Pilih program studi untuk halaman ini.</p>
                <p><strong>Kategori:</strong> Pilih kategori konten.</p>
                <p><strong>Judul:</strong> Judul halaman yang akan ditampilkan.</p>
                <p><strong>Slug:</strong> URL-friendly identifier. Biarkan kosong untuk otomatis dari judul.</p>
                <p><strong>Konten:</strong> Isi konten halaman.</p>
                <p><strong>Lampiran:</strong> Upload file pendukung (PDF, gambar, dll).</p>
            </div>
        </div>
    </div>
</div>

@endsection

