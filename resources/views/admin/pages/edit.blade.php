@extends('layouts.admin-no-search')

@section('title', 'Edit Subpage')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <a href="{{ url('/admin/pages') }}" class="btn btn-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; transition: all 0.3s ease;">
            <i class="fa fa-arrow-left"></i> Kembali ke Subpage
        </a>
        <h2 style="margin-top: 1rem; font-weight: 600; color: #2d3748;">Edit Subpage</h2>
        <p style="color: #718096; margin: 0;">Perbarui informasi subpage program studi</p>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; border: none;">
            <h5 class="alert-heading"><i class="fa fa-exclamation-circle"></i> Ada kesalahan!</h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Form Column -->
        <div class="col-lg-8">
            <div class="table-card" style="border-radius: 12px; background: white; padding: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                <form method="POST" action="{{ url('/admin/pages/'.$page->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Program & Category -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 500; color: #2d3748; margin-bottom: 0.5rem;">
                                <i class="fa fa-book" style="color: #667eea; margin-right: 0.5rem;"></i> Program Studi
                            </label>
                            <select name="program_id" class="form-select @error('program_id') is-invalid @enderror" style="border-radius: 8px; border: 1px solid #e2e8f0; padding: 0.75rem; font-size: 0.95rem;" required>
                                <option value="">-- Pilih Program Studi --</option>
                                @foreach($programs as $pr)
                                    <option value="{{ $pr->id }}" {{ $page->program_id === $pr->id ? 'selected' : '' }}>
                                        {{ $pr->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <small class="text-danger" style="margin-top: 0.25rem; display: block;"><i class="fa fa-times-circle"></i> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 500; color: #2d3748; margin-bottom: 0.5rem;">
                                <i class="fa fa-tag" style="color: #f6ad55; margin-right: 0.5rem;"></i> Kategori
                            </label>
                            <select name="category" class="form-select @error('category') is-invalid @enderror" style="border-radius: 8px; border: 1px solid #e2e8f0; padding: 0.75rem; font-size: 0.95rem;" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ $page->category === $cat ? 'selected' : '' }}>
                                        {{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <small class="text-danger" style="margin-top: 0.25rem; display: block;"><i class="fa fa-times-circle"></i> {{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="form-label" style="font-weight: 500; color: #2d3748; margin-bottom: 0.5rem;">
                            <i class="fa fa-heading" style="color: #667eea; margin-right: 0.5rem;"></i> Judul
                        </label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="titleInput" value="{{ old('title', $page->title) }}" placeholder="Masukkan judul subpage" style="border-radius: 8px; border: 1px solid #e2e8f0; padding: 0.75rem; font-size: 0.95rem;" required>
                        @error('title')
                            <small class="text-danger" style="margin-top: 0.25rem; display: block;"><i class="fa fa-times-circle"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div class="mb-4">
                        <label class="form-label" style="font-weight: 500; color: #2d3748; margin-bottom: 0.5rem;">
                            <i class="fa fa-link" style="color: #667eea; margin-right: 0.5rem;"></i> Slug
                        </label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slugInput" value="{{ old('slug', $page->slug) }}" placeholder="Akan otomatis dari judul" style="border-radius: 8px; border: 1px solid #e2e8f0; padding: 0.75rem; font-size: 0.95rem; background-color: #f7fafc; color: #718096;" readonly>
                        <small class="text-muted" style="margin-top: 0.25rem; display: block;"><i class="fa fa-info-circle"></i> Otomatis dihasilkan dari judul</small>
                        @error('slug')
                            <small class="text-danger" style="margin-top: 0.25rem; display: block;"><i class="fa fa-times-circle"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label class="form-label" style="font-weight: 500; color: #2d3748; margin-bottom: 0.5rem;">
                            <i class="fa fa-align-left" style="color: #667eea; margin-right: 0.5rem;"></i> Konten
                        </label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="contentInput" rows="8" placeholder="Masukkan konten subpage..." style="border-radius: 8px; border: 1px solid #e2e8f0; padding: 0.75rem; font-size: 0.95rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">{{ old('content', $page->content) }}</textarea>
                        @error('content')
                            <small class="text-danger" style="margin-top: 0.25rem; display: block;"><i class="fa fa-times-circle"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Lampiran Saat Ini -->
                    @if($page->attachments->count() > 0)
                        <div class="mb-4">
                            <label class="form-label" style="font-weight: 500; color: #2d3748; margin-bottom: 0.75rem;">
                                <i class="fa fa-paperclip" style="color: #f6ad55; margin-right: 0.5rem;"></i> Lampiran Saat Ini
                            </label>
                            <div style="background-color: #f7fafc; border: 1px dashed #cbd5e0; border-radius: 8px; padding: 1rem;">
                                @foreach($page->attachments as $att)
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="remove_attachments[]" value="{{ $att->id }}" id="att{{ $att->id }}">
                                        <label class="form-check-label" for="att{{ $att->id }}" style="margin-left: 0.5rem; color: #2d3748;">
                                            <i class="fa fa-file"></i> {{ $att->original_name }}
                                            <span class="badge bg-secondary" style="margin-left: 0.5rem;">{{ number_format(($att->size ?? 0)/1024, 1) }} KB</span>
                                            <a href="/{{ $att->file_path }}" target="_blank" class="ms-2" style="color: #667eea; text-decoration: none;">
                                                <i class="fa fa-external-link-alt"></i> Lihat
                                            </a>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <small class="text-muted" style="margin-top: 0.25rem; display: block;"><i class="fa fa-info-circle"></i> Centang untuk menghapus lampiran</small>
                        </div>
                    @endif

                    <!-- Tambah Lampiran -->
                    <div class="mb-4">
                        <label class="form-label" style="font-weight: 500; color: #2d3748; margin-bottom: 0.5rem;">
                            <i class="fa fa-cloud-upload" style="color: #667eea; margin-right: 0.5rem;"></i> Tambah Lampiran Baru
                        </label>
                        <input type="file" name="attachments[]" class="form-control @error('attachments') is-invalid @enderror" id="attachmentsInput" multiple style="border-radius: 8px; border: 1px solid #e2e8f0; padding: 0.75rem; font-size: 0.95rem;">
                        <small class="text-muted" style="margin-top: 0.25rem; display: block;"><i class="fa fa-info-circle"></i> Anda dapat memilih beberapa file sekaligus</small>
                        @error('attachments')
                            <small class="text-danger" style="margin-top: 0.25rem; display: block;"><i class="fa fa-times-circle"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-2" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e2e8f0;">
                        <button type="submit" class="btn" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; padding: 0.75rem 2rem; font-weight: 500; transition: all 0.3s ease;">
                            <i class="fa fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="{{ url('/admin/pages') }}" class="btn" style="background: #e2e8f0; color: #2d3748; border: none; border-radius: 8px; padding: 0.75rem 2rem; font-weight: 500; transition: all 0.3s ease;">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </form>

                <!-- Delete Button -->
                <form method="POST" action="{{ url('/admin/pages/'.$page->id) }}" onsubmit="return confirm('Anda yakin ingin menghapus subpage ini? Tindakan ini tidak dapat dibatalkan.');" style="margin-top: 2rem;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" style="border-radius: 8px; padding: 0.75rem 2rem; font-weight: 500;">
                        <i class="fa fa-trash"></i> Hapus Subpage
                    </button>
                </form>
            </div>
        </div>

        <!-- Help Sidebar -->
        <div class="col-lg-4">
            <div class="table-card" style="border-radius: 12px; background: linear-gradient(135deg, #f5f7ff 0%, #f0e5ff 100%); padding: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08); position: sticky; top: 100px;">
                <h5 style="font-weight: 600; color: #667eea; margin-bottom: 1.5rem;">
                    <i class="fa fa-lightbulb"></i> Tips & Panduan
                </h5>

                <div style="margin-bottom: 1.5rem;">
                    <h6 style="font-weight: 500; color: #2d3748; margin-bottom: 0.5rem;">
                        <i class="fa fa-pencil" style="color: #667eea;"></i> Judul
                    </h6>
                    <p style="font-size: 0.9rem; color: #4a5568; margin: 0;">Gunakan judul yang deskriptif dan mudah dipahami. Hindari judul yang terlalu panjang.</p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <h6 style="font-weight: 500; color: #2d3748; margin-bottom: 0.5rem;">
                        <i class="fa fa-link" style="color: #667eea;"></i> Slug
                    </h6>
                    <p style="font-size: 0.9rem; color: #4a5568; margin: 0;">Slug dihasilkan otomatis dari judul. Digunakan untuk URL yang ramah-mesin pencari.</p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <h6 style="font-weight: 500; color: #2d3748; margin-bottom: 0.5rem;">
                        <i class="fa fa-align-left" style="color: #667eea;"></i> Konten
                    </h6>
                    <p style="font-size: 0.9rem; color: #4a5568; margin: 0;">Isi dengan informasi lengkap dan terstruktur. Anda bisa menggunakan format teks biasa.</p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <h6 style="font-weight: 500; color: #2d3748; margin-bottom: 0.5rem;">
                        <i class="fa fa-paperclip" style="color: #667eea;"></i> Lampiran
                    </h6>
                    <p style="font-size: 0.9rem; color: #4a5568; margin: 0;">Tambahkan dokumen, PDF, atau file pendukung lainnya. Ukuran file maksimal 10MB.</p>
                </div>

                <div style="background: white; border-left: 4px solid #667eea; padding: 1rem; border-radius: 6px;">
                    <p style="font-size: 0.9rem; color: #2d3748; margin: 0;">
                        <strong><i class="fa fa-info-circle"></i> Catatan:</strong> Semua perubahan akan tersimpan otomatis setelah Anda klik tombol Simpan Perubahan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-generate slug from title
    document.getElementById('titleInput').addEventListener('keyup', function() {
        const title = this.value;
        const slug = title
            .toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w-]/g, '')
            .replace(/-+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slugInput').value = slug || '';
    });
</script>
@endsection
