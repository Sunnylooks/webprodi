@extends('layouts.main')

@section('title', $page->title)

@section('content')
 

<section class="py-5 tm-container-outer" style="background: white;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="mb-2">{{ $page->title }}</h2>
                <small class="text-muted">Kategori: {{ $page->category }} • {{ $program->name }}</small>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body p-4">
                        {!! nl2br(e($page->content)) !!}
                    </div>
                </div>
            </div>
        </div>
        @if($page->attachments->count())
        <div class="row mt-4">
            <div class="col-12">
                <h5>Lampiran</h5>
                @foreach($page->attachments as $file)
                    @php($mime = $file->mime_type)
                    @if(\Illuminate\Support\Str::startsWith($mime, 'image/'))
                        <figure class="mb-3">
                            <img src="{{ asset($file->file_path) }}" alt="{{ $file->original_name }}" class="img-fluid rounded" style="width:100%;max-height:480px;object-fit:contain" loading="lazy">
                            <figcaption class="small text-muted mt-2">{{ $file->original_name }}</figcaption>
                        </figure>
                    @elseif($mime === 'application/pdf' || \Illuminate\Support\Str::endsWith($file->original_name, ['.pdf','.PDF']))
                        <div class="mb-3">
                            <iframe src="{{ asset($file->file_path) }}" style="width:100%;height:640px;border:1px solid #e5e7eb;border-radius:8px"></iframe>
                            <div class="small text-muted mt-2">{{ $file->original_name }}</div>
                        </div>
                    @elseif(\Illuminate\Support\Str::startsWith($mime, 'video/'))
                        <div class="mb-3">
                            <video src="{{ asset($file->file_path) }}" controls class="w-100 rounded" style="max-height:560px"></video>
                            <div class="small text-muted mt-2">{{ $file->original_name }}</div>
                        </div>
                    @elseif(\Illuminate\Support\Str::startsWith($mime, 'audio/'))
                        <div class="mb-3">
                            <audio src="{{ asset($file->file_path) }}" controls class="w-100"></audio>
                            <div class="small text-muted mt-2">{{ $file->original_name }}</div>
                        </div>
                    @else
                        <a class="attachment-chip" href="{{ asset($file->file_path) }}" target="_blank">
                            <i class="fa fa-paperclip"></i>{{ $file->original_name }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
