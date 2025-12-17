@extends('layouts.main')

@section('title', $page->title)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/page-modern.css') }}">
@endpush

@section('content')
<section class="py-5 tm-container-outer" style="background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);">
    <div class="page-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">{{ $page->title }}</h1>
            <div class="page-meta">
                <span class="page-meta-item">
                    <i class="fa fa-folder page-meta-icon"></i>
                    <span>{{ $page->category }}</span>
                </span>
                <span class="page-meta-item">
                    <i class="fa fa-university page-meta-icon"></i>
                    <span>{{ $program->name }}</span>
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="page-content-card">
            {!! $page->content !!}
        </div>
    </div>
</section>
@endsection
