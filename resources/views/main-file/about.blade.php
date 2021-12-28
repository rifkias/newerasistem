@extends('layouts.new')

@section('content')

<!-- BANNER -->
<div class="section banner-page-2">
    <div class="content-wrap pos-relative">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <div class="mb-3">
                        <div class="title-page">Tentang Kami</div>
                    </div>
                    <div class="mb-3">
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                          </ol>
                        </nav>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- WHO WE ARE -->
<div class="section">
    <div class="content-wrap">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h2 class="section-heading text-left">
                        Selamat Datang Di New Era Sistem
                    </h2>

                    <p>Kami adalah perusahaan yang berdiri di tahun 2021 yang bertujuan untuk membantu para pemilik usaha baik UMKM maupun Perusahaan besar untuk maju.</p>
                    <p>Kami juga mempunyai Misi untuk membangun generasi muda yang potensial agar mandiri dengan cara memberikan pelatihan dan support penuh untuk membuka usaha dengan program Mitra UMKM.</p>
                    <div class="spacer-30"></div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">

                    <img src="{{asset('template2/images/etc/img5.jpg')}}" alt="" class="img-fluid shadow-lg mb-3">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- VISION MISSION -->
<div class="section bg-secondary">
    <div class="content-wrap">
        <div class="container">

            <div class="row">

                <!-- Item 1 -->
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="text-center">
                        <img src="{{asset('/template2/images/etc/img6.jpg')}}" alt="" class="img-fluid shadow-lg mb-3">
                        <h4 class="text-primary">Misi Kami</h4>
                        <ol>
                            <li>Mampu memenuhi kebutuhan yang diperlukan klien</li>
                            <li>Mampu menciptakan pelayanan yang lebih cepat, handal dan terpercaya</li>
                            <li>Membangun Mitra Usaha Mikro, Kecil dan Menengah (UMKM) di Indonesia</li>
                            <li>Mengembangkan strategi pemasaran berbasis aplikasi dan digital</li>
                            <li>Menciptakan produk dan aplikasi Inovatif</li>
                        </ol>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="text-center">
                        <img src="{{asset('/template2/images/etc/img7.jpg')}}" alt="" class="img-fluid shadow-lg mb-3">
                        <h4 class="text-primary">Visi Kami</h4>
                        <p>Memberikan solusi terbaik dalam pemilihan pelayanan jasa  konsultasi dan mitra bisnis dengan mengedepankan kualitas  serta produk yang terpercaya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MEET THE TEAM -->
<div class="section">
    <div class="content-wrap">
        <div class="container">

            <div class="row mb-5">
                <div class="col-sm-12 col-md-12">
                    <h2 class="section-heading text-center no-after mb-3">
                        Susunan Pengurus
                    </h2>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-2"></div>
                <!-- Item 1 -->
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="rs-team-1">

                        <div class="media shadow"><img src="{{asset('img/pengurus/irfan.png')}}" alt="" class="img-fluid"></div>
                        <div class="body">
                            <div class="title">Muhammad Ifran</div>
                            <div class="position">Direktur Utama</div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="rs-team-1">

                        <div class="media shadow"><img src="{{asset('img/pengurus/wahyu.png')}}" alt="" class="img-fluid"></div>
                        <div class="body">
                            <div class="title">Wahyu Subianto</div>
                            <div class="position">Direktur Perseroan</div>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="rs-team-1">

                        <div class="media shadow"><img src="{{asset('img/pengurus/hamzah.png')}}" alt="" class="img-fluid"></div>
                        <div class="body">
                            <div class="title">HAMZAH ZEFIAR</div>
                            <div class="position">Komisaris Perseroan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ABOUT -->
<div class="section bg-secondary">
    <div class="content-wrap">
        <div class="container">

            <div class="row mb-5">
                <div class="col-sm-12 col-md-12">
                    <h2 class="section-heading text-center text-white mb-3">
                        Produk Kami
                    </h2>
                </div>
            </div>

            <div class="row">

                <!-- Item 1 -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="rs-icon-funfact-2">
                        <div class="icon bg">
                            <i class="printify-icon-printer-without-paper"></i>
                        </div>
                        <div class="body-content">
                            <h3> Percetakan</h3>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="rs-icon-funfact-2">
                        <div class="icon bg">
                            <i class="printify-icon-closed-book"></i>
                        </div>
                        <div class="body-content">
                            <h3>Perizinan Perusahaan</h3>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="rs-icon-funfact-2">
                        <div class="icon bg">
                            <i class="fa fa-building"></i>
                        </div>
                        <div class="body-content">
                            <h3>Perizinan Sektor Konstruksi</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
