@extends('layouts.main')

@section('title', 'Dosen Web Prodi')

@section('content')
<section class="tm-banner">
    <div class="tm-container-outer tm-banner-bg">
        <div class="container">
            <div class="row tm-banner-row tm-banner-row-header">
                <div class="col-xs-12">
                    <div class="tm-banner-header">
                        <h1 class="text-uppercase tm-banner-title">Dosen Web Prodi</h1>
                        <img src="{{ asset('img/dots-3.png') }}" alt="Dots">
                        <p class="tm-banner-subtitle">Tenaga Pengajar Berkualitas dan Berpengalaman</p>
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
            <div class="col-12 mb-5">
                <h2 class="text-uppercase mb-4">Dosen <strong>Teknik Informatika</strong></h2>
            </div>
        </div>
        
        <div class="row">
            <!-- Dosen 1 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-01.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Prof. Dr. Budi Santoso, S.T., M.T.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Dekan / Profesor</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Computer Networks, Cloud Computing</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>budi.santoso@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S3 - Stanford University</small></p>
                    </div>
                </div>
            </div>
            
            <!-- Dosen 2 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-04.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Dr. Ahmad Fauzi, S.Kom., M.Kom.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Ketua Prodi / Lektor Kepala</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Artificial Intelligence, Machine Learning</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>ahmad.fauzi@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S3 - Institut Teknologi Bandung</small></p>
                    </div>
                </div>
            </div>
            
            <!-- Dosen 3 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-05.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Dr. Rina Kusuma, S.T., M.T.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Sekretaris Prodi / Lektor</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Software Engineering, Mobile Development</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>rina.kusuma@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S3 - Universitas Indonesia</small></p>
                    </div>
                </div>
            </div>
            
            <!-- Dosen 4 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-06.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Dr. Hendra Wijaya, S.Kom., M.Kom.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Dosen / Lektor</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Data Science, Big Data Analytics</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>hendra.wijaya@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S3 - Universitas Gadjah Mada</small></p>
                    </div>
                </div>
            </div>
            
            <!-- Dosen 5 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-07.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Maya Sari, S.Kom., M.T.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Dosen / Asisten Ahli</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Web Development, UI/UX Design</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>maya.sari@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S2 - Institut Teknologi Sepuluh Nopember</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 tm-container-outer" style="background: white;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="text-uppercase mb-4">Dosen <strong>Sistem Informasi</strong></h2>
            </div>
        </div>
        
        <div class="row">
            <!-- Dosen 1 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-02.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Dr. Siti Aisyah, S.Kom., M.Kom.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Wakil Dekan / Lektor Kepala</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Business Intelligence, Decision Support System</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>siti.aisyah@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S3 - Universitas Indonesia</small></p>
                    </div>
                </div>
            </div>
            
            <!-- Dosen 2 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-01.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Dr. Dedi Kurniawan, S.Kom., M.M.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Ketua Prodi / Lektor</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Enterprise Systems, E-Business</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>dedi.kurniawan@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S3 - Institut Teknologi Bandung</small></p>
                    </div>
                </div>
            </div>
            
            <!-- Dosen 3 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-03.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Linda Kusuma, S.Kom., M.T.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Sekretaris Prodi / Asisten Ahli</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Database Management, Information System Analysis</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>linda.kusuma@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S2 - Universitas Gadjah Mada</small></p>
                    </div>
                </div>
            </div>
            
            <!-- Dosen 4 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-04.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Arif Rahman, S.Kom., M.Kom.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Dosen / Asisten Ahli</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Information Security, Cyber Security</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>arif.rahman@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S2 - Institut Teknologi Sepuluh Nopember</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 tm-container-outer tm-bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="text-uppercase mb-4">Dosen <strong>Teknik Komputer</strong></h2>
            </div>
        </div>
        
        <div class="row">
            <!-- Dosen 1 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-03.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Dr. Ahmad Rizki, S.T., M.T.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Wakil Dekan / Lektor Kepala</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Embedded Systems, IoT</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>ahmad.rizki@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S3 - Institut Teknologi Bandung</small></p>
                    </div>
                </div>
            </div>
            
            <!-- Dosen 2 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-05.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Dr. Bambang Hartono, S.T., M.Eng.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Ketua Prodi / Lektor</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Computer Architecture, Digital Systems</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>bambang.hartono@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S3 - National University of Singapore</small></p>
                    </div>
                </div>
            </div>
            
            <!-- Dosen 3 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-06.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Eko Prasetyo, S.T., M.T.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Sekretaris Prodi / Asisten Ahli</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: Robotics, Automation Systems</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>eko.prasetyo@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S2 - Institut Teknologi Bandung</small></p>
                    </div>
                </div>
            </div>
            
            <!-- Dosen 4 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <img src="{{ asset('img/tm-img-07.jpg') }}" class="card-img-top" alt="Dosen" style="height: 300px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h4 class="mb-2">Fitri Handayani, S.T., M.T.</h4>
                        <p class="tm-text-highlight mb-2"><i class="fa fa-briefcase mr-2"></i>Dosen / Asisten Ahli</p>
                        <p class="tm-text-gray mb-3">Spesialisasi: VLSI Design, Hardware Security</p>
                        <hr>
                        <p class="mb-1"><small><i class="fa fa-envelope mr-2"></i>fitri.handayani@universitasxyz.ac.id</small></p>
                        <p class="mb-1"><small><i class="fa fa-graduation-cap mr-2"></i>S2 - Universitas Gadjah Mada</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
