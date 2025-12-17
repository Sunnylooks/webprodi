<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=5">
    <meta name="description" content="WebProdi Admin Dashboard">
    <meta name="theme-color" content="#667eea">

    <title>@yield('title') - WebProdi Admin</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-animations.css') }}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="brand" style="display: flex; align-items: center; gap: 10px; text-align: center;">
                <img src="{{ asset('img/matana-logo.png') }}" alt="Matana" style="height: 40px; width: auto;">
                <span style="margin-left: 5px; font-size: 13px; line-height: 1.2;">Admin<br><small style="font-size: 9px; opacity: 0.8;">Web Prodi</small></span>
            </div>

            <nav class="admin-nav">
                <div class="nav-item {{ Request::is('admin') || Request::is('admin/') ? 'active' : '' }}" onclick="window.location='{{ url('/admin') }}'">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </div>

                @auth
                    @if(auth()->user()->role === 'superadmin')
                        <div style="padding: 10px 0; color: rgba(255,255,255,0.5); font-size: 11px; padding-left: 20px; text-transform: uppercase; margin-top: 10px;">Master Data</div>
                        
                        <div class="nav-item {{ Request::is('admin/programs*') ? 'active' : '' }}" onclick="window.location='{{ url('/admin/programs') }}'">
                            <i class="fa fa-university"></i>
                            <span>Program Studi</span>
                        </div>

                        <div class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}" onclick="window.location='{{ url('/admin/users') }}'">
                            <i class="fa fa-users"></i>
                            <span>Users</span>
                        </div>
                    @endif

                    <div style="padding: 10px 0; color: rgba(255,255,255,0.5); font-size: 11px; padding-left: 20px; text-transform: uppercase; margin-top: 10px;">Content</div>
                    
                    <div class="nav-item {{ Request::is('admin/pages*') ? 'active' : '' }}" onclick="window.location='{{ url('/admin/pages') }}'">
                        <i class="fa fa-file-text"></i>
                        <span>Subpages</span>
                    </div>

                    <div style="padding: 10px 0; color: rgba(255,255,255,0.5); font-size: 11px; padding-left: 20px; text-transform: uppercase; margin-top: 10px;">Account</div>
                    
                    <div class="nav-item" onclick="document.getElementById('logoutForm').submit()">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </div>

                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="admin-content">
            <!-- Header -->
            <div class="admin-header">
                <div class="admin-header-left">
                    <div class="admin-header-search">
                        <i class="fa fa-search"></i>
                        <input type="text" id="globalSearch" placeholder="Cari...">
                    </div>
                </div>
                <div class="admin-header-right">
                    <span class="admin-user-info" style="margin-right: 20px; color: #333; font-weight: 500; font-size: 13px;">
                        @auth
                            @if(auth()->user()->role === 'superadmin')
                                <i class="fa fa-shield"></i> Super Admin
                            @elseif(auth()->user()->program)
                                <i class="fa fa-university"></i> {{ auth()->user()->program->name }}
                            @else
                                <i class="fa fa-user"></i> Admin
                            @endif
                        @endauth
                    </span>
                </div>
            </div>

            <!-- Content -->
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/admin-animations.js') }}"></script>
</body>
</html>
