<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KSP - SipBos</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('/template/img/Logo.png')}}">
	<link rel="stylesheet" href="{{asset('/template/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/template/css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('/template/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('/template/css/icomoon.css')}}">
	<link rel="stylesheet" href="{{asset('/template/css/transitions.css')}}">
	<link rel="stylesheet" href="{{asset('/template/css/prettyPhoto.css')}}">
	<link rel="stylesheet" href="{{asset('/template/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('/template/css/pogoslider.css')}}">
	<link rel="stylesheet" href="{{asset('/template/style.css')}}">
	<link rel="stylesheet" href="{{asset('/template/css/color.css')}}">
	<link rel="stylesheet" href="{{asset('/template/css/responsive.css')}}">
	<script src="{{asset('/template/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    @stack('css')
</head>
<body class="at-home at-homeone">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Loader Start
	*************************************-->
	<div class="lds-roller">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<!--************************************
			Loader End
	*************************************-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="at-wrapper" class="at-wrapper">
		<!--************************************
				Header Start
		*************************************-->
		<header id="at-header" class="at-header">
			<div class="container-fluid">
				<div class="row">
					<strong class="at-logo"><a href="index.html"><img src="{{asset('/template/img/Logo.png')}}" alt="Berkat Artha Sentosa Logo"></a></strong>
					<div class="at-navigationarea">
						<nav id="at-nav" class="at-nav">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#at-navigation" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div id="at-navigation" class="collapse navbar-collapse at-navigation">
								<ul>
									<li class="@if(@$page == 'home') current-menu-item @endif">
										<a href="/">Home</a>

									</li>
									<li class="@if(@$page == 'about') current-menu-item @endif">
										<a href="/about-us">Tentang Kami</a>
									</li>
									<li class="menu-item-has-children @if(@$page == 'produk') current-menu-item @endif">
										<a href="/produk">Produk Kami</a>
										<ul class="sub-menu">

                                            @foreach ($produk as $item)
                                                <li><a href="/produk/{{$item->slug}}">{{$item->nama_produk}}</a></li>
                                            @endforeach
										</ul>
									</li>
									<li class="@if(@$page == 'Contact') current-menu-item @endif">
										<a href="/contact-us">Contact us</a>
									</li>
                                    <li class="menu-item-has-children @if(@$page == 'other') current-menu-item @endif">
										<a href="javascript:void(0);">Lainnya</a>
										<ul class="sub-menu">
											<li><a href="/faq">faq</a></li>
											{{-- <li><a href="gallery.html">News</a></li> --}}
											{{-- <li><a href="maintenance.html">Blog</a></li> --}}
											{{-- <li><a href="ourprocess.html">Company Profile</a></li> --}}
											{{-- <li><a href="ourprocess.html">Brosur Kami</a></li> --}}
											{{-- <li><a href="ourprocess.html">Galeri</a></li> --}}
											{{-- <li><a href="pricingtable.html">pricing table</a></li>
											<li class="menu-item-has-children">
												<a href="javascript:void(0);">services</a>
												<ul class="sub-menu">
													<li><a href="servicesv1.html">services v one</a></li>
													<li><a href="servicesv2.html">services v two</a></li>
													<li><a href="servicesv3.html">services v three</a></li>
												</ul>
											</li>
											<li><a href="404.html">404</a></li>
											<li><a href="comingsoon.html">comingsoon</a></li> --}}
										</ul>
									</li>
								</ul>
							</div>
						</nav>
						<div class="at-contactsocial">
							<span class="at-contactnumber">
								<i class="icon-telephone114"></i>
								<em>021-2918-2901</em>
							</span>
							<ul class="at-socialicons">
								<li class="at-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
								<li class="at-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
								<li class="at-instagram"><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--************************************
				Header End
		*************************************-->
            @yield('main')
		<!--************************************
				Footer Start
		*************************************-->
		<footer id="at-footer" class="at-footer at-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="at-emailsubscribearea">
							<p>Dapatkan berita dan info tentang produk terbaru kami .</p>
							<form class="at-formtheme at-formnewsletter">
								<fieldset>
									<input type="email" name="email" class="form-control" placeholder="Your e-mail address">
									<button class="at-btn" type="submit">Subscribe</button>
								</fieldset>
							</form>
						</div>
						<div class="at-threecolumns">
							<div class="at-fcolumn">
								<div class="at-widget at-widgettext">
									<strong class="at-logo"><a href="/"><img src="{{asset('/template/img/Logof.png')}}" alt="image description"></a></strong>
									<div class="at-description">
										<p>Koperasi Berkat Artha Sentosa Diberkati untuk memberkati. </p>
									</div>
									<ul class="at-socialicons">
										<li class="at-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="at-twitter"><a target="_blank" href="https://twitter.com/KSipbos?s=08"><i class="fa fa-twitter"></i></a></li>
										<li class="at-instagram"><a target="_blank" href="https://instagram.com/sipbos_id?utm_medium=copy_link"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="at-fcolumn">
								<div class="at-widget at-widgetusefullinks">
									<div class="at-fwidgettitle">
										<h3>Useful Links</h3>
									</div>
									<div class="at-widgetcontent">
										<ul>
											<li><a href="/">Home</a></li>
											<li><a href="/produk">Produk Kami</a></li>
											<li><a href="/about-us">Tentang Kami</a></li>
											{{-- <li><a href="javascript:void(0);">News</a></li> --}}
											<li><a href="/contact-us">Contact Us</a></li>
											{{-- <li><a href="javascript:void(0);">Blog</a></li> --}}
											<li><a href="/faq">Faq</a></li>
											{{-- <li><a href="javascript:void(0);">Brosur Kami</a></li> --}}
										</ul>
									</div>
								</div>
							</div>
							{{-- <div class="at-fcolumn">
								<div class="at-widget">
									<div class="at-fwidgettitle">
										<h3>Recent News</h3>
									</div>
									<div class="at-widgetcontent">
										<ul>
											<li>
												<p>Product Design &amp; Branding Innovative Brand Design Concepts</p>
												<time datetime="2018-01-12">January 28, 2018</time>
											</li>
											<li>
												<p>Product Design &amp; Branding Innovative Brand Design Concepts</p>
												<time datetime="2018-01-12">January 28, 2018</time>
											</li>
										</ul>
									</div>
								</div>
							</div> --}}
						</div>
						<div class="at-copyright">
							<p>Copyright &copy; Koperasi Berkat Artha Sentosa {{now()->year}}. All rights reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="{{asset('/template/js/vendor/jquery-library.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeOh_Qw6A5V_xZ9LIrU3ipWoTL827SwUg&v=3.exp"></script>
	<script src="{{asset('/template/js/vendor/jquery-migrate.js')}}"></script>
	<script src="{{asset('/template/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('/template/js/jquery.sticky-kit.js')}}"></script>
	<script src="{{asset('/template/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('/template/js/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('/template/js/isotope.pkgd.js')}}"></script>
	<script src="{{asset('/template/js/prettyPhoto.js')}}"></script>
	<script src="{{asset('/template/js/jquery.vide.js')}}"></script>
	<script src="{{asset('/template/js/pogoslider.js')}}"></script>
	<script src="{{asset('/template/js/countTo.js')}}"></script>
	<script src="{{asset('/template/js/appear.js')}}"></script>
	<script src="{{asset('/template/js/gmap3.js')}}"></script>
	<script src="{{asset('/template/js/function.js')}}"></script>
    @stack('script')
</body>
</html>
