@extends('layouts.main')

@section('title', 'Admin')

@section('content')
@php
    $user = auth()->user();
    $programCount = \App\Models\Program::count();
    $pageQuery = \App\Models\ProgramPage::query();
    if ($user && $user->role === 'kaprodi') { $pageQuery->where('program_id', $user->program_id); }
    $pageCount = $pageQuery->count();
    $attachmentQuery = \App\Models\Attachment::query();
    if ($user && $user->role === 'kaprodi') { $attachmentQuery->whereIn('program_page_id', \App\Models\ProgramPage::where('program_id', $user->program_id)->pluck('id')); }
    $attachmentCount = $attachmentQuery->count();
    $recentPages = $pageQuery->with('program')->orderByDesc('id')->limit(6)->get();
    $programs = $user && $user->role === 'superadmin'
        ? \App\Models\Program::orderBy('name')->get()
        : \App\Models\Program::where('id', $user->program_id)->get();
@endphp
<section class="tm-container-outer py-5" style="background: white;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Dashboard Admin</h3>
            <div>
                <a class="btn btn-primary" href="{{ url('/admin/pages/create') }}">Tambah Subpage</a>
                @if($user && $user->role === 'superadmin')
                    <a class="btn btn-outline-primary" href="{{ url('/admin/programs/create') }}">Tambah Program</a>
                @endif
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Jumlah Program</h6>
                                <div class="display-4">{{ $programCount }}</div>
                            </div>
                            <i class="fa fa-university fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Jumlah Subpage</h6>
                                <div class="display-4">{{ $pageCount }}</div>
                            </div>
                            <i class="fa fa-files-o fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Total Lampiran</h6>
                                <div class="display-4">{{ $attachmentCount }}</div>
                            </div>
                            <i class="fa fa-paperclip fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Program Studi</span>
                        <a href="{{ url('/admin/programs') }}" class="btn btn-sm btn-outline-secondary">Lihat Semua</a>
                    </div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Slug</th>
                                    <th style="width:120px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programs as $pr)
                                    <tr>
                                        <td>{{ $pr->name }}</td>
                                        <td>{{ $pr->slug }}</td>
                                        <td>
                                            @if($user && $user->role === 'superadmin')
                                                <a href="{{ url('/admin/programs/'.$pr->id.'/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            @else
                                                <a href="{{ url('/p/'.$pr->slug) }}" class="btn btn-sm btn-outline-secondary" target="_blank">Buka</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Subpage Terbaru</span>
                        <a href="{{ url('/admin/pages') }}" class="btn btn-sm btn-outline-secondary">Lihat Semua</a>
                    </div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Program</th>
                                    <th>Judul</th>
                                    <th style="width:120px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentPages as $p)
                                    <tr>
                                        <td>{{ $p->program->name }}</td>
                                        <td>{{ $p->title }}</td>
                                        <td>
                                            <a href="{{ url('/admin/pages/'.$p->id.'/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <a href="{{ url('/p/'.$p->program->slug.'/'.$p->slug) }}" class="btn btn-sm btn-outline-secondary" target="_blank">Buka</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
