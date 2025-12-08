@extends('layouts.main')

@section('title', 'Prestasi Web Prodi')

@section('content')
<section class="tm-banner">
    <div class="tm-container-outer tm-banner-bg">
        <div class="container">
            <div class="row tm-banner-row tm-banner-row-header">
                <div class="col-xs-12">
                    <div class="tm-banner-header">
                        <h1 class="text-uppercase tm-banner-title">Prestasi Kami</h1>
                        <img src="{{ asset('img/dots-3.png') }}" alt="Dots">
                        <p class="tm-banner-subtitle">Kebanggaan Web Prodi</p>
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
                <h2 class="text-uppercase mb-4">Prestasi <strong>Mahasiswa</strong></h2>
            </div>
        </div>
        
        <div class="row">
            <!-- Prestasi 1 -->
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="mr-3" style="min-width: 60px;">
                                <i class="fa fa-trophy fa-3x text-warning"></i>
                            </div>
                            <div>
                                <span class="badge badge-warning mb-2">Juara 1</span>
                                <h4 class="mb-2">Hackathon Nasional 2024</h4>
                                <p class="tm-text-highlight mb-2"><strong>Tim: Code Warriors</strong></p>
                                <p class="text-muted mb-2"><i class="fa fa-calendar mr-2"></i>15 November 2024</p>
                                <p class="text-muted mb-3"><i class="fa fa-graduation-cap mr-2"></i>Teknik Informatika</p>
                            </div>
                        </div>
                        <p style="text-align: justify;">
                            Tim Code Warriors yang terdiri dari 3 mahasiswa Teknik Informatika berhasil memenangkan kompetisi Hackathon Nasional 2024 dengan mengembangkan aplikasi Smart City Management System yang inovatif. Aplikasi ini memanfaatkan teknologi IoT dan Machine Learning untuk monitoring dan manajemen kota pintar.
                        </p>
                        <hr>
                        <p class="mb-0"><strong>Anggota Tim:</strong> Ahmad Budi, Siti Rahma, Dedi Firmansyah</p>
                    </div>
                </div>
            </div>
            
            <!-- Prestasi 2 -->
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="mr-3" style="min-width: 60px;">
                                <i class="fa fa-trophy fa-3x text-warning"></i>
                            </div>
                            <div>
                                <span class="badge badge-warning mb-2">Juara 2</span>
                                <h4 class="mb-2">Gemastik 2024 - Data Mining</h4>
                                <p class="tm-text-highlight mb-2"><strong>Tim: Data Miners</strong></p>
                                <p class="text-muted mb-2"><i class="fa fa-calendar mr-2"></i>10 Oktober 2024</p>
                                <p class="text-muted mb-3"><i class="fa fa-graduation-cap mr-2"></i>Sistem Informasi</p>
                            </div>
                        </div>
                        <p style="text-align: justify;">
                            Tim Data Miners meraih juara 2 pada kompetisi Gemastik 2024 kategori Data Mining. Tim ini berhasil mengembangkan model prediksi untuk analisis perilaku konsumen e-commerce dengan akurasi tinggi menggunakan algoritma machine learning yang sophisticated.
                        </p>
                        <hr>
                        <p class="mb-0"><strong>Anggota Tim:</strong> Rina Melati, Hendra Kusuma, Maya Putri</p>
                    </div>
                </div>
            </div>
            
            <!-- Prestasi 3 -->
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="mr-3" style="min-width: 60px;">
                                <i class="fa fa-trophy fa-3x text-warning"></i>
                            </div>
                            <div>
                                <span class="badge badge-info mb-2">Juara 3</span>
                                <h4 class="mb-2">Robotics Competition 2024</h4>
                                <p class="tm-text-highlight mb-2"><strong>Tim: RoboTech</strong></p>
                                <p class="text-muted mb-2"><i class="fa fa-calendar mr-2"></i>5 September 2024</p>
                                <p class="text-muted mb-3"><i class="fa fa-graduation-cap mr-2"></i>Teknik Komputer</p>
                            </div>
                        </div>
                        <p style="text-align: justify;">
                            Tim RoboTech berhasil meraih juara 3 pada kompetisi Robotics tingkat nasional dengan mengembangkan robot autonomous yang mampu menavigasi dan menyelesaikan berbagai tantangan dengan efisien menggunakan sensor dan algoritma pathfinding yang canggih.
                        </p>
                        <hr>
                        <p class="mb-0"><strong>Anggota Tim:</strong> Eko Prasetyo, Fitri Sari, Bambang Wijaya</p>
                    </div>
                </div>
            </div>
            
            <!-- Prestasi 4 -->
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="mr-3" style="min-width: 60px;">
                                <i class="fa fa-trophy fa-3x text-warning"></i>
                            </div>
                            <div>
                                <span class="badge badge-success mb-2">Best UI/UX</span>
                                <h4 class="mb-2">Mobile App Competition 2024</h4>
                                <p class="tm-text-highlight mb-2"><strong>Tim: AppDevs</strong></p>
                                <p class="text-muted mb-2"><i class="fa fa-calendar mr-2"></i>20 Agustus 2024</p>
                                <p class="text-muted mb-3"><i class="fa fa-graduation-cap mr-2"></i>Teknik Informatika</p>
                            </div>
                        </div>
                        <p style="text-align: justify;">
                            Tim AppDevs memenangkan kategori Best UI/UX Design pada kompetisi Mobile App Development dengan aplikasi mobile untuk layanan kesehatan mental yang memiliki desain interface yang user-friendly dan experience yang engaging.
                        </p>
                        <hr>
                        <p class="mb-0"><strong>Anggota Tim:</strong> Linda Wijaya, Arif Santoso, Maya Kusuma</p>
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
                <h2 class="text-uppercase mb-4">Prestasi <strong>Dosen</strong></h2>
            </div>
        </div>
        
        <div class="row">
            <!-- Prestasi Dosen 1 -->
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="mr-3" style="min-width: 60px;">
                                <i class="fa fa-certificate fa-3x text-primary"></i>
                            </div>
                            <div>
                                <span class="badge badge-primary mb-2">Best Paper Award</span>
                                <h4 class="mb-2">IEEE International Conference 2024</h4>
                                <p class="tm-text-highlight mb-2"><strong>Dr. Ahmad Fauzi, S.Kom., M.Kom.</strong></p>
                                <p class="text-muted mb-2"><i class="fa fa-calendar mr-2"></i>1 November 2024</p>
                                <p class="text-muted mb-3"><i class="fa fa-graduation-cap mr-2"></i>Teknik Informatika</p>
                            </div>
                        </div>
                        <p style="text-align: justify;">
                            Penelitian tentang "Machine Learning Approach for Early Detection of Mental Health Disorders" mendapat penghargaan Best Paper Award di IEEE International Conference on Artificial Intelligence 2024. Penelitian ini menggunakan deep learning untuk deteksi dini gangguan kesehatan mental dengan akurasi 95%.
                        </p>
                        <hr>
                        <p class="mb-0"><strong>Publikasi:</strong> IEEE Conference Proceedings - Indexed Scopus Q1</p>
                    </div>
                </div>
            </div>
            
            <!-- Prestasi Dosen 2 -->
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="mr-3" style="min-width: 60px;">
                                <i class="fa fa-certificate fa-3x text-primary"></i>
                            </div>
                            <div>
                                <span class="badge badge-primary mb-2">Research Grant</span>
                                <h4 class="mb-2">Hibah Penelitian Kemenristek 2024</h4>
                                <p class="tm-text-highlight mb-2"><strong>Prof. Dr. Budi Santoso, S.T., M.T.</strong></p>
                                <p class="text-muted mb-2"><i class="fa fa-calendar mr-2"></i>15 September 2024</p>
                                <p class="text-muted mb-3"><i class="fa fa-graduation-cap mr-2"></i>Teknik Informatika</p>
                            </div>
                        </div>
                        <p style="text-align: justify;">
                            Berhasil mendapatkan hibah penelitian dari Kemenristek senilai 500 juta rupiah untuk penelitian tentang "Development of Smart Grid System for Renewable Energy Optimization". Penelitian ini akan berlangsung selama 2 tahun dengan melibatkan 5 mahasiswa.
                        </p>
                        <hr>
                        <p class="mb-0"><strong>Dana Hibah:</strong> Rp 500.000.000,- (Dua Tahun)</p>
                    </div>
                </div>
            </div>
            
            <!-- Prestasi Dosen 3 -->
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="mr-3" style="min-width: 60px;">
                                <i class="fa fa-certificate fa-3x text-primary"></i>
                            </div>
                            <div>
                                <span class="badge badge-success mb-2">Patent</span>
                                <h4 class="mb-2">Hak Paten Sistem IoT</h4>
                                <p class="tm-text-highlight mb-2"><strong>Dr. Ahmad Rizki, S.T., M.T.</strong></p>
                                <p class="text-muted mb-2"><i class="fa fa-calendar mr-2"></i>10 Agustus 2024</p>
                                <p class="text-muted mb-3"><i class="fa fa-graduation-cap mr-2"></i>Teknik Komputer</p>
                            </div>
                        </div>
                        <p style="text-align: justify;">
                            Mendapatkan hak paten untuk sistem "IoT-Based Smart Home Security System with AI-Powered Facial Recognition". Sistem ini mengintegrasikan teknologi IoT dengan artificial intelligence untuk meningkatkan keamanan rumah pintar dengan pengenalan wajah real-time.
                        </p>
                        <hr>
                        <p class="mb-0"><strong>Nomor Paten:</strong> IDP000123456 - Terdaftar di DJHKI</p>
                    </div>
                </div>
            </div>
            
            <!-- Prestasi Dosen 4 -->
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="mr-3" style="min-width: 60px;">
                                <i class="fa fa-certificate fa-3x text-primary"></i>
                            </div>
                            <div>
                                <span class="badge badge-info mb-2">Scopus Q1</span>
                                <h4 class="mb-2">Publikasi Jurnal Internasional</h4>
                                <p class="tm-text-highlight mb-2"><strong>Dr. Siti Aisyah, S.Kom., M.Kom.</strong></p>
                                <p class="text-muted mb-2"><i class="fa fa-calendar mr-2"></i>5 Juli 2024</p>
                                <p class="text-muted mb-3"><i class="fa fa-graduation-cap mr-2"></i>Sistem Informasi</p>
                            </div>
                        </div>
                        <p style="text-align: justify;">
                            Publikasi artikel ilmiah berjudul "Big Data Analytics for Business Intelligence in E-Commerce: A Systematic Literature Review" di jurnal internasional terindeks Scopus Q1 dengan impact factor 4.5. Artikel ini telah dikutip oleh 25 peneliti internasional.
                        </p>
                        <hr>
                        <p class="mb-0"><strong>Jurnal:</strong> International Journal of Information Management - IF: 4.5</p>
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
                <h2 class="text-uppercase mb-4">Akreditasi & <strong>Sertifikasi</strong></h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <i class="fa fa-certificate fa-4x text-success mb-3"></i>
                        <h4>Akreditasi A</h4>
                        <p class="tm-text-highlight">3 Program Studi</p>
                        <hr>
                        <p class="tm-text-gray">Semua program studi di Web Prodi terakreditasi A oleh BAN-PT</p>
                        <p class="text-muted"><small>Berlaku hingga 2028</small></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <i class="fa fa-globe fa-4x text-primary mb-3"></i>
                        <h4>ISO 9001:2015</h4>
                        <p class="tm-text-highlight">Sertifikasi Internasional</p>
                        <hr>
                        <p class="tm-text-gray">Sistem manajemen mutu fakultas tersertifikasi ISO 9001:2015</p>
                        <p class="text-muted"><small>Berlaku hingga 2026</small></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <i class="fa fa-star fa-4x text-warning mb-3"></i>
                        <h4>ABET Accreditation</h4>
                        <p class="tm-text-highlight">In Progress</p>
                        <hr>
                        <p class="tm-text-gray">Sedang dalam proses akreditasi internasional ABET untuk Teknik Informatika</p>
                        <p class="text-muted"><small>Target 2025</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 tm-container-outer" style="background: white;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5 text-center">
                <h2 class="text-uppercase mb-4">Statistik <strong>Prestasi</strong></h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <h1 class="text-primary mb-2">50+</h1>
                        <h5>Total Prestasi</h5>
                        <p class="tm-text-gray">Tingkat Nasional & Internasional</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <h1 class="text-primary mb-2">100+</h1>
                        <h5>Publikasi Ilmiah</h5>
                        <p class="tm-text-gray">Jurnal Nasional & Internasional</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <h1 class="text-primary mb-2">25+</h1>
                        <h5>Hibah Penelitian</h5>
                        <p class="tm-text-gray">Total > Rp 5 Miliar</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <h1 class="text-primary mb-2">15+</h1>
                        <h5>Hak Paten</h5>
                        <p class="tm-text-gray">Terdaftar di DJHKI</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
