@extends('layouts.main')

@section('title', 'Web Prodi')

@section('content')
<section class="tm-banner">
    <div class="tm-container-outer tm-banner-bg">
        <div class="container">
            <div class="row tm-banner-row tm-banner-row-header">
                <div class="col-xs-12">
                    <div class="tm-banner-header">
                        <h1 class="text-uppercase tm-banner-title">Web Prodi</h1>
                        <img src="{{ asset('img/dots-3.png') }}" alt="Dots">
                        <p class="tm-banner-subtitle">Universitas Matana</p>
                        <p class="tm-banner-subtitle" style="font-size: 1.2rem;">Mencetak Lulusan Berkualitas dan Berdaya Saing Global</p>
                    </div>    
                </div>
            </div>
        </div>
        <div class="tm-banner-overlay"></div>
    </div>
</section>

<section class="p-5 tm-container-outer tm-bg-gray">            
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">                        
                <h2 class="text-uppercase mb-4">Selamat Datang di <strong>Web Prodi</strong></h2>
                <p class="mb-4">Web Prodi Universitas Matana berkomitmen untuk menghasilkan lulusan yang berkualitas, inovatif, dan siap bersaing di era industri 4.0. Dengan didukung oleh fasilitas modern dan tenaga pengajar yang berpengalaman.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body p-4">
                        <i class="fa fa-graduation-cap fa-4x text-primary mb-3"></i>
                        <h4>8 Program Studi</h4>
                        <p>Terakreditasi Unggul</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body p-4">
                        <i class="fa fa-users fa-4x text-primary mb-3"></i>
                        <h4>2000+ Mahasiswa</h4>
                        <p>Mahasiswa Aktif</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body p-4">
                        <i class="fa fa-trophy fa-4x text-primary mb-3"></i>
                        <h4>50+ Prestasi</h4>
                        <p>Tingkat Nasional & Internasional</p>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</section>

<section class="py-5 tm-container-outer" style="background: white;">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-8 text-center text-md-left">
                <h2 class="text-uppercase mb-2">Program <strong>Studi</strong></h2>
                <p class="mb-0">Pilih program studi yang sesuai dengan minat dan bakatmu</p>
            </div>
            <div class="col-md-4 mt-3 mt-md-0">
                <input id="programFilter" type="text" class="form-control" placeholder="Cari program studi...">
            </div>
        </div>

        <div class="row">
            @foreach(($programs ?? []) as $pr)
                <div class="col-md-4 mb-4 program-card" data-name="{{ Str::lower($pr->name) }}" data-desc="{{ Str::lower($pr->description) }}">
                    <div class="tm-recommended-place">
                        <img src="{{ asset('img/tm-img-06.jpg') }}" alt="{{ $pr->name }}" class="img-fluid tm-recommended-img">
                        <div class="tm-recommended-description-box">
                            <h3 class="tm-recommended-title"><a href="{{ url('/p/'.$pr->slug) }}" style="color: inherit; text-decoration: none;">{{ $pr->name }}</a></h3>
                            <p class="tm-text-highlight">S1 - Terakreditasi</p>
                            <p class="tm-text-gray">{{ $pr->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<script>
  $(function(){
    $('#programFilter').on('input', function(){
      var q = $(this).val().toLowerCase();
      $('.program-card').each(function(){
        var n = $(this).data('name');
        var d = $(this).data('desc');
        var show = !q || (n && n.indexOf(q) > -1) || (d && d.indexOf(q) > -1);
        $(this).toggle(show);
      });
    });
  });
</script>
@endpush

<section class="py-5 tm-container-outer tm-bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-uppercase mb-3">Prestasi <strong>Terbaru</strong></h2>
                <p>Prestasi mahasiswa dan dosen Web Prodi</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <i class="fa fa-trophy fa-3x text-warning mr-4"></i>
                            <div>
                                <h4>Juara 1 Hackathon Nasional 2024</h4>
                                <p class="tm-text-highlight mb-2">Tim: Code Warriors - Teknik Informatika</p>
                                <p class="tm-text-gray">Memenangkan kompetisi hackathon tingkat nasional dengan mengembangkan aplikasi Smart City Management System.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <i class="fa fa-trophy fa-3x text-warning mr-4"></i>
                            <div>
                                <h4>Best Paper Award - IEEE Conference</h4>
                                <p class="tm-text-highlight mb-2">Dr. Ahmad Fauzi, M.Kom</p>
                                <p class="tm-text-gray">Penelitian tentang Machine Learning untuk deteksi dini penyakit mendapat penghargaan Best Paper di konferensi internasional.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 text-center mt-3">
                <a href="{{ url('/prestasi') }}" class="text-uppercase btn-primary tm-btn">Lihat Semua Prestasi</a>
            </div>
        </div>
    </div>
</section>

<section class="py-5 tm-container-outer" style="background: white;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-uppercase mb-3">Berita & <strong>Pengumuman</strong></h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-01.jpg') }}" class="card-img-top" alt="Berita">
                    <div class="card-body">
                        <small class="text-muted">15 November 2024</small>
                        <h5 class="mt-2">Pendaftaran Mahasiswa Baru 2025</h5>
                        <p class="tm-text-gray">Pendaftaran mahasiswa baru gelombang 1 telah dibuka. Segera daftarkan dirimu!</p>
                        <a href="#" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-02.jpg') }}" class="card-img-top" alt="Berita">
                    <div class="card-body">
                        <small class="text-muted">10 November 2024</small>
                        <h5 class="mt-2">Workshop AI & Machine Learning</h5>
                        <p class="tm-text-gray">Web Prodi mengadakan workshop tentang AI dan Machine Learning untuk mahasiswa.</p>
                        <a href="#" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-03.jpg') }}" class="card-img-top" alt="Berita">
                    <div class="card-body">
                        <small class="text-muted">5 November 2024</small>
                        <h5 class="mt-2">Kerjasama dengan Industri</h5>
                        <p class="tm-text-gray">Penandatanganan MoU dengan perusahaan teknologi terkemuka untuk program magang.</p>
                        <a href="#" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
