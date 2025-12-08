@extends('layouts.main')

@section('title', 'Profil Fakultas')

@section('content')
<section class="tm-banner">
    <div class="tm-container-outer tm-banner-bg">
        <div class="container">
            <div class="row tm-banner-row tm-banner-row-header">
                <div class="col-xs-12">
                    <div class="tm-banner-header">
                        <h1 class="text-uppercase tm-banner-title">Profil Fakultas</h1>
                        <img src="{{ asset('img/dots-3.png') }}" alt="Dots">
                        <p class="tm-banner-subtitle">Web Prodi Universitas XYZ</p>
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
            <div class="col-12">
                <h2 class="text-uppercase mb-4">Tentang <strong>Web Prodi</strong></h2>
                <p style="font-size: 1.1rem; line-height: 1.8;">
                    Web Prodi Universitas XYZ didirikan pada tahun 2005 dengan visi menjadi program studi terkemuka yang menghasilkan lulusan berkualitas dan berdaya saing global. Program ini memiliki 3 program studi terakreditasi A, yaitu Teknik Informatika, Sistem Informasi, dan Teknik Komputer.
                </p>
                <p style="font-size: 1.1rem; line-height: 1.8;">
                    Dengan didukung oleh tenaga pengajar yang berkualifikasi S2 dan S3, serta fasilitas laboratorium yang modern, Web Prodi berkomitmen untuk menghasilkan lulusan yang tidak hanya unggul secara akademik, tetapi juga memiliki keterampilan praktis dan jiwa kewirausahaan.
                </p>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body p-4">
                        <h4 class="mb-3"><i class="fa fa-eye text-primary mr-2"></i> Visi</h4>
                        <p style="font-size: 1rem; line-height: 1.8;">
                            Menjadi Web Prodi terkemuka yang menghasilkan lulusan berkualitas, inovatif, dan berdaya saing global pada tahun 2030.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body p-4">
                        <h4 class="mb-3"><i class="fa fa-bullseye text-primary mr-2"></i> Misi</h4>
                        <ul style="font-size: 1rem; line-height: 1.8;">
                            <li>Menyelenggarakan pendidikan berkualitas tinggi</li>
                            <li>Melaksanakan penelitian yang inovatif</li>
                            <li>Mengabdi kepada masyarakat</li>
                            <li>Mengembangkan kerjasama dengan industri</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 tm-container-outer" style="background: white;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-uppercase mb-3">Pimpinan <strong>Fakultas</strong></h2>
            </div>
        </div>
        
        <!-- Dekan -->
        <div class="row mb-5">
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/tm-img-01.jpg') }}" alt="Dekan" class="img-fluid rounded-circle" style="width: 250px; height: 250px; object-fit: cover; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
            </div>
            <div class="col-md-8">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-5">
                        <h3 class="mb-2">Prof. Dr. Budi Santoso, S.T., M.T.</h3>
                        <p class="tm-text-highlight mb-3"><strong>Dekan Web Prodi</strong></p>
                        <p style="font-size: 1rem; line-height: 1.8; text-align: justify;">
                            Prof. Dr. Budi Santoso adalah seorang akademisi dan peneliti yang memiliki pengalaman lebih dari 25 tahun di bidang teknik komputer dan jaringan. Beliau meraih gelar Profesor pada tahun 2018 dan telah mempublikasikan lebih dari 50 jurnal internasional. 
                        </p>
                        <p style="font-size: 1rem; line-height: 1.8; text-align: justify;">
                            Sebagai Dekan, Prof. Budi berkomitmen untuk mengembangkan Web Prodi menjadi pusat keunggulan dalam pendidikan dan penelitian teknologi informasi. Beliau aktif menjalin kerjasama dengan industri dan universitas luar negeri untuk meningkatkan kualitas pendidikan.
                        </p>
                        <div class="mt-4">
                            <p class="mb-1"><i class="fa fa-envelope mr-2"></i> budi.santoso@universitasxyz.ac.id</p>
                            <p class="mb-1"><i class="fa fa-phone mr-2"></i> +62 21 1234 5678</p>
                            <p class="mb-1"><i class="fa fa-map-marker mr-2"></i> Gedung Fakultas Teknik Lt. 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wakil Dekan Bidang Akademik -->
        <div class="row mb-5">
            <div class="col-md-4 text-center mb-4 order-md-2">
                <img src="{{ asset('img/tm-img-02.jpg') }}" alt="Wadek 1" class="img-fluid rounded-circle" style="width: 250px; height: 250px; object-fit: cover; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
            </div>
            <div class="col-md-8 order-md-1">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-5">
                        <h3 class="mb-2">Dr. Siti Aisyah, S.Kom., M.Kom.</h3>
                        <p class="tm-text-highlight mb-3"><strong>Wakil Dekan Bidang Akademik</strong></p>
                        <p style="font-size: 1rem; line-height: 1.8; text-align: justify;">
                            Dr. Siti Aisyah adalah pakar di bidang Sistem Informasi dan Business Intelligence. Dengan pengalaman mengajar selama 15 tahun, beliau sangat peduli terhadap kualitas pembelajaran dan pengembangan kurikulum yang relevan dengan kebutuhan industri.
                        </p>
                        <p style="font-size: 1rem; line-height: 1.8; text-align: justify;">
                            Sebagai Wakil Dekan Bidang Akademik, Dr. Siti bertanggung jawab dalam pengembangan kurikulum, penjaminan mutu akademik, dan peningkatan metode pembelajaran yang inovatif. Beliau juga aktif dalam berbagai penelitian tentang transformasi digital dalam pendidikan.
                        </p>
                        <div class="mt-4">
                            <p class="mb-1"><i class="fa fa-envelope mr-2"></i> siti.aisyah@universitasxyz.ac.id</p>
                            <p class="mb-1"><i class="fa fa-phone mr-2"></i> +62 21 1234 5679</p>
                            <p class="mb-1"><i class="fa fa-map-marker mr-2"></i> Gedung Web Prodi Lt. 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wakil Dekan Bidang Kemahasiswaan -->
        <div class="row mb-5">
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/tm-img-03.jpg') }}" alt="Wadek 2" class="img-fluid rounded-circle" style="width: 250px; height: 250px; object-fit: cover; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
            </div>
            <div class="col-md-8">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-5">
                        <h3 class="mb-2">Dr. Ahmad Rizki, S.T., M.T.</h3>
                        <p class="tm-text-highlight mb-3"><strong>Wakil Dekan Bidang Kemahasiswaan</strong></p>
                        <p style="font-size: 1rem; line-height: 1.8; text-align: justify;">
                            Dr. Ahmad Rizki merupakan dosen di bidang Teknik Informatika dengan spesialisasi Artificial Intelligence dan Machine Learning. Beliau memiliki passion yang besar dalam pengembangan soft skills dan karakter mahasiswa.
                        </p>
                        <p style="font-size: 1rem; line-height: 1.8; text-align: justify;">
                            Sebagai Wakil Dekan Bidang Kemahasiswaan, Dr. Ahmad fokus pada pengembangan prestasi mahasiswa, pembinaan organisasi kemahasiswaan, dan program-program yang menunjang pengembangan karakter serta kewirausahaan mahasiswa.
                        </p>
                        <div class="mt-4">
                            <p class="mb-1"><i class="fa fa-envelope mr-2"></i> ahmad.rizki@universitasxyz.ac.id</p>
                            <p class="mb-1"><i class="fa fa-phone mr-2"></i> +62 21 1234 5680</p>
                            <p class="mb-1"><i class="fa fa-map-marker mr-2"></i> Gedung Web Prodi Lt. 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 tm-container-outer tm-bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-uppercase mb-3">Fasilitas <strong>Fakultas</strong></h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <i class="fa fa-flask fa-4x text-primary mb-3"></i>
                        <h5>10 Laboratorium</h5>
                        <p class="tm-text-gray">Laboratorium modern dan lengkap</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <i class="fa fa-book fa-4x text-primary mb-3"></i>
                        <h5>Perpustakaan</h5>
                        <p class="tm-text-gray">Koleksi buku dan jurnal lengkap</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <i class="fa fa-wifi fa-4x text-primary mb-3"></i>
                        <h5>WiFi</h5>
                        <p class="tm-text-gray">Akses internet cepat di seluruh area</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card text-center" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <i class="fa fa-users fa-4x text-primary mb-3"></i>
                        <h5>Co-working Space</h5>
                        <p class="tm-text-gray">Ruang kolaborasi untuk mahasiswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
