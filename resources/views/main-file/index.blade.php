@extends('layouts.new')
@section('content')
	<!-- BANNER -->
    <?php //var_dump($banner);?>
    <div class="banner">
    	<div class="owl-carousel owl-theme full-screen">
            @foreach ($banner as $item)
            <div class="item">
	        	<img src="{{asset('img/banner/'.@$item['banner_img'])}}" style="max-height:900px;width:auto;" alt="Slider">
	        	<div class="container d-flex align-items-center h-center">
	            	<div class="wrap-caption">
		                <h1 class="caption-heading">{{@$item['banner_name']}}</h1>
		                <p class="uk24">{{@$item['banner_desc']}}</p>
                        @if(@$item['read_more_link'])
                            <a href="{!!@$item['read_more_link']!!}" class="btn btn-primary">Kunjungi Kami</a> &nbsp;
                        @endif
                        @if(@$item['contact_us'])
                            <a href="#" class="btn btn-primary">Hubungi Kami</a>
                        @endif
		            </div>
	            </div>
	    	</div>
            @endforeach
    	</div>
	    <div class="custom-nav owl-nav"></div>
    </div>

	<!-- CTA -->
	<div class="section bg-primary">
		<div class="content-wrap py-5">
			<div class="container">

				<div class="row align-items-center">
					<div class="col-sm-12 col-md-12">
						<div class="cta-1">
			              	<div class="body-text text-white mb-3">
			                	<h3 class="my-1">Kepuasan anda menjadi prioritas utama kami</h3>
			                	<p class="uk18 mb-0">Kembangkan Bisnis Anda bersama New Era Sistem</p>
			              	</div>
			              	<div class="body-action mt-3">
			                	<a href="#" class="btn btn-secondary">Hubungi Kami</a>
			              	</div>
			            </div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- ABOUT -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">

					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading text-center">
							Selamat Datang Di New Era Sistem
						</h2>
						<p class="subheading text-center mb-5">Kami bergerak dibeberapa bidang untuk menunjang bisnis anda</p>
					</div>

				</div>

				<div class="row">
					<!-- Item 1 -->
					<div class="col-sm-12 col-md-12 col-lg-4 mb-2">
						<div class="box-icon-1 text-center">
							<div class="icon">
								<i class="printify-icon-printing-document"></i>
							</div>
							<div class="body-content">
								<h4>Percetakan</h4>
								<p>Cetak Semua kebutuhan bisnis anda baik untuk internal maupun pemasaran kami akan memberikan harga spesial khusus untuk anda.</p>
							</div>
						</div>
					</div>
					<!-- Item 2 -->
					<div class="col-sm-12 col-md-12 col-lg-4 mb-2">
						<div class="box-icon-1 text-center">
							<div class="icon">
								<i class="fa fa-building"></i>
							</div>
							<div class="body-content">
								<h4>Konsultan</h4>
								<p>Wujudkan mimpi anda mempunyai perusahaan sendiri bersama kami, kami menyediakan jasa pembuatan perusahaan beserta dengan legalitasnya.</p>
							</div>
						</div>
					</div>
					<!-- Item 3 -->
					<div class="col-sm-12 col-md-12 col-lg-4 mb-2">
						<div class="box-icon-1 text-center">
							<div class="icon">
								<i class="fa fa-store"></i>
							</div>
							<div class="body-content">
								<h4>Mitra UMKM</h4>
								<p>Kembangkan bisnis yang anda punya dengan kami, kami siap membantu anda dengan syarat pendaftaran yang mudah dan cepat.</p>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<!-- CTA -->
	{{-- <div class="section bgi-cover-center cta" data-background="{{asset('/template2/images/dummy-img-1920x900.jpg')}}">
		<div class="content-wrap">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
						<div class="text-center">
							<h2 class="text-white">COXE PRESENTATION</h2>
							<p class="uk18 text-white">Click this video to explore more</p>
							<a href="https://www.youtube.com/watch?v=vNDrLjOmUY4" class="popup-youtube btn-video"><i class="fa fa-play fa-2x"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

	<!-- WHO WE ARE -->
	<div class="section bg-gray-light">
		<div class="content-wrap">
			<div class="container">


				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-6">
						<h2 class="section-heading text-left">
							Siapa Kami ?
						</h2>

						<p><b>PT New Era Sistem</b> adalah perusahaan yang dibangun pada tahun 2021 dengan tujuan mengembangkan bisnis masyarakat indonesia baik UMKM maupun perusahaan Besar.</p>
						<p>Kami bertujuan menciptakan relasi jangka panjang agar bisa berkembang bersama anda dengan mengedepankan kualitas yang kami berikan dan kepuasan yang anda dapat.</p>
						<a href="#" class="btn btn-primary">READ MORE</a>
						<div class="spacer-30"></div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6">

							<div id="whoweare" class="whoweare owl-carousel owl-theme" data-background="{{asset('/template2/images/laptop.png')}}">
					    		<!-- Item 1 -->
						    	<div class="item">
									<img src="{{asset('/template2/images/etc/img1.jpg')}}" alt="">
						    	</div>
						    	<!-- Item 2 -->
						    	<div class="item">
									<img src="{{asset('/template2/images/etc/img4.jpg')}}" alt="">
						    	</div>
						    	<!-- Item 3 -->
						    	<div class="item">
									<img src="{{asset('/template2/images/etc/img3.jpg')}}" alt="">
						    	</div>
						    </div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PORTFOLIO -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row mb-5">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading text-center no-after mb-3">
							Project Terakhir Kami
						</h2>
					</div>
				</div>

				<div class="row popup-gallery">
					<!-- Item 1 -->
					<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
						<div class="rs-box-project">
							<div class="media-box">
								<a href="{{asset('/img/portofolio/1.jpeg')}}" title="Gallery #1">
									<img src="{{asset('/img/portofolio/1.jpeg')}}" style="height: 290px;width:600px;object-fit:cover;" alt="" class="img-fluid">
									<div class="project-info">
										<div class="project-icon">
											<span class="fa fa-search"></span>
										</div>
									</div>
								</a>
							</div>
							<div class="body">
								<div class="title">Amplop</div>
								<div class="category">New Era Printing</div>

							</div>
						</div>
					</div>
					<!-- Item 2 -->
					<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
						<div class="rs-box-project">
							<div class="media-box">
								<a href="{{asset('/template2/images/dummy-img-600x500.jpg')}}" title="Gallery #2">
									<img src="{{asset('/template2/images/dummy-img-600x500.jpg')}}" alt="" class="img-fluid">
									<div class="project-info">
										<div class="project-icon">
											<span class="fa fa-search"></span>
										</div>
									</div>
								</a>
							</div>
							<div class="body">
								<div class="title">PT  xxxx xxxx</div>
								<div class="category">New Era Konsultant</div>

							</div>
						</div>
					</div>
					{{-- <!-- Item 3 -->
					<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
						<div class="rs-box-project">
							<div class="media-box">
								<a href="{{asset('/template2/images/dummy-img-600x500.jpg')}}" title="Gallery #3">
									<img src="{{asset('/template2/images/dummy-img-600x500.jpg')}}" alt="" class="img-fluid">
									<div class="project-info">
										<div class="project-icon">
											<span class="fa fa-search"></span>
										</div>
									</div>
								</a>
							</div>
							<div class="body">
								<div class="title">Jamu Bottle</div>
								<div class="category">Design</div>

							</div>
						</div>
					</div>
					<!-- Item 4 -->
					<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
						<div class="rs-box-project">
							<div class="media-box">
								<a href="{{asset('/template2/images/dummy-img-600x500.jpg')}}" title="Gallery #4">
									<img src="{{asset('/template2/images/dummy-img-600x500.jpg')}}" alt="" class="img-fluid">
									<div class="project-info">
										<div class="project-icon">
											<span class="fa fa-search"></span>
										</div>
									</div>
								</a>
							</div>
							<div class="body">
								<div class="title">Papper Bag</div>
								<div class="category">Design</div>

							</div>
						</div>
					</div>
					<!-- Item 5 -->
					<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
						<div class="rs-box-project">
							<div class="media-box">
								<a href="{{asset('/template2/images/dummy-img-600x500.jpg')}}" title="Gallery #5">
									<img src="{{asset('/template2/images/dummy-img-600x500.jpg')}}" alt="" class="img-fluid">
									<div class="project-info">
										<div class="project-icon">
											<span class="fa fa-search"></span>
										</div>
									</div>
								</a>
							</div>
							<div class="body">
								<div class="title">Hanging T-Shirt</div>
								<div class="category">Design</div>

							</div>
						</div>
					</div>
					<!-- Item 6 -->
					<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
						<div class="rs-box-project">
							<div class="media-box">
								<a href="{{asset('/template2/images/dummy-img-600x500.jpg')}}" title="Gallery #6">
									<img src="{{asset('/template2/images/dummy-img-600x500.jpg')}}" alt="" class="img-fluid">
									<div class="project-info">
										<div class="project-icon">
											<span class="fa fa-search"></span>
										</div>
									</div>
								</a>
							</div>
							<div class="body">
								<div class="title">Notebook Mockup Resource</div>
								<div class="category">Design</div>

							</div>
						</div>
					</div> --}}
				</div>

				<div class="text-center mt-5">
					<a href="#" class="btn btn-primary">SEE MORE</a>
				</div>

			</div>
		</div>
	</div>

	<!-- FUN FACT -->
	<div class="section bg-secondary">
		<div class="content-wrap">
			<div class="container">

				<div class="row">

					<!-- Item 1 -->
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="rs-icon-funfact-2">
							<div class="icon">
								<i class="fa fa-briefcase"></i>
							</div>
							<div class="body-content">
								<h2>1200</h2>
								<p>PROJECTS</p>
							</div>
						</div>
					</div>

					<!-- Item 2 -->
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="rs-icon-funfact-2">
							<div class="icon">
								<i class="fa fa-thumbs-up"></i>
							</div>
							<div class="body-content">
								<h2>25000</h2>
								<p>FOLLOW & LIKE</p>
							</div>
						</div>
					</div>

					<!-- Item 3 -->
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="rs-icon-funfact-2">
							<div class="icon">
								<i class="fa fa-coffee"></i>
							</div>
							<div class="body-content">
								<h2>6000</h2>
								<p>CUP OF COFFEE</p>
							</div>
						</div>
					</div>

					<!-- Item 4 -->
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="rs-icon-funfact-2">
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
							<div class="body-content">
								<h2>800</h2>
								<p>CLIENTS</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- AWESOME SKILLS -->
	{{-- <div class="section section-border">
		<div class="content-wrap">
			<div class="container">

				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-4">
						<h2 class="section-heading text-left">
							AWESOME SKILLS
						</h2>

						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo invent.</p>
						<div class="rs-progress mb-3">
	              			<div class="name">Development</div>
	          			  	<div class="persen">80%</div>
	              			<div class="progress">
							  <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="rs-progress mb-3">
	              			<div class="name">HTML</div>
	          			  	<div class="persen">90%</div>
	              			<div class="progress">
							  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="rs-progress mb-3">
	              			<div class="name">Marketing</div>
	          			  	<div class="persen">70%</div>
	              			<div class="progress">
							  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="rs-progress mb-3">
	              			<div class="name">Adobe Apps</div>
	          			  	<div class="persen">80%</div>
	              			<div class="progress">
							  <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>


					</div>

					<div class="col-sm-12 col-md-12 col-lg-8">

						<img src="images/dummy-img-900x600.jpg" alt="" class="img-fluid shadow-lg mb-3">

					</div>

				</div>

			</div>
		</div>
	</div> --}}

	<!-- OUR TESTIMONIALS -->
	<div class="section bgi-cover-center" data-background="{{asset('/template2/images/dummy-img-1920x900-3.jpg')}}">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading text-center text-white mb-5">
							CLIENTS SAY
						</h2>
					</div>
				</div>
				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
						<div id="testimonial" class="owl-carousel owl-theme owl-light">
							<!-- Item 1 -->
							<div class="item">
								<div class="rs-testimonial-3">
									<div class="quote-box">
										<blockquote>
										 Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam
										</blockquote>
										<div class="media">
											<img src="{{asset('/template2/images/dummy-img-400x400.jpg')}}" alt="" class="rounded-circle">
										</div>
										<p class="quote-name">
											Johnathan Doel <span>CEO Rometheme</span>
										</p>
									</div>
								</div>
							</div>
							<!-- Item 2 -->
							<div class="item">
								<div class="rs-testimonial-3">
									<div class="quote-box">
										<blockquote>
										 Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam
										</blockquote>
										<div class="media">
											<img src="{{asset('/template2/images/dummy-img-400x400.jpg')}}" alt="" class="rounded-circle">
										</div>
										<p class="quote-name">
											Linda Doel <span>CEO Bukakreasi</span>
										</p>
									</div>
								</div>
							</div>
							<!-- Item 3 -->
							<div class="item">
								<div class="rs-testimonial-3">
									<div class="quote-box">
										<blockquote>
										 Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam
										</blockquote>
										<div class="media">
											<img src="{{asset('/template2/images/dummy-img-400x400.jpg')}}" alt="" class="rounded-circle">
										</div>
										<p class="quote-name">
											Johny Doel <span>CEO abc.xyz</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection
