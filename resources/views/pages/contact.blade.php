@extends('layouts.main')

@section('title', 'Contact Us')

@section('content')
<div class="tm-top-bar-bg"></div>

<div class="tm-container-outer" style="margin-top: 119px;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1 class="text-uppercase mb-4">Contact <strong>Us</strong></h1>
                <p class="mb-4">Get in touch with us for any inquiries</p>
            </div>
        </div>
    </div>
</div>

<div class="tm-container-outer tm-position-relative">
    <div id="google-map"></div>
    <form action="{{ url('/contact/submit') }}" method="post" class="tm-contact-form">
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

<section class="p-5 tm-container-outer tm-bg-gray">            
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <i class="fa fa-3x fa-map-marker text-primary mb-3"></i>
                <h4>Address</h4>
                <p>123 Travel Street<br>Adventure City, AC 12345</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <i class="fa fa-3x fa-phone text-primary mb-3"></i>
                <h4>Phone</h4>
                <p>+1 234 567 8900<br>+1 234 567 8901</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <i class="fa fa-3x fa-envelope text-primary mb-3"></i>
                <h4>Email</h4>
                <p>info@journey.com<br>support@journey.com</p>
            </div>
        </div>
    </div>            
</section>
@endsection

@push('scripts')
<script>
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

    $(function(){
        loadGoogleMap();
    });
</script>
@endpush
