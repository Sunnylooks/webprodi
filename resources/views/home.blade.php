<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=5">
    <meta name="description" content="Journey - Your travel companion for the best destinations">
    <meta name="theme-color" content="#69c6ba">

    <title>Journey - {{ config('app.name', 'Laravel') }}</title>

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>    
        <div class="tm-top-bar" id="tm-top-bar">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg narbar-light">
                        <a class="navbar-brand mr-auto" href="#">
                            <img src="{{ asset('img/matana-logo.png') }}" alt="Matana logo">
                            Journey
                        </a>
                        <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                            <ul class="navbar-nav ml-auto">
                              <li class="nav-item">
                                <a class="nav-link active" href="#top">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tm-section-2">Top Destinations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tm-section-3">Recommended Places</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tm-section-4">Contact Us</a>
                            </li>
                        </ul>
                    </div>                            
                </nav>
            </div>
        </div>
    </div>

    <div class="tm-page-wrap mx-auto">
        <section class="tm-banner">
            <div class="tm-container-outer tm-banner-bg">
                <div class="container">

                    <div class="row tm-banner-row tm-banner-row-header">
                        <div class="col-xs-12">
                            <div class="tm-banner-header">
                                <h1 class="text-uppercase tm-banner-title">Let's begin</h1>
                                <img src="{{ asset('img/dots-3.png') }}" alt="Dots">
                                <p class="tm-banner-subtitle">We assist you to choose the best.</p>
                                <a href="javascript:void(0)" class="tm-down-arrow-link"><i class="fa fa-2x fa-angle-down tm-down-arrow"></i></a>       
                            </div>    
                        </div>
                    </div>

                    <div class="row tm-banner-row" id="tm-section-search">
                        <form action="{{ url('/') }}" method="get" class="tm-search-form tm-section-pad-2">
                            <div class="form-row tm-search-form-row">                                
                                <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                    <label for="inputCity">Choose Your Destination</label>
                                    <input name="destination" type="text" class="form-control" id="inputCity" placeholder="Type your destination...">
                                </div>
                                <div class="form-group tm-form-group tm-form-group-1">                                    
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                        <label for="inputRoom">How many rooms?</label>
                                        <select name="room" class="form-control tm-select" id="inputRoom">
                                            <option value="1" selected>1 Room</option>
                                            <option value="2">2 Rooms</option>
                                            <option value="3">3 Rooms</option>
                                            <option value="4">4 Rooms</option>
                                            <option value="5">5 Rooms</option>
                                            <option value="6">6 Rooms</option>
                                            <option value="7">7 Rooms</option>
                                            <option value="8">8 Rooms</option>
                                            <option value="9">9 Rooms</option>
                                            <option value="10">10 Rooms</option>
                                        </select>                                        
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">                                       
                                        <label for="inputAdult">Adult</label>     
                                        <select name="adult" class="form-control tm-select" id="inputAdult">
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>                                        
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                        <label for="inputChildren">Children</label>                                            
                                        <select name="children" class="form-control tm-select" id="inputChildren">
                                            <option value="0" selected>0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                        </select>                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-row tm-search-form-row">
                                <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                    <label for="inputCheckIn">Check In Date</label>
                                    <input name="check-in" type="text" class="form-control" id="inputCheckIn" placeholder="Check In">
                                </div>
                                <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                    <label for="inputCheckOut">Check Out Date</label>
                                    <input name="check-out" type="text" class="form-control" id="inputCheckOut" placeholder="Check Out">
                                </div>
                                <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                    <label for="btnSubmit">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="btnSubmit">Check Availability</button>
                                </div>
                            </div>                              
                        </form>                             
                    </div>

                    <div class="tm-banner-overlay"></div>
                </div>
            </div>
        </section>

        <section class="p-5 tm-container-outer tm-bg-gray">            
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">                        
                        <h2 class="text-uppercase mb-4">Your <strong>Journey</strong> is our priority</h2>
                        <p class="mb-4">Nullam auctor, sapien sit amet lacinia euismod, lorem magna lobortis massa, in tincidunt mi metus quis lectus. Duis nec lobortis velit. Vivamus id magna vulputate, tempor ante eget, tempus augue. Maecenas ultricies neque magna.</p>
                        <a href="#" class="text-uppercase btn-primary tm-btn">Continue explore</a>                              
                    </div>
                </div>
            </div>            
        </section>
        
        <div class="tm-container-outer" id="tm-section-2">
            <section class="tm-slideshow-section">
                <div class="tm-slideshow">
                    <img src="{{ asset('img/tm-img-01.jpg') }}" alt="Image">
                    <img src="{{ asset('img/tm-img-02.jpg') }}" alt="Image">
                    <img src="{{ asset('img/tm-img-03.jpg') }}" alt="Image">    
                </div>
                <div class="tm-slideshow-description tm-bg-primary">
                    <h2 class="">Europe's most visited places</h2>
                    <p>Aenean in lacus nec dolor fermentum congue. Maecenas ut velit pharetra, pharetra tortor sit amet, vulputate sem. Vestibulum mi nibh, faucibus ac eros id, sagittis tincidunt velit. Proin interdum ullamcorper faucibus. Ut mi nunc, sollicitudin non pulvinar id, sagittis eget diam.</p>
                    <a href="#" class="text-uppercase tm-btn tm-btn-white tm-btn-white-primary">Continue Reading</a>
                </div>
            </section>
            <section class="clearfix tm-slideshow-section tm-slideshow-section-reverse">
                <div class="tm-right tm-slideshow tm-slideshow-highlight">
                    <img src="{{ asset('img/tm-img-02.jpg') }}" alt="Image">
                    <img src="{{ asset('img/tm-img-03.jpg') }}" alt="Image">
                    <img src="{{ asset('img/tm-img-01.jpg') }}" alt="Image">
                </div> 

                <div class="tm-slideshow-description tm-slideshow-description-left tm-bg-highlight">
                    <h2 class="">Asia's most popular places</h2>
                    <p>Vivamus in massa ullamcorper nunc auctor accumsan ac at arcu. Donec sagittis mattis pharetra. Proin commodo, ante et volutpat pulvinar, arcu arcu ullamcorper diam, id maximus sem tellus id sem. Suspendisse eget rhoncus diam. Fusce urna elit, porta nec ullamcorper id.</p>
                    <a href="#" class="text-uppercase tm-btn tm-btn-white tm-btn-white-highlight">Continue Reading</a>
                </div>                        
            </section>
            <section class="tm-slideshow-section">
                <div class="tm-slideshow">
                    <img src="{{ asset('img/tm-img-03.jpg') }}" alt="Image">
                    <img src="{{ asset('img/tm-img-02.jpg') }}" alt="Image">
                    <img src="{{ asset('img/tm-img-01.jpg') }}" alt="Image">
                </div>
                <div class="tm-slideshow-description tm-bg-primary">
                    <h2 class="">America's most famous places</h2>
                    <p>Donec nec laoreet diam, at vehicula ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse nec dapibus nunc, quis viverra metus. Morbi eget diam gravida, euismod magna vel, tempor urna.</p>
                    <a href="#" class="text-uppercase tm-btn tm-btn-white tm-btn-white-primary">Continue Reading</a>
                </div>
            </section>
        </div>

        <div class="tm-container-outer" id="tm-section-3">
            <ul class="nav nav-pills tm-tabs-links">
                <li class="tm-tab-link-li">
                    <a href="#1a" data-toggle="tab" class="tm-tab-link">
                        <img src="{{ asset('img/north-america.png') }}" alt="Image" class="img-fluid">
                        North America
                    </a>
                </li>
                <li class="tm-tab-link-li">
                    <a href="#2a" data-toggle="tab" class="tm-tab-link">
                        <img src="{{ asset('img/south-america.png') }}" alt="Image" class="img-fluid">
                        South America
                    </a>
                </li>
                <li class="tm-tab-link-li">
                    <a href="#3a" data-toggle="tab" class="tm-tab-link">
                        <img src="{{ asset('img/europe.png') }}" alt="Image" class="img-fluid">
                        Europe
                    </a>
                </li>
                <li class="tm-tab-link-li">
                    <a href="#4a" data-toggle="tab" class="tm-tab-link active">
                        <img src="{{ asset('img/asia.png') }}" alt="Image" class="img-fluid">
                        Asia
                    </a>
                </li>
                <li class="tm-tab-link-li">
                    <a href="#5a" data-toggle="tab" class="tm-tab-link">
                        <img src="{{ asset('img/africa.png') }}" alt="Image" class="img-fluid">
                        Africa
                    </a>
                </li>
                <li class="tm-tab-link-li">
                    <a href="#6a" data-toggle="tab" class="tm-tab-link">
                        <img src="{{ asset('img/australia.png') }}" alt="Image" class="img-fluid">
                        Australia
                    </a>
                </li>
                <li class="tm-tab-link-li">
                    <a href="#7a" data-toggle="tab" class="tm-tab-link">
                        <img src="{{ asset('img/antartica.png') }}" alt="Image" class="img-fluid">
                        Antartica
                    </a>
                </li>
            </ul>
            <div class="tab-content clearfix">
                <!-- Tab 1 - North America -->
                <div class="tab-pane fade" id="1a">
                    <div class="tm-recommended-place-wrap">
                        <div class="tm-recommended-place">
                            <img src="{{ asset('img/tm-img-06.jpg') }}" alt="Image" class="img-fluid tm-recommended-img">
                            <div class="tm-recommended-description-box">
                                <h3 class="tm-recommended-title">North Garden Resort</h3>
                                <p class="tm-text-highlight">One North</p>
                                <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                            </div>
                            <a href="#" class="tm-recommended-price-box">
                                <p class="tm-recommended-price">$110</p>
                                <p class="tm-recommended-price-link">Continue Reading</p>
                            </a>                        
                        </div>
                        <div class="tm-recommended-place">
                            <img src="{{ asset('img/tm-img-07.jpg') }}" alt="Image" class="img-fluid tm-recommended-img">
                            <div class="tm-recommended-description-box">
                                <h3 class="tm-recommended-title">Felis nec dignissim</h3>
                                <p class="tm-text-highlight">Two North</p>
                                <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                            </div>
                            <a href="#" class="tm-recommended-price-box">
                                <p class="tm-recommended-price">$120</p>
                                <p class="tm-recommended-price-link">Continue Reading</p>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="text-uppercase btn-primary tm-btn mx-auto tm-d-table">Show More Places</a>
                </div>

                <!-- Tab 4 - Asia (Active) -->
                <div class="tab-pane fade show active" id="4a">
                    <div class="tm-recommended-place-wrap">
                        <div class="tm-recommended-place">
                            <img src="{{ asset('img/tm-img-06.jpg') }}" alt="Image" class="img-fluid tm-recommended-img">
                            <div class="tm-recommended-description-box">
                                <h3 class="tm-recommended-title">Asia Resort Hotel</h3>
                                <p class="tm-text-highlight">Singapore</p>
                                <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                            </div>
                            <a href="#" class="tm-recommended-price-box">
                                <p class="tm-recommended-price">$440</p>
                                <p class="tm-recommended-price-link">Continue Reading</p>
                            </a>                        
                        </div>
                        <div class="tm-recommended-place">
                            <img src="{{ asset('img/tm-img-07.jpg') }}" alt="Image" class="img-fluid tm-recommended-img">
                            <div class="tm-recommended-description-box">
                                <h3 class="tm-recommended-title">Nullam eget est a nisl</h3>
                                <p class="tm-text-highlight">Yangon, Myanmar</p>
                                <p class="tm-text-gray">Sed egestas, odio nec bibendum mattis, quam odio hendrerit risus, eu varius eros lacus sit amet lectus. Donec blandit luctus dictum...</p>   
                            </div>
                            <a href="#" class="tm-recommended-price-box">
                                <p class="tm-recommended-price">$450</p>
                                <p class="tm-recommended-price-link">Continue Reading</p>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="text-uppercase btn-primary tm-btn mx-auto tm-d-table">Show More Places</a>
                </div>
            </div>
        </div>

        <div class="tm-container-outer tm-position-relative" id="tm-section-4">
            <div id="google-map"></div>
            <form action="{{ url('/contact') }}" method="post" class="tm-contact-form">
                @csrf
                <div class="form-group tm-name-container">
                    <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name" required/>
                </div>
                <div class="form-group tm-email-container">
                    <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email" required/>
                </div>
                <div class="form-group">
                    <input type="text" id="contact_subject" name="contact_subject" class="form-control" placeholder="Subject" required/>
                </div>
                <div class="form-group">
                    <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary tm-btn-primary tm-btn-send text-uppercase">Send Message Now</button>
            </form>
        </div>

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
<script src="{{ asset('js/jquery.singlePageNav.min.js') }}"></script>
<script src="{{ asset('slick/slick.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script> 
    /* Google Maps */
    var map = '';
    var center;

    function initialize() {
        var mapOptions = {
            zoom: 16,
            center: new google.maps.LatLng(37.769725, -122.462154),
            scrollwheel: false
        };

        map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

        google.maps.event.addDomListener(map, 'idle', function() {
            calculateCenter();
        });

        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(center);
        });
    }

    function calculateCenter() {
        center = map.getCenter();
    }

    function loadGoogleMap(){
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&callback=initialize';
        document.body.appendChild(script);
    } 

    /* DOM is ready */
    $(function(){
        // Change top navbar on scroll
        $(window).on("scroll", function() {
            if($(window).scrollTop() > 100) {
                $(".tm-top-bar").addClass("active");
            } else {                    
                $(".tm-top-bar").removeClass("active");
            }
        });

        // Smooth scroll to search form
        $('.tm-down-arrow-link').click(function(){
            $.scrollTo('#tm-section-search', 300, {easing:'linear'});
        });

        // Date Picker in Search form
        var pickerCheckIn = datepicker('#inputCheckIn');
        var pickerCheckOut = datepicker('#inputCheckOut');

        // Update nav links on scroll
        $('#tm-top-bar').singlePageNav({
            currentClass:'active',
            offset: 60
        });

        // Close navbar after clicked
        $('.nav-link').click(function(){
            $('#mainNav').removeClass('show');
        });

        // Slick Carousel
        $('.tm-slideshow').slick({
            infinite: true,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1
        });

        loadGoogleMap();
        $('.tm-current-year').text(new Date().getFullYear());
    });
</script>

</body>
</html>
