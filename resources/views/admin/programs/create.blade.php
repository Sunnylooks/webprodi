@extends('layouts.main')

@section('title', 'Tambah Program Studi')

@section('content')
<section class="tm-container-outer py-5" style="background: white;">
    <div class="container" style="max-width: 720px;">
        <h3 class="mb-4">Tambah Program Studi</h3>
        <form method="POST" action="{{ url('/admin/programs') }}">
            @csrf
            <div class="form-group mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Fakultas</label>
                <input type="text" name="faculty" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</section>
@endsection

