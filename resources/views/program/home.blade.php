@extends('layouts.main')

@section('title', $program->name)

@section('content')
<section class="py-5 tm-container-outer" style="background: white; min-height: 500px;">
    <div class="container">
        @if($program->home_content)
            {{-- Custom home content from admin - no card wrapper --}}
            {!! $program->home_content !!}
        @else
            {{-- Default content when no custom content set --}}
            <div class="row">
                <div class="col-12 mb-4">
                    <h3 class="mb-3">Tentang {{ $program->name }}</h3>
                    <p class="tm-text-gray">{{ $program->description }}</p>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
