<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=5">
    <meta name="description" content="Journey - Your travel companion for the best destinations">
    <meta name="theme-color" content="#69c6ba">

    <title>@yield('title') - {{ config('app.name', 'Journey') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullscreen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flexible-utilities.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive-improvements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/prodi.css') }}">
<link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
<link rel="stylesheet" href="{{ asset('css/fullscreen.css') }}">
<link rel="stylesheet" href="{{ asset('css/flexible-utilities.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive-improvements.css') }}">
<link rel="stylesheet" href="{{ asset('css/prodi.css') }}">

<!-- LOGIN PAGE STYLE (BARU) -->
<link rel="stylesheet" href="{{ asset('css/auth-login.css') }}">
@stack('styles')
<link rel="stylesheet" href="{{ asset('css/auth-login.css') }}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="@yield('body_class')">


    <div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>    
        <div class="tm-top-bar" id="tm-top-bar">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand mr-auto" href="{{ isset($program) ? url('/p/'.$program->slug) : url('/') }}">
                            <img src="{{ asset('img/matana-logo.png') }}" alt="Matana logo">
                            Web Prodi
                        </a>
                        <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                            <ul class="navbar-nav ml-auto">
                                @php($allPrograms = \App\Models\Program::orderBy('name')->get())
                                @if($allPrograms->count())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{ Request::is('p/*') ? 'active' : '' }}" href="#" id="prodiDropdown" role="button" data-toggle="dropdown">
                                        Program Studi
                                    </a>
                                    <div class="dropdown-menu">
                                        @foreach($allPrograms as $p)
                                            <a class="dropdown-item" href="{{ url('/p/'.$p->slug) }}">{{ $p->name }}</a>
                                        @endforeach
                                    </div>
                                </li>
                                @endif
                                @if(isset($nav) && isset($program))
                                    @foreach($nav as $category => $items)
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">{{ $category }}</a>
                                            <div class="dropdown-menu">
                                                @foreach($items as $it)
                                                    <a class="dropdown-item" href="{{ url('/p/'.$program->slug.'/'.$it->slug) }}">{{ $it->title }}</a>
                                                @endforeach
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                                @auth
                                    @if(in_array(auth()->user()->role, ['superadmin','kaprodi']))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/admin') }}">Admin</a>
                                        </li>
                                        <li class="nav-item">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="nav-link btn btn-link" type="submit">Logout</button>
                                            </form>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                @endauth
                            </ul>
                        </div>                            
                    </nav>
                </div>
            </div>
        </div>

        <div class="tm-page-wrap mx-auto">
            @yield('content')

            <footer class="tm-container-outer">
                <p class="mb-0">Copyright © <span class="tm-current-year">{{ date('Y') }}</span> {{ config('app.name', 'Your Company') }}. 
                Designed by <a rel="nofollow" href="http://www.templatemo.com" target="_blank">Template Mo</a></p>
            </footer>
        </div>
    </div>

    <!-- load JS files -->
    <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    
    <script>
        $(function(){
            // Change top navbar on scroll
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 100) {
                    $(".tm-top-bar").addClass("active");
                } else {                    
                    $(".tm-top-bar").removeClass("active");
                }
            });

            // Close navbar after clicked
            $(document).on('click', '.nav-link', function(){
                var isDropdownToggle = $(this).hasClass('dropdown-toggle');
                var nav = $('#mainNav');
                var isMobile = window.matchMedia('(max-width: 992px)').matches;
                if (isMobile && nav.hasClass('show') && !isDropdownToggle) {
                    nav.removeClass('show');
                }
            });

            // Slick Carousel
            $('.tm-slideshow').slick({
                infinite: true,
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });

            $('.tm-current-year').text(new Date().getFullYear());

            // Ensure Bootstrap dropdown initialized
            $('.dropdown-toggle').dropdown();

            // Fix dropdown inside scrollable nav
            $('.navbar .dropdown').on('shown.bs.dropdown', function(){
                $(this).closest('.navbar-nav').css('overflow','visible');
            }).on('hide.bs.dropdown', function(){
                $(this).closest('.navbar-nav').css('overflowX','auto').css('overflowY','visible');
            });

            // No dynamic logo swapping; brand uses Matana logo directly
        });
    </script>
    
    @stack('scripts')
</body>
</html>
