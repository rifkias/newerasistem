@extends('layouts.main')
@section('main')
		<!--************************************
				Home Slider Start
		*************************************-->
		<div class="at-innerbanner1">
			<div class="at-innerbannerbox">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="at-innerbannercontent">
								<div class="at-pagetitle">
									<h1>Produk</h1>
								</div>
								<ol class="at-breadcrumb">
									<li><a href="javascript:void(0);">Home</a></li>
									<li class="at-active"><span>Produk</span></li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="at-main" class="at-main at-haslayout at-pagespace">
			<div class="container">
				<div class="row">
					<div class="at-content">
						<div class="at-services at-servicesvone">
							<div class="row">
								{{-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
                                    <a href="/produk/simpanan-sipbos">
                                        <div class="at-service">
                                            <figure class="at-serviceimg">
                                                <figcaption>
                                                    <h2 style="color:white">Simpanan SipBos</h2>
                                                    <div class="at-description">
                                                        <p>Simpanan yang sifatnya fleksibel yang bisa di setor dan ditarik dimana saja kapan saja selama jam operasional koperasi berlangsung, untuk nominal tertentu penarikan bisa dilakukan tanpa konfirmasi terlebih dahulu.</p>
                                                    </div>
                                                </figcaption>
                                                <img src="{{asset('/img/produk/produk-simpanan.jpg')}}" alt="image description">
                                            </figure>
                                        </div>
                                    </a>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
                                    <a href="/produk/simpanan-berjangka">
                                        <div class="at-service">
                                            <figure class="at-serviceimg">
                                                <figcaption>
                                                    <h2 style="color:white">Simpanan Berjangka</h2>
                                                    <div class="at-description">
                                                        <p>Produk simpanan dengan suku bunga yang kompetitif yang penarikannya dilakukan dalam jangka waktu sesuai dengan perjanjian yang disetujui.</p>
                                                    </div>
                                                </figcaption>
                                                <img src="{{asset('/img/produk/produk-simpanan-berjangka.jpg')}}" alt="image description">
                                            </figure>
                                        </div>
                                    </a>
								</div> --}}
                                @foreach ($produk as $item)
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
                                    <a href="/produk/{{$item->slug}}">
                                        <div class="at-service">
                                            <figure class="at-serviceimg">
                                                <figcaption>
                                                    <h2 style="color:white">{{$item->nama_produk}}</h2>
                                                    <div class="at-description">
                                                        <p>{{$item->deskripsi_singkat	}}</p>
                                                    </div>
                                                </figcaption>
                                                <img src="{{asset('/img/produk/'.$item->foto_home)}}" alt="image description">
                                            </figure>
                                        </div>
                                    </a>
								</div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!--************************************
				Main End
		*************************************-->
@endsection
