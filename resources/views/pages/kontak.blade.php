@extends('layouts.main')

@section('title', 'Kontak Kami')

@section('content')
<section class="tm-banner">
    <div class="tm-container-outer tm-banner-bg">
        <div class="container">
            <div class="row tm-banner-row tm-banner-row-header">
                <div class="col-xs-12">
                    <div class="tm-banner-header">
                        <h1 class="text-uppercase tm-banner-title">Kontak Kami</h1>
                        <img src="{{ asset('img/dots-3.png') }}" alt="Dots">
                        <p class="tm-banner-subtitle">Hubungi Kami untuk Informasi Lebih Lanjut</p>
                    </div>    
                </div>
            </div>
        </div>
        <div class="tm-banner-overlay"></div>
    </div>
</section>

<section class="p-5 tm-container-outer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <h2 class="text-uppercase mb-4">Informasi <strong>Kontak</strong></h2>
                
                <div class="mb-4">
                    <h5><i class="fa fa-map-marker text-primary mr-2"></i> Alamat</h5>
                    <p class="ml-4">
                        Gedung Web Prodi<br>
                        Universitas XYZ<br>
                        Jl. Pendidikan No. 123<br>
                        Jakarta Selatan 12345<br>
                        Indonesia
                    </p>
                </div>
                
                <div class="mb-4">
                    <h5><i class="fa fa-phone text-primary mr-2"></i> Telepon</h5>
                    <p class="ml-4">
                        +62 21 1234 5678<br>
                        +62 21 1234 5679 (Fax)
                    </p>
                </div>
                
                <div class="mb-4">
                    <h5><i class="fa fa-envelope text-primary mr-2"></i> Email</h5>
                    <p class="ml-4">
                        info@ft.universitasxyz.ac.id<br>
                        dekan@ft.universitasxyz.ac.id
                    </p>
                </div>
                
                <div class="mb-4">
                    <h5><i class="fa fa-clock-o text-primary mr-2"></i> Jam Operasional</h5>
                    <p class="ml-4">
                        Senin - Jumat: 08:00 - 17:00 WIB<br>
                        Sabtu: 08:00 - 14:00 WIB<br>
                        Minggu & Libur: Tutup
                    </p>
                </div>
                
                <div class="mb-4">
                    <h5 class="mb-3">Media Sosial</h5>
                    <div class="ml-4">
                        <a href="#" class="mr-3" style="font-size: 1.5rem;"><i class="fa fa-facebook text-primary"></i></a>
                        <a href="#" class="mr-3" style="font-size: 1.5rem;"><i class="fa fa-twitter text-primary"></i></a>
                        <a href="#" class="mr-3" style="font-size: 1.5rem;"><i class="fa fa-instagram text-primary"></i></a>
                        <a href="#" class="mr-3" style="font-size: 1.5rem;"><i class="fa fa-youtube text-primary"></i></a>
                        <a href="#" style="font-size: 1.5rem;"><i class="fa fa-linkedin text-primary"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <h2 class="text-uppercase mb-4">Kirim <strong>Pesan</strong></h2>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                
                <form action="{{ url('/kontak/submit') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap *" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email *" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Nomor Telepon">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="subject" required>
                            <option value="">Pilih Keperluan *</option>
                            <option value="Informasi Pendaftaran">Informasi Pendaftaran</option>
                            <option value="Informasi Program Studi">Informasi Program Studi</option>
                            <option value="Kerjasama">Kerjasama</option>
                            <option value="Pengaduan">Pengaduan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="6" placeholder="Pesan Anda *" required></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary tm-btn text-uppercase">
                            <i class="fa fa-paper-plane mr-2"></i>Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div id="google-map" style="height: 400px; width: 100%;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.1944491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sMonas!5e0!3m2!1sen!2sid!4v1234567890"
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 tm-container-outer tm-bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-uppercase mb-4">Kontak <strong>Program Studi</strong></h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-primary">Teknik Informatika</h4>
                        <hr>
                        <p class="mb-2"><strong>Ketua Prodi:</strong></p>
                        <p class="mb-3">Dr. Ahmad Fauzi, S.Kom., M.Kom.</p>
                        <p class="mb-1"><i class="fa fa-envelope mr-2"></i> ti@ft.universitasxyz.ac.id</p>
                        <p class="mb-1"><i class="fa fa-phone mr-2"></i> +62 21 1234 5680</p>
                        <p class="mb-0"><i class="fa fa-map-marker mr-2"></i> Gedung Teknik Lt. 2</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-primary">Sistem Informasi</h4>
                        <hr>
                        <p class="mb-2"><strong>Ketua Prodi:</strong></p>
                        <p class="mb-3">Dr. Dedi Kurniawan, S.Kom., M.M.</p>
                        <p class="mb-1"><i class="fa fa-envelope mr-2"></i> si@ft.universitasxyz.ac.id</p>
                        <p class="mb-1"><i class="fa fa-phone mr-2"></i> +62 21 1234 5681</p>
                        <p class="mb-0"><i class="fa fa-map-marker mr-2"></i> Gedung Teknik Lt. 3</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: 100%;">
                    <div class="card-body p-4">
                        <h4 class="mb-3 text-primary">Teknik Komputer</h4>
                        <hr>
                        <p class="mb-2"><strong>Ketua Prodi:</strong></p>
                        <p class="mb-3">Dr. Bambang Hartono, S.T., M.Eng.</p>
                        <p class="mb-1"><i class="fa fa-envelope mr-2"></i> tk@ft.universitasxyz.ac.id</p>
                        <p class="mb-1"><i class="fa fa-phone mr-2"></i> +62 21 1234 5682</p>
                        <p class="mb-0"><i class="fa fa-map-marker mr-2"></i> Gedung Teknik Lt. 4</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<style>
.contact-form .form-control {
    border: 1px solid #ddd;
    padding: 15px;
    font-size: 1rem;
}

.contact-form .form-control:focus {
    border-color: #69c6ba;
    box-shadow: 0 0 0 0.2rem rgba(105, 198, 186, 0.25);
}

.contact-form textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

.contact-form .btn-primary {
    background-color: #69c6ba;
    border-color: #69c6ba;
    padding: 12px 30px;
    font-size: 1rem;
}

.contact-form .btn-primary:hover {
    background-color: #58b5a9;
    border-color: #58b5a9;
}
</style>
@endpush
