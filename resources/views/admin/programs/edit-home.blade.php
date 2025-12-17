@extends('layouts.admin')

@section('title', 'Edit Home Page - ' . $program->name)

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0">Edit Home Page</h1>
                    @if(auth()->user()->role === 'superadmin')
                        <p class="text-muted mb-0">Pilih program studi untuk di-edit</p>
                    @else
                        <p class="text-muted mb-0">{{ $program->name }}</p>
                    @endif
                </div>
                <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            @if(auth()->user()->role === 'superadmin' && isset($programs))
            <div class="table-card mb-3">
                <div class="table-card-body">
                    <form method="GET" action="{{ route('admin.programs.edit-home') }}" class="form-inline" id="programSelectForm">
                        <label for="program_select" class="mr-2">
                            <i class="fa fa-university"></i> Pilih Program Studi:
                        </label>
                        <select name="program_id" id="program_select" class="form-control mr-2">
                            @foreach($programs as $p)
                                <option value="{{ $p->id }}" {{ $p->id == $program->id ? 'selected' : '' }}>
                                    {{ $p->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-refresh"></i> Ganti Program
                        </button>
                    </form>
                </div>
            </div>
            @endif

            <div class="table-card">
                <div class="table-card-header">
                    <h5 class="mb-0">
                        <i class="fa fa-edit"></i> Konten Home Page - {{ $program->name }}
                    </h5>
                    <p class="text-muted small mb-0">Kelola konten yang akan ditampilkan di halaman utama program studi</p>
                </div>
                <div class="table-card-body">
                    <form action="{{ route('admin.programs.update-home') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="program_id" value="{{ $program->id }}">

                        <div class="form-group">
                            <label for="home_content">
                                Konten Home Page
                                <span class="text-muted">(opsional)</span>
                            </label>
                            <textarea 
                                name="home_content" 
                                id="home_content" 
                                class="form-control @error('home_content') is-invalid @enderror"
                            >{{ old('home_content', $program->home_content) }}</textarea>
                            @error('home_content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Anda dapat menambahkan teks, gambar, dan file. Jika dikosongkan, halaman home akan menampilkan konten default.
                            </small>
                        </div>

                        <div class="form-group mb-0 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
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
    $('#home_content').summernote({
        height: 400,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'italic', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ['mybutton', ['uploadFile']]
        ],
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto', 'Open Sans', 'Lato', 'Montserrat', 'Poppins'],
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '24', '28', '32', '36', '48', '64', '72'],
        buttons: {
            uploadFile: function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="fa fa-file-pdf-o"/> Upload File',
                    tooltip: 'Upload PDF/Document',
                    click: function() {
                        var input = document.createElement('input');
                        input.type = 'file';
                        input.accept = '.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip,.rar';
                        input.onchange = function(e) {
                            uploadFile(e.target.files[0]);
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
                $('#home_content').summernote('insertImage', response.location);
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
                $('#home_content').summernote('pasteHTML', fileLink);
            },
            error: function(xhr) {
                alert('Upload gagal: ' + (xhr.responseJSON?.error || 'Unknown error'));
            }
        });
    }
});
</script>
@endpush
