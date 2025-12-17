@extends('layouts.admin')

@section('title', 'Edit Home Page - ' . $program->name)

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
    .note-editor.note-frame {
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .section-tabs .nav-link {
        color: #495057;
        border-radius: 4px 4px 0 0;
    }
    .section-tabs .nav-link.active {
        background: #667eea;
        color: white;
        font-weight: 600;
    }
    .tab-content {
        background: white;
        border: 1px solid #dee2e6;
        border-top: none;
        padding: 20px;
        border-radius: 0 0 4px 4px;
    }
    .repeater-item {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        padding: 15px;
        margin-bottom: 10px;
        position: relative;
    }
    .repeater-item .btn-remove {
        position: absolute;
        top: 10px;
        right: 10px;
    }
    .image-preview {
        max-width: 200px;
        max-height: 150px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        margin-top: 10px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0">Edit Home Page</h1>
                    @if(auth()->user()->role === 'superadmin')
                        <p class="text-muted mb-0">{{ $program->name }}</p>
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

    <!-- Mode Switcher -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="alert alert-success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa fa-check-circle"></i>
                        <strong>Mode: Advanced</strong> - Edit home page dengan sections terstruktur (Hero, About, Keunggulan, dll).
                    </div>
                    <a href="{{ route('admin.programs.edit-home', array_merge(request()->all(), ['mode' => 'simple'])) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-toggle-off"></i> Kembali ke Simple Mode
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->user()->role === 'superadmin' && isset($programs))
    <div class="table-card mb-3">
        <div class="table-card-body">
            <form method="GET" action="{{ route('admin.programs.edit-home') }}" class="form-inline" id="programSelectForm">
                <input type="hidden" name="mode" value="advanced">
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

    <form action="{{ route('admin.programs.update-home') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="program_id" value="{{ $program->id }}">
        <input type="hidden" name="home_mode" value="advanced">

        <div class="table-card">
            <div class="table-card-body">
                <ul class="nav nav-tabs section-tabs mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#hero">
                            <i class="fa fa-star"></i> Hero Section
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#about">
                            <i class="fa fa-info-circle"></i> Tentang Prodi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#advantages">
                            <i class="fa fa-trophy"></i> Keunggulan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#vision">
                            <i class="fa fa-eye"></i> Visi & Misi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#stats">
                            <i class="fa fa-bar-chart"></i> Statistik
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#cta">
                            <i class="fa fa-bullhorn"></i> CTA Penutup
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <!-- Hero Section -->
                    <div id="hero" class="tab-pane fade show active">
                        <h5 class="mb-3">Hero Section (Bagian Pertama)</h5>
                        
                        <div class="form-group">
                            <label>Judul Utama (H1)</label>
                            <input type="text" name="hero_title" class="form-control" 
                                value="{{ old('hero_title', $program->hero_title) }}" 
                                placeholder="Contoh: Program Studi Arsitektur">
                        </div>

                        <div class="form-group">
                            <label>Subjudul / Tagline</label>
                            <textarea name="hero_subtitle" class="form-control" rows="2" 
                                placeholder="Contoh: Mengembangkan desain bangunan berkelanjutan dan inovatif">{{ old('hero_subtitle', $program->hero_subtitle) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Background Image</label>
                            <input type="file" name="hero_image" class="form-control-file" accept="image/*">
                            @if($program->hero_image)
                                <img src="{{ asset($program->hero_image) }}" class="image-preview" alt="Hero Image">
                            @endif
                            <small class="form-text text-muted">Rekomendasi: 1920x800px, maksimal 2MB</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h6>Tombol CTA 1</h6>
                                <div class="form-group">
                                    <label>Teks Tombol</label>
                                    <input type="text" name="hero_cta1_text" class="form-control" 
                                        value="{{ old('hero_cta1_text', $program->hero_cta1_text) }}" 
                                        placeholder="Lihat Profil">
                                </div>
                                <div class="form-group">
                                    <label>Link Tombol</label>
                                    <input type="text" name="hero_cta1_link" class="form-control" 
                                        value="{{ old('hero_cta1_link', $program->hero_cta1_link) }}" 
                                        placeholder="/p/{{ $program->slug }}/profil">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Tombol CTA 2 (Opsional)</h6>
                                <div class="form-group">
                                    <label>Teks Tombol</label>
                                    <input type="text" name="hero_cta2_text" class="form-control" 
                                        value="{{ old('hero_cta2_text', $program->hero_cta2_text) }}" 
                                        placeholder="Daftar Mahasiswa">
                                </div>
                                <div class="form-group">
                                    <label>Link Tombol</label>
                                    <input type="text" name="hero_cta2_link" class="form-control" 
                                        value="{{ old('hero_cta2_link', $program->hero_cta2_link) }}" 
                                        placeholder="https://...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Section -->
                    <div id="about" class="tab-pane fade">
                        <h5 class="mb-3">Tentang Program Studi (Ringkas)</h5>
                        
                        <div class="form-group">
                            <label>Konten (2-3 Paragraf)</label>
                            <textarea name="about_content" id="about_content" class="form-control">{{ old('about_content', $program->about_content) }}</textarea>
                            <small class="form-text text-muted">Hanya bold, list, dan link. Jangan terlalu panjang.</small>
                        </div>

                        <div class="form-group">
                            <label>Gambar Pendukung</label>
                            <input type="file" name="about_image" class="form-control-file" accept="image/*">
                            @if($program->about_image)
                                <img src="{{ asset($program->about_image) }}" class="image-preview" alt="About Image">
                            @endif
                            <small class="form-text text-muted">Contoh: gedung/kegiatan prodi</small>
                        </div>
                    </div>

                    <!-- Keunggulan -->
                    <div id="advantages" class="tab-pane fade">
                        <h5 class="mb-3">Keunggulan Program Studi</h5>
                        <p class="text-muted">Tampilkan 3-4 keunggulan utama prodi</p>
                        
                        <div id="advantages-container">
                            @php
                                $advantages = old('advantages', $program->advantages ?? []);
                                if(empty($advantages)) {
                                    $advantages = [['icon' => '', 'title' => '', 'description' => '']];
                                }
                            @endphp
                            @foreach($advantages as $index => $advantage)
                            <div class="repeater-item">
                                <button type="button" class="btn btn-sm btn-danger btn-remove" onclick="removeItem(this)">
                                    <i class="fa fa-times"></i>
                                </button>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Icon (Font Awesome)</label>
                                            <input type="text" name="advantages[{{ $index }}][icon]" class="form-control" 
                                                value="{{ $advantage['icon'] ?? '' }}" placeholder="fa-building">
                                            <small class="text-muted">Contoh: fa-building, fa-leaf</small>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" name="advantages[{{ $index }}][title]" class="form-control" 
                                                value="{{ $advantage['title'] ?? '' }}" placeholder="Desain Bangunan Modern">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi Singkat</label>
                                            <textarea name="advantages[{{ $index }}][description]" class="form-control" rows="2" 
                                                placeholder="Deskripsi keunggulan...">{{ $advantage['description'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-success" onclick="addAdvantage()">
                            <i class="fa fa-plus"></i> Tambah Keunggulan
                        </button>
                    </div>

                    <!-- Visi & Misi -->
                    <div id="vision" class="tab-pane fade">
                        <h5 class="mb-3">Visi & Misi</h5>
                        
                        <div class="form-group">
                            <label>Visi (1 Paragraf)</label>
                            <textarea name="vision" class="form-control" rows="3" 
                                placeholder="Menjadi program studi unggulan...">{{ old('vision', $program->vision) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Misi (Gunakan list/bullet)</label>
                            <textarea name="mission" id="mission" class="form-control">{{ old('mission', $program->mission) }}</textarea>
                            <small class="form-text text-muted">Gunakan bullet list untuk poin-poin misi</small>
                        </div>
                    </div>

                    <!-- Statistik -->
                    <div id="stats" class="tab-pane fade">
                        <h5 class="mb-3">Statistik Program Studi</h5>
                        <p class="text-muted">Angka-angka menarik tentang prodi (4 item maksimal)</p>
                        
                        <div id="stats-container">
                            @php
                                $statistics = old('statistics', $program->statistics ?? []);
                                if(empty($statistics)) {
                                    $statistics = [['number' => '', 'label' => '']];
                                }
                            @endphp
                            @foreach($statistics as $index => $stat)
                            <div class="repeater-item">
                                <button type="button" class="btn btn-sm btn-danger btn-remove" onclick="removeItem(this)">
                                    <i class="fa fa-times"></i>
                                </button>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Angka</label>
                                            <input type="text" name="statistics[{{ $index }}][number]" class="form-control" 
                                                value="{{ $stat['number'] ?? '' }}" placeholder="500+">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Label</label>
                                            <input type="text" name="statistics[{{ $index }}][label]" class="form-control" 
                                                value="{{ $stat['label'] ?? '' }}" placeholder="Mahasiswa Aktif">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-success" onclick="addStat()">
                            <i class="fa fa-plus"></i> Tambah Statistik
                        </button>
                    </div>

                    <!-- CTA Bottom -->
                    <div id="cta" class="tab-pane fade">
                        <h5 class="mb-3">Call to Action Penutup</h5>
                        
                        <div class="form-group">
                            <label>Judul CTA</label>
                            <input type="text" name="cta_title" class="form-control" 
                                value="{{ old('cta_title', $program->cta_title) }}" 
                                placeholder="Tertarik Bergabung dengan Program Studi Arsitektur?">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h6>Tombol 1</h6>
                                <div class="form-group">
                                    <label>Teks</label>
                                    <input type="text" name="cta_button1_text" class="form-control" 
                                        value="{{ old('cta_button1_text', $program->cta_button1_text) }}" 
                                        placeholder="Hubungi Kami">
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="cta_button1_link" class="form-control" 
                                        value="{{ old('cta_button1_link', $program->cta_button1_link) }}" 
                                        placeholder="mailto:...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Tombol 2 (Opsional)</h6>
                                <div class="form-group">
                                    <label>Teks</label>
                                    <input type="text" name="cta_button2_text" class="form-control" 
                                        value="{{ old('cta_button2_text', $program->cta_button2_text) }}" 
                                        placeholder="Lihat Kurikulum">
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="cta_button2_link" class="form-control" 
                                        value="{{ old('cta_button2_link', $program->cta_button2_link) }}" 
                                        placeholder="/p/{{ $program->slug }}/kurikulum">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa fa-save"></i> Simpan Semua Perubahan
                    </button>
                    <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary btn-lg">
                        <i class="fa fa-times"></i> Batal
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Summernote for rich text fields
    $('#about_content, #mission').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['para', ['ul', 'ol']],
            ['insert', ['link']],
            ['view', ['codeview']]
        ]
    });

    // Counter for dynamic fields
    window.advantageIndex = {{ count($advantages) }};
    window.statIndex = {{ count($statistics) }};
});

function addAdvantage() {
    const container = document.getElementById('advantages-container');
    const index = window.advantageIndex++;
    const html = `
        <div class="repeater-item">
            <button type="button" class="btn btn-sm btn-danger btn-remove" onclick="removeItem(this)">
                <i class="fa fa-times"></i>
            </button>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Icon (Font Awesome)</label>
                        <input type="text" name="advantages[${index}][icon]" class="form-control" placeholder="fa-building">
                        <small class="text-muted">Contoh: fa-building, fa-leaf</small>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="advantages[${index}][title]" class="form-control" placeholder="Desain Bangunan Modern">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea name="advantages[${index}][description]" class="form-control" rows="2" placeholder="Deskripsi keunggulan..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
}

function addStat() {
    const container = document.getElementById('stats-container');
    const index = window.statIndex++;
    const html = `
        <div class="repeater-item">
            <button type="button" class="btn btn-sm btn-danger btn-remove" onclick="removeItem(this)">
                <i class="fa fa-times"></i>
            </button>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Angka</label>
                        <input type="text" name="statistics[${index}][number]" class="form-control" placeholder="500+">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label>Label</label>
                        <input type="text" name="statistics[${index}][label]" class="form-control" placeholder="Mahasiswa Aktif">
                    </div>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
}

function removeItem(btn) {
    btn.closest('.repeater-item').remove();
}
</script>
@endsection
