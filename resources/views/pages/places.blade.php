@extends('layouts.main')

@section('title', 'Recommended Places')

@section('content')
<div class="tm-top-bar-bg"></div>

<div class="tm-container-outer" style="margin-top: 119px;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1 class="text-uppercase mb-4">Recommended <strong>Places</strong></h1>
                <p class="mb-4">Choose your favorite destination and start your journey</p>
            </div>
        </div>
    </div>

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
@endsection
