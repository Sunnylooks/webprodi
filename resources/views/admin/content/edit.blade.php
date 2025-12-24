@extends('layouts.admin')

@section('title', 'Edit Content')

@section('content')
<div class="admin-page-header">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 class="admin-page-title">
                <i class="fa fa-edit"></i> Edit Content
            </h1>
            <p class="admin-page-subtitle">{{ $page->title }}</p>
        </div>
        <a href="{{ route('admin.content.index', ['program_id' => $page->program_id]) }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-check-circle"></i> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="admin-card">
    <div class="admin-card-header" style="padding: 20px; border-bottom: 1px solid #e8ecf1;">
        <div class="row">
            <div class="col-md-8">
                <h5 class="mb-1"><strong>{{ $page->title }}</strong></h5>
                <div class="text-muted">
                    <i class="fa fa-university"></i> {{ $page->program->name }}
                    <span class="mx-2">•</span>
                    <i class="fa fa-folder"></i> {{ $page->category }}
                </div>
            </div>
            <div class="col-md-4 text-right">
                @if($page->is_published)
                    <span class="badge badge-success" style="padding: 8px 15px; font-size: 13px;">
                        <i class="fa fa-check"></i> Published
                    </span>
                @else
                    <span class="badge badge-secondary" style="padding: 8px 15px; font-size: 13px;">
                        <i class="fa fa-eye-slash"></i> Draft
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="admin-card-body" style="padding: 30px;">
        <form action="{{ route('admin.content.update', $page->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label"><strong>Konten Halaman</strong></label>
                <textarea id="content" name="content" class="form-control">{{ old('content', $page->content) }}</textarea>
                @error('content')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e8ecf1; display: flex; gap: 10px;">
                <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 12px 30px;">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.content.index', ['program_id' => $page->program_id]) }}" class="btn btn-secondary" style="padding: 12px 30px;">
                    <i class="fa fa-times"></i> Batal
                </a>
                <a href="{{ url('/p/'.$page->program->slug.'/'.$page->slug) }}" target="_blank" class="btn btn-info ml-auto" style="padding: 12px 30px;">
                    <i class="fa fa-eye"></i> Preview Page
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
$(document).ready(function() {
    $('#content').summernote({
        height: 500,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ['mybutton', ['uploadFile']]
        ],
        fontNames: [
            'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 
            'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto', 
            'Open Sans', 'Lato', 'Montserrat', 'Poppins', 'Raleway'
        ],
        fontNamesIgnoreCheck: ['Roboto', 'Open Sans', 'Lato', 'Montserrat', 'Poppins', 'Raleway'],
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '24', '28', '32', '36', '48', '72'],
        callbacks: {
            onImageUpload: function(files) {
                uploadImage(files[0]);
            }
        }
    });

    // Custom Upload File Button
    var uploadFileButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="fa fa-file"/> Upload File',
            tooltip: 'Upload PDF, DOC, XLS, etc',
            click: function() {
                $('#fileInput').click();
            }
        });
        return button.render();
    };

    // Register custom button
    $('#content').summernote('buttons', {uploadFile: uploadFileButton});

    // File input for documents
    $('body').append('<input type="file" id="fileInput" style="display:none" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip,.rar">');

    $('#fileInput').change(function() {
        uploadMedia(this.files[0]);
    });

    // Upload Image Function
    function uploadImage(file) {
        let data = new FormData();
        data.append('image', file);
        
        $.ajax({
            url: '{{ route("admin.pages.upload-image") }}',
            method: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            success: function(response) {
                $('#content').summernote('insertImage', response.location);
            },
            error: function(xhr) {
                alert('Upload failed: ' + (xhr.responseJSON?.error || 'Unknown error'));
            }
        });
    }

    // Upload Media Function
    function uploadMedia(file) {
        let data = new FormData();
        data.append('file', file);
        
        $.ajax({
            url: '{{ route("admin.pages.upload-media") }}',
            method: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            success: function(response) {
                insertFileLink(response.location, response.filename);
            },
            error: function(xhr) {
                alert('Upload failed: ' + (xhr.responseJSON?.error || 'Unknown error'));
            }
        });
    }

    function insertFileLink(url, filename) {
        let icon = 'fa-file';
        let ext = filename.split('.').pop().toLowerCase();
        
        if (ext === 'pdf') icon = 'fa-file-pdf-o';
        else if (ext === 'doc' || ext === 'docx') icon = 'fa-file-word-o';
        else if (ext === 'xls' || ext === 'xlsx') icon = 'fa-file-excel-o';
        else if (ext === 'ppt' || ext === 'pptx') icon = 'fa-file-powerpoint-o';
        else if (ext === 'zip' || ext === 'rar') icon = 'fa-file-archive-o';
        
        let html = `
            <a href="${url}" target="_blank" class="file-download-btn" style="display: inline-block; padding: 12px 20px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 8px; margin: 10px 0; font-weight: 600; box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3); transition: all 0.3s;">
                <i class="fa ${icon}"></i> ${filename}
            </a>
        `;
        
        $('#content').summernote('pasteHTML', html);
    }
});
</script>

<style>
.admin-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}

.note-editor.note-frame {
    border: 2px solid #e8ecf1;
    border-radius: 8px;
}

.note-toolbar {
    background: #f8f9fa;
    border-bottom: 2px solid #e8ecf1;
    padding: 10px;
}

.btn-primary {
    transition: all 0.3s;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

.alert {
    border-radius: 8px;
    border: none;
}
</style>

<!-- Add CSRF token meta tag if not exists -->
@if(!View::hasSection('meta'))
<meta name="csrf-token" content="{{ csrf_token() }}">
@endif
@endpush
