@extends('layouts.main')

@section('title', 'Portal Prodi')

@section('content')
<section class="portal-section">
    <div class="container">
        <!-- Header Section -->
        <div class="portal-header">
            <div class="header-content">
                <h1 class="portal-title">Portal Program Studi</h1>
                <p class="portal-subtitle">Pilih program studi @auth atau akses dashboard admin @endauth</p>
            </div>
            @auth
            <div class="header-action">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
            @endauth
        </div>

        <!-- Cards Grid -->
        <div class="cards-grid">
            {{-- Program Studi Cards --}}
            @foreach($programs as $program)
                <a href="/p/{{ $program->slug }}" class="card-link">
                    <div class="program-card">
                        <div class="card-image">
                            @if($program->banner_image)
                                <img src="{{ asset('storage/' . $program->banner_image) }}" 
                                     alt="{{ $program->name }}">
                            @else
                                <div class="card-image-placeholder">
                                    <i class="fa fa-book"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">{{ $program->name }}</h3>
                            <p class="card-faculty">{{ $program->faculty ?? 'Program Studi' }}</p>
                            <div class="card-action">
                                <span>Buka Program</span>
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

            {{-- Admin Card - hanya untuk superadmin dan kaprodi --}}
            @auth
            @if(in_array(auth()->user()->role, ['superadmin', 'kaprodi']))
            <a href="/admin" class="card-link">
                <div class="program-card admin-card">
                    <div class="card-image">
                        <div class="card-image-placeholder admin-placeholder">
                            <i class="fa fa-cog"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Admin</h3>
                        <p class="card-faculty">Dashboard Administrasi</p>
                        <div class="card-action admin-action">
                            <span>Buka Admin</span>
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @endauth
        </div>
    </div>
</section>

<style>
    /* Reset & Base */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Portal Section */
    .portal-section {
        background: #ffffff;
        min-height: calc(100vh - 100px);
        padding: 2rem 1rem;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        width: 100%;
    }

    /* Header */
    .portal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 3rem;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .header-content {
        flex: 1;
        min-width: 250px;
    }

    .portal-title {
        color: #000000;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        line-height: 1.2;
    }

    .portal-subtitle {
        color: rgba(0, 0, 0, 0.6);
        font-size: 1rem;
        margin: 0;
    }

    .btn-logout {
        background: #f8f9fa;
        color: #000000;
        border: 1px solid #e2e8f0;
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .btn-logout:hover {
        background: #e2e8f0;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-logout i {
        font-size: 1rem;
    }

    /* Cards Grid - FIXED: Same size for all cards */
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        align-items: start;
        justify-items: stretch;
        width: 100%;
    }

    .card-link {
        text-decoration: none;
        display: flex;
        width: 100%;
        margin: 0;
        padding: 0;
    }

    /* Program Card - FIXED: Set exact height and width */
    .program-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        height: 320px;
        display: flex;
        flex-direction: column;
        margin: 0;
        padding: 0;
    }

    .program-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    /* Card Image - FIXED: Same height for all */
    .card-image {
        width: 100%;
        height: 160px;
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .program-card:hover .card-image img {
        transform: scale(1.05);
    }

    .card-image-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-image-placeholder i {
        font-size: 3rem;
        color: white;
        opacity: 0.9;
    }

    /* Card Content - FIXED: Control text overflow */
    .card-content {
        padding: 1.25rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        min-height: 0;
    }

    .card-title {
        color: #2d3748;
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0 0 0.5rem 0;
        padding: 0;
        line-height: 1.4;
        /* FIXED: Truncate long titles */
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 2.8rem;
    }

    .card-faculty {
        color: #718096;
        font-size: 0.875rem;
        margin: 0 0 1rem 0;
        padding: 0;
        flex: 1;
        /* FIXED: Truncate long faculty names */
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 1.25rem;
    }

    .card-action {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #667eea;
        font-weight: 600;
        font-size: 0.875rem;
        transition: gap 0.3s ease;
        margin-top: auto;
    }

    .program-card:hover .card-action {
        gap: 0.75rem;
    }

    .card-action i {
        font-size: 0.875rem;
        transition: transform 0.3s ease;
    }

    .program-card:hover .card-action i {
        transform: translateX(4px);
    }

    /* Admin Card Styles */
    .admin-card {
        border-left: 4px solid #f5576c;
    }

    .admin-placeholder {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .admin-action {
        color: #f5576c;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .cards-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .portal-section {
            padding: 1.5rem 1rem;
        }

        .portal-header {
            margin-bottom: 2rem;
        }

        .portal-title {
            font-size: 1.5rem;
        }

        .portal-subtitle {
            font-size: 0.9rem;
        }

        .cards-grid {
            gap: 1rem;
        }

        .card-image {
            height: 140px;
        }

        .program-card {
            height: 300px;
        }

        .btn-logout span {
            display: none;
        }

        .btn-logout {
            padding: 0.625rem;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .cards-grid {
            grid-template-columns: 1fr;
        }

        .portal-title {
            font-size: 1.25rem;
        }

        .card-content {
            padding: 1rem;
        }
    }

    /* Accessibility */
    .card-link:focus .program-card {
        outline: 3px solid rgba(102, 126, 234, 0.5);
        outline-offset: 2px;
    }

    @media (prefers-reduced-motion: reduce) {
        .program-card,
        .card-image img,
        .card-action i,
        .btn-logout {
            transition: none;
        }
    }

    
    @media print {
        .btn-logout {
            display: none;
        }

        .program-card {
            break-inside: avoid;
        }
    }
</style>
@endsection