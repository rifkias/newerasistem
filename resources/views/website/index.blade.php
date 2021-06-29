@extends('layouts.main')

@section('main')
    		<!--************************************
				Home Slider Start
		*************************************-->
		<div class="at-homesliderarea">
			<div id="at-homeslidervone" class="at-haslayout at-homeslidervone at-homeslider">
                @foreach($banner as $item)
                <div class="pogoSlider-slide" data-transition="fade" data-duration="1500">
					<figure data-transition="fade" data-duration="1500" style="background:url({{asset('/img/banner/'.$item->banner_img)}}) no-repeat scroll 0 0;"></figure>
					<div class="at-pogolidercontent pogoSlider-slide-element" data-in="slideRight" data-out="slideLeft" data-duration="1800">
						<div class="at-slidercontent">
							<div class="at-titleborder"><h2>{{$item->banner_name}}</h2></div>
							<div class="at-description">
								{{-- <p>Kelebihan : <br>1.Proses lebih mudah dan aman <br>2.nilai bunga yang kompetitif dan stabil<br>3.Pajak bunga simpanan hanya 10%.</p> --}}
								<p>{{$item->banner_desc}}</p>
							</div>
							<div class="at-btns">
                                @if($item->read_more_link)
								<a class="at-btn at-btnactive" href="javascript:void(0);">Read More</a>
                                @endif
                                @if($item->contact_us)
								<a class="at-btn" href="javascript:void(0);">Contact Us</a>
                                @endif
							</div>
						</div>
					</div>
				</div>
                @endforeach
			</div>
			<div class="at-counter"></div>
			<a class="at-infoemail" href="mailto:info@consultory.com">info@sipbos.com</a>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="at-main" class="at-main at-haslayout">
			<!--************************************
					Features Start
			*************************************-->
			<section class="at-featuresarea">
				<div class="at-titleandbtn">
					{{-- <h2>Doing business in high <span>growth markets</span> can be rewarding.</h2> --}}
					<h2>Mengapa Memilih Koperasi <span>Berkat Artha Sentosa</span>.</h2>
					<a class="at-btn at-btnb" href="javascript:void(0);">contact us</a>
					<div class="at-counter"></div>
				</div>
				<div id="at-featuresslider" class="at-features at-featuresslider owl-carousel">
					<div class="item">
						<div class="at-feature">
							<span class="at-featureicon"><i class="fa fa-percent"></i></span>
							<div class="at-title">
								<h3>Suku Bunga</h3>
							</div>
							<div class="at-description">
								<p>Suku bunga kami terjangkau dan kompetitif.<br><br><br></p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="at-feature">
							<span class="at-featureicon"><i class="icon-safebox"></i></span>
							<div class="at-title">
								<h3>Aman & Terpercaya</h3>
							</div>
							<div class="at-description">
								<p>Karena dikelola oleh personal yang sudah berpengalaman dibidangnya.<br><br></p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="at-feature">
							<span class="at-featureicon"><i class="fa fa-bolt"></i></span>
							<div class="at-title">
								<h3>Pencairan Cepat</h3>
							</div>
							<div class="at-description">
								<p>Proses pencairan yang cepat sesuai dengan prosedur perusahaan.<br><br></p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="at-feature">
							<span class="at-featureicon"><i class="icon-money-bag"></i></span>
							<div class="at-title">
								<h3>Nilai Pinjaman Tinggi</h3>
							</div>
							<div class="at-description">
								<p>Kami memberikan Pinjaman Tinggi berdasarkan jenis jaminan yang diberikan oleh calon debitur.</p>
							</div>
						</div>
					</div>
					{{-- <div class="item">
						<div class="at-feature">
							<span class="at-featureicon"><i class="icon-safebox"></i></span>
							<div class="at-title">
								<h3>Secure Payment</h3>
							</div>
							<div class="at-description">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page looking at its layout.</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="at-feature">
							<span class="at-featureicon"><i class="icon-cart-12"></i></span>
							<div class="at-title">
								<h3>Consumer Consulting</h3>
							</div>
							<div class="at-description">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page looking at its layout.</p>
							</div>
						</div>
					</div> --}}
				</div>
			</section>
			<!--************************************
					Features End
			*************************************-->
			<div class="clearfix"></div>
			<!--************************************
					About Us Start
			*************************************-->
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<section class="at-aboutus">
							<figure class="at-sectionimg">
								<div class="at-imgholder">
									<img src="{{asset('/template/img/about.jpg')}}" alt="image description">
								</div>
							</figure>
							<div class="at-textcontent">
								<div class="at-sectiontitleborder"><h2>Tentang Kami</h2></div>
								<div class="at-description">
									{{-- <p>Koperasi Berkat Artha Sentosa didirikan berdasarkan Akta Pendirian No.2334 Tanggal 28 Desember 2020 yang dibuat oleh Notaris Eny Haryanti,SH dan telah mendapatkan pengesahan dari Menteri Hukum dan Hak Asasi Manusia Republik Indonesia Nomor AHU-0007557.AH.01.26.Tahun 2020 tanggal 28 Desember 2020.</p>  --}}
									<p>Koperasi Berkat Artha Sentosa dibangun untuk mengambil peran dalam meningkatkan kesejahteraan anggota melalui aktivitas Simpan Pinjam. Disamping menjadi pilihan untuk anggota dana, Koperasi ini juga menyalurkan pinjaman berupa Pinjaman Modal Kerja, Multiguna dan Pinjaman Mikro..</p>
								</div>
								<div class="at-btns">
									<a class="at-btn at-btnb" href="javascript:void(0);">Read More</a>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
			<!--************************************
					About Us End
			*************************************-->
			<!--************************************
					Special Services Start
			*************************************-->
			<section class="at-sectionspace at-overflowhidden at-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="at-services">
								<div class="at-sectiontitleborder">
									<h2>Produk - Produk Kami</h2>
								</div>
								<div class="at-servicesslidercounter"></div>
								<div id="at-servicesslider" class="at-servicesslider owl-carousel">
									<div class="item">
										<div class="at-service">
											<figure class="at-featureimg"><a href="javascript:void(0);"><img src="{{asset('/img/produk/simpanan-berjangka.jpg')}}" height="325" width="397" alt="image description"></a></figure>
											<div class="at-title">
												<h3><a href="javascript:void(0);">Simpanan SipBos</a></h3>
											</div>
											<div class="at-description">
												<p>Adalah simpanan anggota koperasi yang sifatnya fleksibel, setoran dan penarikannya dapat dilakukan setiap saat pada waktu jam operasional kantor.</p>
											</div>
											<a class="at-btnreadmore" href="javascript:void(0);">read more</a>
										</div>
									</div>
									<div class="item">
										<div class="at-service">
											<figure class="at-featureimg"><a href="javascript:void(0);"><img src="{{asset('/img/produk/simpanan-berjangka.jpg')}}" alt="image description"></a></figure>
											<div class="at-title">
												<h3><a href="javascript:void(0);">Simpanan Berjangka</a></h3>
											</div>
											<div class="at-description">
												<p>Produk simpanan berjanga dengan tingkat suku bunga yang kompetitif yang penarikannya dilakukan dalam waktu tertentu sesuai perjanjian.</p>
											</div>
											<a class="at-btnreadmore" href="javascript:void(0);">read more</a>
										</div>
									</div>
									<div class="item">
										<div class="at-service">
											<figure class="at-featureimg"><a href="javascript:void(0);"><img src="{{asset('/img/produk/simpanan-berjangka.jpg')}}" alt="image description"></a></figure>
											<div class="at-title">
												<h3><a href="javascript:void(0);">Pinjaman Modal Kerja</a></h3>
											</div>
											<div class="at-description">
												<p>adalah pinjaman dana yang diperuntukan ke-Anggota yang memiliki usaha, baik sebagai modal kerja usaha atau sebagai modal usaha awal.</p>
											</div>
											<a class="at-btnreadmore" href="javascript:void(0);">read more</a>
										</div>
									</div>
									<div class="item">
										<div class="at-service">
											<figure class="at-featureimg"><a href="javascript:void(0);"><img src="{{asset('/img/produk/simpanan-berjangka.jpg')}}" height="325" width="397" alt="image description"></a></figure>
											<div class="at-title">
												<h3><a href="javascript:void(0);">Pinjaman Multiguna</a></h3>
											</div>
											<div class="at-description">
												<p>Pinjaman yang diperuntukan bagi anggota dengan tujuan multiguna. besaran pinjaman ini disesuaikan dengan nilai agunannya</p>
											</div>
											<a class="at-btnreadmore" href="javascript:void(0);">read more</a>
										</div>
									</div>
									{{-- <div class="item">
										<div class="at-service">
											<figure class="at-featureimg"><a href="javascript:void(0);"><img src="{{asset('/template/images/img-03.jpg')}}" alt="image description"></a></figure>
											<div class="at-title">
												<h3><a href="javascript:void(0);">Investment Planning</a></h3>
											</div>
											<div class="at-description">
												<p>It is a long established fact that a reader will be by the readablze content layout.</p>
											</div>
											<a class="at-btnreadmore" href="javascript:void(0);">read more</a>
										</div>
									</div> --}}
								</div>
							</div>
							{{-- <div class="at-counterarea">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 pull-left">
										<div class="at-titleandbtn">
											<h2>Doing the <span>right thing,</span> at the right time.</h2>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 pull-left">
										<ul id="at-counters" class="at-counters">
											<li>
												<div class="at-scounter">
													<h3 data-from="0" data-to="516" data-speed="8000" data-refresh-interval="50">516</h3>
													<h4>Cases completed</h4>
												</div>
											</li>
											<li>
												<div class="at-scounter">
													<h3 data-from="0" data-to="42" data-speed="8000" data-refresh-interval="50">42</h3>
													<h4>Employees</h4>
												</div>
											</li>
											<li>
												<div class="at-scounter">
													<h3 data-from="0" data-to="3" data-speed="8000" data-refresh-interval="50">3</h3>
													<h4>Offices</h4>
												</div>
											</li>
											<li>
												<div class="at-scounter">
													<h3 data-from="0" data-to="100" data-speed="8000" data-refresh-interval="50">100</h3>
													<h4>% Satisfaction</h4>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div> --}}
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Special Services End
			*************************************-->
			<!--************************************
					Helping Start
			*************************************-->
			<section class="at-sectionspace at-parallex at-parallexhelping">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="at-helpingsmallbusinesses">
								<h2>Kami membantu bisnis kecil dan menengah</h2>
								<h3>Kami meminjamkan dana untuk tambahan modal kerja usaha atau sebagai modal usaha awal.</h3>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Helping End
			*************************************-->
			<!--************************************
					Request a Call Back Start
			*************************************-->
			<section class="at-haslayout">
				<div class="container">
					<div class="row">
						<div class="at-requestandcustomers">
							<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-left">
								<div class="at-requestacallback">
									<div class="at-textcontent">
										<div class="at-sectiontitleborder"><h2>Request a Call Back</h2></div>
										<div class="at-description">
											<p>Donec mollis lacus sit amet sem vehicula, et laoreet dolor fermentum. Integer ac auctor velit.</p>
											<p><strong>For Investment:</strong> Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem or phone <a href="javascript:void(0);">+1(123) 456 654 3210</a> ipsum quia dolor sit amet, consectetur.</p>
										</div>
									</div>
									<form class="at-formtheme at-formrequestcallback">
										<fieldset>
											<div class="form-group">
												<input type="text" name="yourname" class="form-control" placeholder="Your Name">
											</div>
											<div class="form-group">
												<input type="email" name="email" class="form-control" placeholder="Email Address">
											</div>
											<div class="form-group">
												<input type="text" name="contactus" class="form-control" placeholder="Contact Us">
											</div>
											<div class="form-group">
												<span class="at-select">
													<select>
														<option value="">How can we help?</option>
														<option value="">How can we help?</option>
														<option value="">How can we help?</option>
													</select>
												</span>
											</div>
											<div class="at-btns">
												<button class="at-btn at-btnb" type="submit">request callback</button>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pull-left">
								{{-- <div id="at-happycustomers" class="at-happycustomers at-counters">
									<div class="at-happycustomercounter">
										<h3 data-from="0" data-to="530" data-speed="8000" data-refresh-interval="50">530</h3>
										<h4>Happy Customers</h4>
									</div>
								</div> --}}
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Request a Call Back End
			*************************************-->
			<!--************************************
					Map And Address Start
			*************************************-->
			<section class="at-mapandaddress at-haslayout">
				<div id="at-locationmap" class="at-locationmap"></div>
				<div class="container">
					<div class="at-addressarea">
						<div id="at-addressslider" class="at-addressslider owl-carousel">
							<div class="item">
								<h2>Jakarta</h2>
								<ul class="at-contactinfo">
									<li>
										<i class="icon-icons202"></i>
										<span>021 2918 2901</span>
									</li>
									<li>
										<i class="icon-icons208"></i>
										<span><a href="mailto:sipbos2021@gmail.com">sipbos2021@gmail.com</a></span>
									</li>
									<li>
										<i class="icon-icons20"></i>
										<span>Mon to Fri - 08:00 to 17:00</span>
									</li>
									<li>
										<i class="icon-icons74"></i>
										<address>Hayam Wuruk Plaza Tower, Jl. Hayam Wuruk No.108, RT.4/RW.9, Maphar, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11160</address>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Map And Address End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
@endsection
