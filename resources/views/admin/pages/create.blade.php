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
                    <label for="content">Konten <span class="text-danger">*</span></label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="8">{{ old('content') }}</textarea>
                    <small class="text-muted">Gunakan editor untuk menulis konten dan upload gambar/file langsung di dalam konten</small>
                    @error('content')
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
                <p><strong>Konten:</strong> Gunakan editor WYSIWYG untuk menulis konten. Anda bisa upload gambar, video, PDF, format teks, tambahkan link, dan lainnya langsung di editor.</p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {
    $('#content').summernote({
        height: 400,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ['mybutton', ['uploadFile']]
        ],
        buttons: {
            uploadFile: function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="fa fa-file-pdf-o"/> Upload PDF/File',
                    tooltip: 'Upload PDF atau File',
                    click: function() {
                        var input = document.createElement('input');
                        input.type = 'file';
                        input.accept = '.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip,.rar';
                        input.onchange = function() {
                            if (this.files && this.files[0]) {
                                uploadFile(this.files[0]);
                            }
                        };
                        input.click();
                    }
                });
                return button.render();
            }
        },
        callbacks: {
            onImageUpload: function(files) {
                for(let i = 0; i < files.length; i++) {
                    uploadImage(files[i]);
                }
            },
            onDrop: function(e) {
                e.preventDefault();
                var files = e.originalEvent.dataTransfer.files;
                for(let i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (file.type.startsWith('image/')) {
                        uploadImage(file);
                    } else {
                        uploadFile(file);
                    }
                }
            }
        }
    });
    
    function uploadImage(file) {
        let data = new FormData();
        data.append('file', file);
        data.append('_token', '{{ csrf_token() }}');
        
        $.ajax({
            url: '{{ url("/admin/pages/upload-image") }}',
            method: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#content').summernote('insertImage', response.location);
            },
            error: function(xhr) {
                alert('Upload gagal: ' + (xhr.responseJSON?.error || 'Unknown error'));
            }
        });
    }
    
    function uploadFile(file) {
        let data = new FormData();
        data.append('file', file);
        data.append('_token', '{{ csrf_token() }}');
        
        $.ajax({
            url: '{{ url("/admin/pages/upload-media") }}',
            method: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                var fileName = file.name;
                var fileExt = fileName.split('.').pop().toLowerCase();
                var icon = 'fa-file';
                
                if (fileExt === 'pdf') icon = 'fa-file-pdf-o';
                else if (['doc', 'docx'].includes(fileExt)) icon = 'fa-file-word-o';
                else if (['xls', 'xlsx'].includes(fileExt)) icon = 'fa-file-excel-o';
                else if (['ppt', 'pptx'].includes(fileExt)) icon = 'fa-file-powerpoint-o';
                else if (['zip', 'rar'].includes(fileExt)) icon = 'fa-file-archive-o';
                
                var fileLink = '<a href="' + response.location + '" target="_blank" class="btn btn-primary btn-sm">' +
                              '<i class="fa ' + icon + '"></i> ' + fileName + '</a> ';
                $('#content').summernote('pasteHTML', fileLink);
            },
            error: function(xhr) {
                alert('Upload gagal: ' + (xhr.responseJSON?.error || 'Unknown error'));
            }
        });
    }
});
</script>
@endpush

