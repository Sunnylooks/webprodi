@extends('layouts.main')

@section('title', 'Home')

@section('content')
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
                <form action="{{ url('/search') }}" method="get" class="tm-search-form tm-section-pad-2">
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
                <a href="{{ url('/destinations') }}" class="text-uppercase btn-primary tm-btn">Continue explore</a>                              
            </div>
        </div>
    </div>            
</section>
@endsection

@push('scripts')
<script>
    $(function(){
        // Smooth scroll to search form
        $('.tm-down-arrow-link').click(function(){
            $.scrollTo('#tm-section-search', 300, {easing:'linear'});
        });

        // Date Picker in Search form
        var pickerCheckIn = datepicker('#inputCheckIn');
        var pickerCheckOut = datepicker('#inputCheckOut');
    });
</script>
@endpush
