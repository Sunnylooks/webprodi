@extends('layouts.main')

@section('title', 'Kelola Program Studi')

@section('content')
<section class="tm-container-outer py-5" style="background: white;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Program Studi</h3>
            @if(auth()->user()->role === 'superadmin')
            <a href="{{ url('/admin/programs/create') }}" class="btn btn-primary">Tambah Program</a>
            @endif
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Fakultas</th>
                    <th style="width:160px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $pr)
                <tr>
                    <td><a href="{{ url('/p/'.$pr->slug) }}" target="_blank">{{ $pr->name }}</a></td>
                    <td>{{ $pr->slug }}</td>
                    <td>{{ $pr->faculty }}</td>
                    <td>
                        @if(auth()->user()->role === 'superadmin')
                            <a href="{{ url('/admin/programs/'.$pr->id.'/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form method="POST" action="{{ url('/admin/programs/'.$pr->id) }}" style="display:inline" onsubmit="return confirm('Hapus program ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        @else
                            <span class="text-muted">Akses terbatas</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
