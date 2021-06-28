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
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
									<div class="at-service">
										<figure class="at-serviceimg">
											<figcaption>
												<h2><a href="/produk/tabungan">Simpanan SipBos</a></h2>
												<div class="at-description">
													<p>Simpanan yang sifatnya fleksibel yang bisa di setor dan ditarik dimana saja kapan saja selama jam operasional koperasi berlangsung, untuk nominal tertentu penarikan bisa dilakukan tanpa konfirmasi terlebih dahulu.</p>
												</div>
											</figcaption>
											<img src="{{asset('/img/produk/produk-simpanan.jpg')}}" alt="image description">
										</figure>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
									<div class="at-service">
										<figure class="at-serviceimg">
											<figcaption>
												<h2><a href="/produk/simpanan-berjangka">Simpanan Berjangka</a></h2>
												<div class="at-description">
													<p>Produk simpanan dengan suku bunga yang kompetitif yang penarikannya dilakukan dalam jangka waktu sesuai dengan perjanjian yang disetujui.</p>
												</div>
											</figcaption>
											<img src="{{asset('/img/produk/produk-simpanan-berjangka.jpg')}}" alt="image description">
										</figure>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
									<div class="at-service">
										<figure class="at-serviceimg">
											<figcaption>
												<h2><a href="/produk/pinjaman">Pinjaman</a></h2>
												<div class="at-description">
													<p>Kami menyediakan pinjaman untuk para anggota baik untuk penambahan modal usaha atau untuk modal usaha baru yang bertujuan untuk mensejahterakan anggota.</p>
												</div>
											</figcaption>
											<img src="{{asset('/img/produk/produk-pinjam.jpg')}}" alt="image description">
										</figure>
									</div>
								</div>
								{{-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
									<div class="at-service">
										<figure class="at-serviceimg">
											<figcaption>
												<h2><a href="servicedetail.html">Business Services</a></h2>
												<div class="at-description">
													<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
												</div>
											</figcaption>
											<img src="{{asset('/template/images/services/img-04.jpg')}}" alt="image description">
										</figure>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
									<div class="at-service">
										<figure class="at-serviceimg">
											<figcaption>
												<h2><a href="servicedetail.html">Investment Planning</a></h2>
												<div class="at-description">
													<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
												</div>
											</figcaption>
											<img src="{{asset('/template/images/services/img-05.jpg')}}" alt="image description">
										</figure>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
									<div class="at-service">
										<figure class="at-serviceimg">
											<figcaption>
												<h2><a href="servicedetail.html">Quality Resourcing</a></h2>
												<div class="at-description">
													<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
												</div>
											</figcaption>
											<img src="{{asset('/template/images/services/img-06.jpg')}}" alt="image description">
										</figure>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
									<div class="at-service">
										<figure class="at-serviceimg">
											<figcaption>
												<h2><a href="servicedetail.html">Travel and Aviation</a></h2>
												<div class="at-description">
													<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
												</div>
											</figcaption>
											<img src="{{asset('/template/images/services/img-07.jpg')}}" alt="image description">
										</figure>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
									<div class="at-service">
										<figure class="at-serviceimg">
											<figcaption>
												<h2><a href="servicedetail.html">Healthcare Services</a></h2>
												<div class="at-description">
													<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
												</div>
											</figcaption>
											<img src="{{asset('/template/images/services/img-08.jpg')}}" alt="image description">
										</figure>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 pull-left">
									<div class="at-service">
										<figure class="at-serviceimg">
											<figcaption>
												<h2><a href="servicedetail.html">Lawyers Consulting</a></h2>
												<div class="at-description">
													<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
												</div>
											</figcaption>
											<img src="{{asset('/template/images/services/img-09.jpg')}}" alt="image description">
										</figure>
									</div>
								</div> --}}
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
