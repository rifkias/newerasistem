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
										<h2>Simpanan Berjangka</h2>
									</div>
									<div class="at-description">
										<p>Simpanan koperasi dalam mata uang rupiah yang dikelola dengan prinsip simpanan pada umumnya,  bisa dilakukan penarikan setiap saat berdasarkan syarat dan ketentuan berlaku yang telah disepakati bersama. Dengan kemudahan saat pembukaan rekening simpanan, proses yang cepat serta bunga yang diperoleh juga menguntungkan.</p>
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
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-left">
                                            <h3>Kelebihan Kami</h3>
                                            <ul class="at-liststyle at-liststylearrowright">
                                                <li>Proses Mudah & Cepat.</li>
                                                <li>Bersifat Fleksible.</li>
                                                <li>Bunga Bersaing.</li>
                                                <li>Dapat diperpanjang otomatis ( Automatic Roll over ).</li>
                                            </ul>
										</div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-left">
                                            <h3>Syarat & Ketentuan</h3>
                                            <ul class="at-liststyle at-liststylearrowright">
                                                <li>FotoCopy KTP.</li>
                                                <li>FotoCopy NPWP.</li>
                                                <li>FotoCopy Lembar depan buku tabungan.</li>
                                                <li>Pilihan Jangka Waktu 1,3,6 dan 12 Bulan.</li>
                                            </ul>
										</div>
									</div>
								</section>
								<section class="at-servicedetailsection">
									<h3>Kategori</h3>
									<div class="at-description">
										<p>Kami memiliki beberapa kategori untuk produk ini.</p>
									</div>
									<div class="at-servicetabs">
										<ul class="at-servicetabsnav" role="tablist">
											<li role="presentation" class="active"><a href="#one" aria-controls="one" role="tab" data-toggle="tab">OKBOS</a></li>
											<li role="presentation"><a href="#two" aria-controls="two" role="tab" data-toggle="tab">SIPBOS</a></li>
											<li role="presentation"><a href="#three" aria-controls="three" role="tab" data-toggle="tab">HOKIBOS</a></li>
											<li role="presentation"><a href="#four" aria-controls="four" role="tab" data-toggle="tab">MANTAPBOS</a></li>
										</ul>
										<div class="tab-content at-servicetabcontent">
											<div role="tabpanel" class="tab-pane active" id="one">
												<div class="at-textcontent">
													<h3>Simpanan Berjangka OKBOS</h3>
													<ul class="at-liststyle at-liststylearrowright">
														<li>Jangka Waktu 1 Bulan</li>
														<li>Bunga 8%</li>
														<li>Setoran Minimal Rp. 5.000.000</li>
														<li>Khusus Untuk Anggota</li>
													</ul>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane" id="two">
												<div class="at-textcontent">
													<h3>Simpanan Berjangka SIPBOS</h3>
													<ul class="at-liststyle at-liststylearrowright">
														<li>Jangka Waktu 3 Bulan</li>
														<li>Bunga 9%</li>
														<li>Setoran Minimal Rp. 5.000.000</li>
														<li>Khusus Untuk Anggota</li>
													</ul>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane" id="three">
												<div class="at-textcontent">
													<h3>Simpanan Berjangka HOKIBOS</h3>
													<ul class="at-liststyle at-liststylearrowright">
														<li>Jangka Waktu 6 Bulan</li>
														<li>Bunga 9.5%</li>
														<li>Setoran Minimal Rp. 5.000.000</li>
														<li>Khusus Untuk Anggota</li>
													</ul>
												</div>
											</div>
                                            <div role="tabpanel" class="tab-pane" id="four">
												<div class="at-textcontent">
													<h3>Simpanan Berjangka MANTAPBOS</h3>
													<ul class="at-liststyle at-liststylearrowright">
														<li>Jangka Waktu 12 Bulan</li>
														<li>Bunga 10%</li>
														<li>Setoran Minimal Rp. 5.000.000</li>
														<li>Khusus Untuk Anggota</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:20px;text-align:center">
                                <button class="btn btn-lg btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Unduh Brosur</button>
                                <button class="btn btn-lg btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i> Kontak Kami Sekarang</button>
                                <button class="btn btn-lg btn-primary" onclick="showModal()"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Daftar Sekarang</button>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!--************************************
				Main End
		*************************************-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form Registrasi Simpanan Berjangka</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="/registrasi/simpanan-berjangka" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" required id="nama" name="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" required id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor Telpon</label>
                                <input type="text" class="form-control" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required id="phone" name="phone" placeholder="Nomor Telpon">
                            </div>
                    </div>
                    <p>Silakan Isi form di atas dengan benar dan kami akan langsung menghubungi anda</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim <i class="fa fa-paper-plane"></i></button>
                </div>
            </form>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
@endsection
@push('script')
    <script>
        function showModal() {
            $('#myModal').modal('show');
        }
    </script>
@endpush
