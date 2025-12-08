@extends('layouts.main')

@section('title', 'Top Destinations')

@section('content')
<div class="tm-top-bar-bg"></div>

<div class="tm-container-outer" style="margin-top: 119px;">
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

<section class="p-5 tm-container-outer tm-bg-gray">            
    <div class="container">
        <div class="row">
            <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">                        
                <h2 class="text-uppercase mb-4">Discover Amazing <strong>Destinations</strong></h2>
                <p class="mb-4">Explore the world's most beautiful and exciting destinations. From historic cities to pristine beaches, we help you find the perfect place for your next adventure.</p>
                <a href="{{ url('/places') }}" class="text-uppercase btn-primary tm-btn">View Recommended Places</a>                              
            </div>
        </div>
    </div>            
</section>
@endsection
