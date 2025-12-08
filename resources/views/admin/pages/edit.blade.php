@extends('layouts.main')

@section('title', 'Edit Subpage')

@section('content')
<section class="tm-container-outer py-5" style="background: white;">
    <div class="container" style="max-width: 860px;">
        <h3 class="mb-4">Edit Subpage</h3>
        <form method="POST" action="{{ url('/admin/pages/'.$page->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6 mb-3">
                    <label>Program Studi</label>
                    <select name="program_id" class="form-control" required>
                        @foreach($programs as $pr)
                            <option value="{{ $pr->id }}" {{ $page->program_id === $pr->id ? 'selected' : '' }}>{{ $pr->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Kategori</label>
                    <select name="category" class="form-control" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ $page->category === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Konten</label>
                <textarea name="content" class="form-control" rows="8">{{ old('content', $page->content) }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label>Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $page->sort_order) }}">
            </div>

            <div class="mb-3">
                <label class="mb-2 d-block">Lampiran Saat Ini</label>
                @forelse($page->attachments as $att)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="remove_attachments[]" value="{{ $att->id }}" id="att{{ $att->id }}">
                        <label class="form-check-label" for="att{{ $att->id }}">
                            {{ $att->original_name }} ({{ number_format(($att->size ?? 0)/1024, 1) }} KB)
                        </label>
                        <a href="/{{ $att->file_path }}" target="_blank" class="ml-2">Lihat</a>
                    </div>
                @empty
                    <p class="text-muted">Tidak ada lampiran.</p>
                @endforelse
            </div>

            <div class="form-group mb-4">
                <label>Tambah Lampiran</label>
                <input type="file" name="attachments[]" class="form-control" multiple>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('/admin/pages') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
        <form method="POST" action="{{ url('/admin/pages/'.$page->id) }}" class="mt-3" onsubmit="return confirm('Hapus subpage ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Hapus Subpage</button>
        </form>
    </div>
</section>
@endsection
