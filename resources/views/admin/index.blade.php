@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
@php
    $user = auth()->user();
    $programCount = \App\Models\Program::count();
    $userCount = \App\Models\User::count();
    $pageQuery = \App\Models\ProgramPage::query();
    if ($user && $user->role === 'kaprodi') { $pageQuery->where('program_id', $user->program_id); }
    $pageCount = $pageQuery->count();
    $attachmentQuery = \App\Models\Attachment::query();
    if ($user && $user->role === 'kaprodi') { $attachmentQuery->whereIn('program_page_id', \App\Models\ProgramPage::where('program_id', $user->program_id)->pluck('id')); }
    $attachmentCount = $attachmentQuery->count();
    $recentPages = $pageQuery->with('program')->orderByDesc('id')->limit(5)->get();
    $programs = $user && $user->role === 'superadmin'
        ? \App\Models\Program::orderBy('name')->get()
        : \App\Models\Program::where('id', $user->program_id)->get();
    $recentUsers = \App\Models\User::orderByDesc('id')->limit(5)->with('program')->get();
@endphp

<!-- Metric Cards -->
<div class="row mb-4">
    @if($user && $user->role === 'superadmin')
    <div class="col-md-6 col-lg-3 mb-3">
        <div class="metric-card orange">
            <div class="metric-card-header">
                <div class="metric-card-icon">
                    <i class="fa fa-university"></i>
                </div>
            </div>
            <div class="metric-label">Program Studi</div>
            <div class="metric-value">{{ $programCount }}</div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-3">
        <div class="metric-card green">
            <div class="metric-card-header">
                <div class="metric-card-icon">
                    <i class="fa fa-file-text"></i>
                </div>
            </div>
            <div class="metric-label">Total Subpage</div>
            <div class="metric-value">{{ $pageCount }}</div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-3">
        <div class="metric-card red">
            <div class="metric-card-header">
                <div class="metric-card-icon">
                    <i class="fa fa-paperclip"></i>
                </div>
            </div>
            <div class="metric-label">Total Lampiran</div>
            <div class="metric-value">{{ $attachmentCount }}</div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-3">
        <div class="metric-card blue">
            <div class="metric-card-header">
                <div class="metric-card-icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
            <div class="metric-label">Total Users</div>
            <div class="metric-value">{{ $userCount }}</div>
        </div>
    </div>
    @else
    <!-- Kaprodi View -->
    <div class="col-md-6 mb-3">
        <div class="metric-card green">
            <div class="metric-card-header">
                <div class="metric-card-icon">
                    <i class="fa fa-file-text"></i>
                </div>
            </div>
            <div class="metric-label">Total Subpage</div>
            <div class="metric-value">{{ $pageCount }}</div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="metric-card blue">
            <div class="metric-card-header">
                <div class="metric-card-icon">
                    <i class="fa fa-file-pdf-o"></i>
                </div>
            </div>
            <div class="metric-label">Laporan</div>
            <div class="metric-value">-</div>
        </div>
    </div>
    @endif
</div>

<div class="row">
    <!-- Program Studi Table -->
    @if($user && $user->role === 'superadmin')
    <div class="col-lg-6">
        <div class="table-card">
            <div class="table-card-header">
                <span>Program Studi</span>
                <a href="{{ url('/admin/programs') }}" class="btn btn-sm btn-light">Lihat Semua →</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $pr)
                        <tr>
                            <td>{{ $pr->name }}</td>
                            <td><small>{{ $pr->slug }}</small></td>
                            <td>
                                <a href="{{ url('/admin/programs/'.$pr->id.'/edit') }}" class="btn btn-sm btn-primary btn-sm-action">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-muted py-3">Tidak ada program</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Subpage Table -->
    <div class="col-lg-6">
        <div class="table-card">
            <div class="table-card-header">
                <span>Subpage Terbaru</span>
                <a href="{{ url('/admin/pages') }}" class="btn btn-sm btn-light">Lihat Semua →</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Program</th>
                        <th>Judul</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPages as $p)
                        <tr>
                            <td><small>{{ $p->program->name }}</small></td>
                            <td>{{ substr($p->title, 0, 20) }}{{ strlen($p->title) > 20 ? '...' : '' }}</td>
                            <td>
                                <a href="{{ url('/admin/pages/'.$p->id.'/edit') }}" class="btn btn-sm btn-primary btn-sm-action">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-muted py-3">Tidak ada subpage</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @else
    <!-- Kaprodi Subpage Table -->
    <div class="col-12">
        <div class="table-card">
            <div class="table-card-header">
                <span>Subpage {{ $user->program->name }}</span>
                <a href="{{ url('/admin/pages') }}" class="btn btn-sm btn-light">Lihat Semua →</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Slug</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPages as $p)
                        <tr>
                            <td><strong>{{ $p->title }}</strong></td>
                            <td><span class="badge badge-secondary">{{ $p->category }}</span></td>
                            <td><small>{{ $p->slug }}</small></td>
                            <td>
                                <a href="{{ url('/admin/pages/'.$p->id.'/edit') }}" class="btn btn-sm btn-primary btn-sm-action">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted py-3">Tidak ada subpage</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

<!-- Users Table for SuperAdmin -->
@if($user && $user->role === 'superadmin')
    <div class="row">
        <div class="col-12">
            <div class="table-card">
                <div class="table-card-header">
                    <span>Users Terbaru</span>
                    <a href="{{ url('/admin/users') }}" class="btn btn-sm btn-light">Kelola Users →</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Program</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentUsers as $u)
                            <tr>
                                <td>{{ $u->name }}</td>
                                <td><small>{{ $u->email }}</small></td>
                                <td>
                                    <span class="badge badge-{{ $u->role === 'superadmin' ? 'danger' : 'warning' }}">
                                        {{ $u->role === 'superadmin' ? 'Super Admin' : 'Kaprodi' }}
                                    </span>
                                </td>
                                <td><small>{{ $u->program?->name ?? '-' }}</small></td>
                                <td>
                                    <a href="{{ url('/admin/users/'.$u->id.'/edit') }}" class="btn btn-sm btn-primary btn-sm-action">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-muted py-3">Tidak ada users</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

@endsection
