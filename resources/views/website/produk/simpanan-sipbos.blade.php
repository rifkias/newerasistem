@extends('layouts.main')
@section('main')
		<!--************************************
				Home Slider Start
		*************************************-->
		<div class="at-innerbanner at-innerbannervtwo">
			<div class="at-innerbannerbox">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="at-innerbannercontent">
								<ol class="at-breadcrumb">
									<li><a href="/">Home</a></li>
									<li><a href="/produk">Produk</a></li>
									<li class="at-active">Simpanan SipBos</li>
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
						<div class="at-services at-servicedetail">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								{{-- <figure class="at-sectionimg"><div class="at-imgholder"><img src="{{asset('/template/images/services/img-11.jpg')}}" alt="image description"></div></figure> --}}
								<figure class="at-sectionimg"><div class="at-imgholder"><img style="width:839px; height:auto;" src="{{asset('/img/produk/produk-simpanan.jpg')}}" alt="image description"></div></figure>

								<section class="at-servicedetailsection">
									<div class="at-sectiontitleborder">
										<h2>Simpanan SipBos</h2>
									</div>
									<div class="at-description">
										<p>Simpanan Anggota Koperasi dalam mata uang rupiah yang dikelola dengan prinsip simpanan yang penarikannya dapat dilakukan setiap saat berdasarkan syarat-syarat yang disepakati.</p>
										{{-- <ul class="at-liststyle at-liststylearrowright">
											<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
											<li>Phasellus non felis malesuada, faucibus dui eget, sodales nibh.</li>
											<li>Duis non ipsum id mauris tristique sagittis.</li>
											<li>Duis malesuada ante eget blandit laoreet.</li>
											<li>Nulla quis nibh a diam pretium pretium.</li>
										</ul> --}}
									</div>
								</section>
								<section class="at-servicedetailsection">
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">
                                            <h3>Kelebihan Kami</h3>
                                            <ul class="at-liststyle at-liststylearrowright">
                                                <li>Bisa Setor dan tarik Kapan saja .</li>
                                                <li>Pendaftaran cepat & mudah.</li>
                                            </ul>
										</div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">
                                            <h3>Syarat & Ketentuan</h3>
                                            <ul class="at-liststyle at-liststylearrowright">
                                                <li>Setoran awal minimum Rp.25.000,-</li>
                                                <li>Saldo minimum Rp. 25.000,-</li>
                                                <li>Mengisi formulir aplikasi pembukaan Rekening.</li>
                                                <li>Menunjukan kartu Identitas asli (KTP/SIM/Paspor) dan menyerahkan fotocopy bukti identitas yang dimaksud.</li>
                                                <li>Penarikan tunai di teller dengan penarikan diatas Rp. 1.000.000,- wajib konfirmasi satu hari sebelumnya (H-1).</li>
                                            </ul>
										</div>
									</div>
								</section>
								{{-- <section class="at-servicedetailsection">
									<h3>Kategori</h3>
									<div class="at-description">
										<p>Kami memiliki beberapa kategori untuk produk ini.</p>
									</div>
									<div class="at-servicetabs">
										<ul class="at-servicetabsnav" role="tablist">
											<li role="presentation"><a href="#one" aria-controls="one" role="tab" data-toggle="tab">Client Prospecting</a></li>
											<li role="presentation" class="active"><a href="#two" aria-controls="two" role="tab" data-toggle="tab">Growth</a></li>
											<li role="presentation"><a href="#three" aria-controls="three" role="tab" data-toggle="tab">Risks of Investment</a></li>
										</ul>
										<div class="tab-content at-servicetabcontent">
											<div role="tabpanel" class="tab-pane" id="one">
												<div class="at-textcontent">
													<h3>Bronze</h3>
													<div class="at-description">
														<p>We have over 15 years of experience Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean Lorem ipsm dolor sit the power of consectetur adi pisi cing elit, sed do eiusmod tempor xercitationemut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
													</div>
													<ul class="at-liststyle at-liststylearrowright">
														<li>There are many variations of passages</li>
														<li>handful of model sentence structures</li>
														<li>Company and Industry Research</li>
														<li>Plombett – Industry Research</li>
														<li>Plombett – Industry Research</li>
														<li>market analysis report “slices”</li>
													</ul>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane active" id="two">
												<div class="at-textcontent">
													<h3>Growth</h3>
													<div class="at-description">
														<p>We have over 15 years of experience Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean Lorem ipsm dolor sit the power of consectetur adi pisi cing elit, sed do eiusmod tempor xercitationemut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
													</div>
													<ul class="at-liststyle at-liststylearrowright">
														<li>There are many variations of passages</li>
														<li>handful of model sentence structures</li>
														<li>Company and Industry Research</li>
														<li>Plombett – Industry Research</li>
														<li>Plombett – Industry Research</li>
														<li>market analysis report “slices”</li>
													</ul>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane" id="three">
												<div class="at-textcontent">
													<h3>Risks of Investment</h3>
													<div class="at-description">
														<p>We have over 15 years of experience Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean Lorem ipsm dolor sit the power of consectetur adi pisi cing elit, sed do eiusmod tempor xercitationemut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
													</div>
													<ul class="at-liststyle at-liststylearrowright">
														<li>There are many variations of passages</li>
														<li>handful of model sentence structures</li>
														<li>Company and Industry Research</li>
														<li>Plombett – Industry Research</li>
														<li>Plombett – Industry Research</li>
														<li>market analysis report “slices”</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</section> --}}
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:20px;text-align:center">
                                <button class="btn btn-lg btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Unduh Brosur</button>
                                <button class="btn btn-lg btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i> Kontak Kami Sekarang</button>
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
