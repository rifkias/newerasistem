<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Era Sistem</title>
    <meta name="description" content="COXE is a clean, modern, and fully responsive Html Template. it is designed for corporate, finacial, insurance, agency, businesses or any type of person or business who wants to showcase their work, services and professional way.">
    <meta name="keywords" content="business, clean, company, corporate, gallery, huge, lightbox, modern, multipurpose, html template, portfolio, rometheme, startup">
    <meta name="author" content="rometheme.net">

	<!-- ==============================================
	Favicons
	=============================================== -->
	<link rel="shortcut icon" href="{{asset('/template2/favicon/favicon-32x32.png')}}">
	<link rel="apple-touch-icon" href="{{asset('/template2/favicon/apple-icon.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('/template2/favicon/apple-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('/template2/images/apple-icon-114x114.png')}}">

	<!-- ==============================================
	CSS VENDOR
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="{{asset('template2/css/vendor/bootstrap.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('/plugin/fontawesome-5/css/fontawesome-all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugin/printify-icon/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template2/css/vendor/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template2/css/vendor/owl.theme.default.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template2/css/vendor/magnific-popup.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template2/css/vendor/animate.min.css')}}">

	<!-- ==============================================
	Custom Stylesheet
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="{{asset('template2/css/style.css')}}" />

    <script src="{{asset('template2/js/vendor/modernizr.min.js')}}"></script>

</head>

<body data-spy="scroll" data-target="#navbar-example">

	<!-- LOAD PAGE -->
	<div class="animationload">
		<div class="loader"></div>
	</div>

	<!-- BACK TO TOP SECTION -->
	<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

	<!-- HEADER -->
    <div class="header header-1">

    	<!-- TOPBAR -->
    	<div class="topbar d-none d-md-block">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-sm-4 col-md-2 col-lg-4">
						<p class="mb-0"><em>Solusi Bagi Perkembangan Bisnis Anda</em></p>
					</div>
					<div class="col-sm-8 col-md-10 col-lg-8">
						<div class="info pull-right">
							<div class="info-item">
								<i class="fa fa-envelope-o"></i> Mail :  support@newerasistem.com
							</div>
							<div class="info-item">
								<i class="fa fa-phone"></i> Call Us : +62 812-9529-2571
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- NAVBAR SECTION -->
		<div class="navbar-main">
			<div class="container">
			    <nav id="navbar-main" class="navbar navbar-expand-lg">
			        <a class="navbar-brand" href="index.html">
						<img src="{{asset('/template2/images/logo2.png')}}" alt="" style="padding-bottom: 5px;"/>
					</a>
			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>
			        <div class="collapse navbar-collapse" id="navbarNavDropdown">
			            <ul class="navbar-nav ml-auto">
			                <li class="nav-item <?php echo (@$page == 'home' ? 'active' : '') ?>">
			                    <a class="nav-link" href="/">BERANDA</a>
			                </li>
                            <li class="nav-item <?php echo (@$page == 'about' ? 'active' : '' ) ?>">
			                    <a class="nav-link" href="/tentang-kami">TENTANG KAMI</a>
			                </li>
			                <li class="nav-item dropdown <?php echo (@$page == 'about' ? 'service' : '' ) ?>">
			                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          JASA KAMI
						        </a>
			                    <div class="dropdown-menu">
			                    	<a class="dropdown-item" target="_blank" href="http://percetakan.newerasistem.com/">New Era Printing</a>
	          						<a class="dropdown-item" target="_blank" href="http://konsultan.newerasistem.com">New Era Konsultan</a>
							    </div>
			                </li>
			                <li class="nav-item dropdown <?php echo (@$page == 'any' ? 'active' : '' ) ?>">
			                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          LAINNYA
						        </a>
			                    <div class="dropdown-menu">
			                    	<a class="dropdown-item" href="portfolio.html">Portofolio</a>
	          						<a class="dropdown-item" href="portfolio-2.html">Blog</a>
	          						<a class="dropdown-item" href="portfolio-single.html">News</a>
							    </div>
			                </li>
			                <li class="nav-item <?php echo (@$page == 'contact' ? 'active' : '' ) ?>">
			                    <a class="nav-link" href="contact.html">CONTACT</a>
			                </li>
			            </ul>
			        </div>
			    </nav> <!-- -->
			</div>
		</div>

    </div>
    @yield('content')
	<!-- LATEST NEWS -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading text-center text-primary no-after mb-5">
							LATEST NEWS
						</h2>
						<p class="subheading text-center">We provide high standar clean website for your business solutions</p>
					</div>
				</div>

				<div class="row mt-4">

					<!-- Item 1 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-news-1 mb-1">
							<div class="media-box">
								<div class="meta-date"><span>30</span>May</div>
								<a href="blog-single.html">
									<img src="{{asset('/template2/images/dummy-img-600x500.jpg')}}" alt="" class="img-fluid">
								</a>
							</div>
							<div class="body-box">
								<div class="title"><a href="blog-single.html">TYPING NEW KEYBOARD</a></div>
								<p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
							</div>
						</div>
					</div>

					<!-- Item 2 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-news-1 mb-1">
							<div class="media-box">
								<div class="meta-date"><span>04</span>Jun</div>
								<a href="blog-single.html">
									<img src="{{asset('/template2/images/dummy-img-600x500.jpg')}}" alt="" class="img-fluid">
								</a>
							</div>
							<div class="body-box">
								<div class="title"><a href="blog-single.html">NEW HARDWARE SHOW UP</a></div>
								<p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
							</div>
						</div>
					</div>

					<!-- Item 3 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-news-1 mb-1">
							<div class="media-box">
								<div class="meta-date"><span>16</span>Jun</div>
								<a href="blog-single.html">
									<img src="{{asset('/template2/images/dummy-img-600x500.jpg')}}" alt="" class="img-fluid">
								</a>
							</div>
							<div class="body-box">
								<div class="title"><a href="blog-single.html">MOCK WITH WOOD TABLE</a></div>
								<p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
							</div>
						</div>
					</div>

				</div>

				<div class="row mt-4">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="text-center">
							<a href="#" class="btn btn-primary">MORE POST</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- OUR PARTNERS -->
	<div class="section bg-secondary">
		<div class="content-wrap py-5">
			<div class="container">

				<div class="row">
					<div class="col-12">
						<h2 class="section-heading text-center text-white">
							OUR CLIENTS
						</h2>
					</div>
				</div>
				<div class="row gutter-5">
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="{{asset('/template2/images/client1w.png')}}" alt="" class="img-fluid img-border"></a>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="{{asset('/template2/images/client2w.png')}}" alt="" class="img-fluid img-border"></a>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="{{asset('/template2/images/client3w.png')}}" alt="" class="img-fluid img-border"></a>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="{{asset('/template2/images/client4w.png')}}" alt="" class="img-fluid img-border"></a>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="{{asset('/template2/images/client5w.png')}}" alt="" class="img-fluid img-border"></a>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="{{asset('/template2/images/client6w.png')}}" alt="" class="img-fluid img-border"></a>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- CTA -->
	<div class="section bgi-cover-center bg-primary" data-background="images/dummy-img-1920x900.jpg">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="text-center text-white">
							<h3>SUBSCRIBE TO GET IN TOUCH</h3>
							<p class="uk18 mb-0">We provide high standar clean website for your business solutions</p>

								<form class="form-inline justify-content-center subscribe-form mt-5">
								  <div class="form-group mx-sm-3 mb-2">
								    <label for="p_email" class="sr-only">Password</label>
								    <input type="email" class="form-control" id="p_email" placeholder="Enter your email address">
								  </div>
								  <button type="submit" class="btn btn-secondary mb-2">Subscribe</button>
								</form>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- FOOTER SECTION -->
	<div class="footer">
		<div class="content-wrap pb-0">
			<div class="container">

				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="footer-item">
							<img src="{{asset('/template2/images/logo-b.png')}}" alt="logo bottom" class="logo-bottom">
							<div class="spacer-30"></div>
							<p>COXE is a clean, modern, and fully responsive Html Template. it is designed for corporate, finacial, insurance, agency, businesses or any type of person or business who wants to showcase their work, services and professional way.</p>
							<div class="sosmed-icon d-inline-flex">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								LATEST NEWS
							</div>

							<ul class="recent-post">
								<li><a href="#" title="">The Best in dolor sit amet consectetur adipisicing elit sed</a>
								<span class="date"><i class="fa fa-clock-o"></i> June 16, 2017</span></li><li><a href="#" title="">The Best in dolor sit amet consectetur adipisicing elit sed</a>
								<span class="date"><i class="fa fa-clock-o"></i> June 16, 2017</span></li>
							</ul>

						</div>
					</div>

					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								USEFUL LINKS
							</div>
							<ul class="list">
								<li><a href="#" title="About Us">About Us</a></li>
								<li><a href="#" title="Corporate Profile">Corporate Profile</a></li>
								<li><a href="#" title="Our Team">Our Team</a></li>
								<li><a href="#" title="Portfolio">Portfolio</a></li>
								<li><a href="#" title="Our Office">Our Office</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								CONTACT INFO
							</div>

							<ul class="list-info">
								<li>
									<div class="info-icon">
										<span class="fa fa-map-marker"></span>
									</div>
									<div class="info-text">99 S.t Jomblo Park Pekanbaru 28292. Indonesia</div> </li>
								<li>
									<div class="info-icon">
										<span class="fa fa-phone"></span>
									</div>
									<div class="info-text">(0761) 654-123987</div>
								</li>
								<li>
									<div class="info-icon">
										<span class="fa fa-envelope"></span>
									</div>
									<div class="info-text">info@yoursite.com</div>
								</li>
								<li>
									<div class="info-icon">
										<span class="fa fa-clock-o"></span>
									</div>
									<div class="info-text">Mon - Sat 09:00 - 17:00</div>
								</li>
							</ul>

						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="fcopy">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<p class="ftex">Copyright 2019 &copy; <span class="color-primary">Coxe HTML Template</span>. Designed by <span class="color-primary">Rometheme.</span></p>
					</div>
				</div>
			</div>
		</div>

	</div>


	<!-- JS VENDOR -->
	<script src="{{asset('template2/js/vendor/jquery.min.js')}}"></script>
	<script src="{{asset('template2/js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{asset('template2/js/vendor/owl.carousel.js')}}"></script>
	<script src="{{asset('template2/js/vendor/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('template2/js/vendor/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('template2/js/vendor/imagesloaded.pkgd.min.js')}}"></script>

	<!-- SENDMAIL -->
	<script src="{{asset('template2/js/vendor/validator.min.js')}}"></script>
	<script src="{{asset('template2/js/vendor/form-scripts.js')}}"></script>

	<!-- GOOGLEMAP -->
	<script src="{{asset('template2/js/googlemap-setting.js')}}"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU&callback=initMap"> </script>

	<script src="{{asset('template2/js/script.js')}}"></script>

</body>
</html>
