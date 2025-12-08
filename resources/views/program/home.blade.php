@extends('layouts.main')

@section('title', $program->name)

@section('content')
<section class="tm-banner">
    <div class="tm-container-outer tm-banner-bg" style="background-image:url('{{ $program->banner_image ? asset($program->banner_image) : asset('img/tm-img-06.jpg') }}'); background-size:cover; background-position:center;">
        <div class="container">
            <div class="row tm-banner-row tm-banner-row-header">
                <div class="col-xs-12">
                    <div class="tm-banner-header">
                        <h1 class="text-uppercase tm-banner-title">{{ $program->name }}</h1>
                        <img src="{{ asset('img/dots-3.png') }}" alt="Dots">
                        @if($program->faculty)
                        <p class="tm-banner-subtitle">{{ $program->faculty }}</p>
                        @endif
                    </div>    
                </div>
            </div>
        </div>
        <div class="tm-banner-overlay"></div>
    </div>
</section>

 

<section class="py-5 tm-container-outer" style="background: white;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="mb-3">Tentang {{ $program->name }}</h3>
                <p class="tm-text-gray">{{ $program->description }}</p>
            </div>
        </div>
    </div>
</section>
@endsection
