@extends('layouts.admin')

@section('title', 'Manage Content')

@section('content')
<div class="admin-page-header">
    <h1 class="admin-page-title">
        <i class="fa fa-edit"></i> Manage Content
    </h1>
    <p class="admin-page-subtitle">Edit konten halaman dengan mudah</p>
</div>

<div class="admin-card">
    <div class="admin-card-header" style="padding: 20px; border-bottom: 1px solid #e8ecf1;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="mb-0">Pilih Program & Kategori</h5>
            </div>
        </div>
    </div>
    
    <div class="admin-card-body" style="padding: 25px;">
        <!-- Filter Program -->
        @if(auth()->user()->role === 'superadmin')
        <div class="form-group mb-4">
            <label class="form-label"><strong>Program Studi</strong></label>
            <select class="form-control" id="programSelect" onchange="filterByProgram(this.value)">
                <option value="">-- Pilih Program --</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ $selectedProgramId == $program->id ? 'selected' : '' }}>
                        {{ $program->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @else
        <div class="alert alert-info mb-4">
            <i class="fa fa-university"></i> <strong>{{ auth()->user()->program->name }}</strong>
        </div>
        @endif

        @if($selectedProgramId && $categories->isNotEmpty())
            <!-- Categories & Pages -->
            @foreach($categories as $category)
                <div class="category-section mb-4">
                    <div class="category-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 20px; border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 10px;">
                        @if($category->icon)
                            <i class="{{ $category->icon }}" style="font-size: 20px;"></i>
                        @endif
                        <h5 class="mb-0" style="font-weight: 600;">{{ $category->name }}</h5>
                        <span class="badge badge-light ml-auto">
                            {{ isset($pages[$category->name]) ? $pages[$category->name]->count() : 0 }} pages
                        </span>
                    </div>
                    
                    <div class="category-content" style="border: 1px solid #e8ecf1; border-top: none; border-radius: 0 0 8px 8px; overflow: hidden;">
                        @if(isset($pages[$category->name]) && $pages[$category->name]->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" style="margin: 0;">
                                    <thead style="background: #f8f9fa;">
                                        <tr>
                                            <th style="padding: 15px;">Judul Halaman</th>
                                            <th style="padding: 15px; width: 120px;">Status</th>
                                            <th style="padding: 15px; width: 150px; text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pages[$category->name] as $page)
                                        <tr>
                                            <td style="padding: 15px;">
                                                <i class="fa fa-file-text text-muted"></i>
                                                <strong>{{ $page->title }}</strong>
                                                <br>
                                                <small class="text-muted">
                                                    <i class="fa fa-clock-o"></i> 
                                                    Updated: {{ $page->updated_at->format('d M Y, H:i') }}
                                                </small>
                                            </td>
                                            <td style="padding: 15px;">
                                                @if($page->is_published)
                                                    <span class="badge badge-success">
                                                        <i class="fa fa-check"></i> Published
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary">
                                                        <i class="fa fa-eye-slash"></i> Draft
                                                    </span>
                                                @endif
                                            </td>
                                            <td style="padding: 15px; text-align: center;">
                                                <a href="{{ route('admin.content.edit', $page->id) }}" 
                                                   class="btn btn-sm btn-primary" 
                                                   style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                                                    <i class="fa fa-edit"></i> Edit Content
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="p-4 text-center text-muted">
                                <i class="fa fa-inbox" style="font-size: 48px; opacity: 0.3; display: block; margin-bottom: 10px;"></i>
                                <p class="mb-0">Belum ada halaman di kategori ini</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center py-5">
                <i class="fa fa-info-circle" style="font-size: 64px; color: #ccc; margin-bottom: 20px; display: block;"></i>
                <h5 class="text-muted">Silakan pilih program studi untuk melihat konten</h5>
            </div>
        @endif
    </div>
</div>

<script>
function filterByProgram(programId) {
    if (programId) {
        window.location.href = '{{ route("admin.content.index") }}?program_id=' + programId;
    } else {
        window.location.href = '{{ route("admin.content.index") }}';
    }
}
</script>

<style>
.category-section {
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.2s;
}

.category-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
}

.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.admin-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}
</style>
@endsection
