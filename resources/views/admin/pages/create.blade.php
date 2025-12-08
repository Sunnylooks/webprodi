@extends('layouts.main')

@section('title', 'Tambah Subpage')

@section('content')
<section class="tm-container-outer py-5" style="background: white;">
    <div class="container" style="max-width: 720px;">
        <h3 class="mb-4">Tambah Subpage</h3>
        <form method="POST" action="{{ url('/admin/pages') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Program Studi</label>
                <select name="program_id" class="form-control" required>
                    @foreach($programs as $pr)
                        <option value="{{ $pr->id }}">{{ $pr->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Kategori</label>
                <select name="category" class="form-control" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Konten</label>
                <textarea name="content" class="form-control" rows="6"></textarea>
            </div>
            <div class="form-group mb-3">
                <label>Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="0">
            </div>
            <div class="form-group mb-4">
                <label>Lampiran (boleh lebih dari satu)</label>
                <input type="file" name="attachments[]" class="form-control" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</section>
@endsection

