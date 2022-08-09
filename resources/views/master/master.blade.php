<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>{{ AppHelper::pengaturan('nama_apps') }}</title>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Favicon -->
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a7eeb46c00defd"></script>
		<meta property="fb:app_id" content="384966771861285" />
		<meta property="og:image" content="@yield('image')"/>

		<meta property="og:description" content="@yield('description')"/>

		<meta property="og:url" content="@yield('url')"/>

		<meta property="og:title" content="@yield('title')"/>

		<link rel="shortcut icon" href="{{ AppHelper::pengaturan('favicon') }}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{ AppHelper::pengaturan('favicon') }}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{url('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/vendor/animate/animate.min.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/vendor/magnific-popup/magnific-popup.min.css')}}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{url('public/assets/css/theme.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/css/theme-elements.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/css/theme-blog.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/css/theme-shop.css')}}">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{url('public/assets/vendor/rs-plugin/css/settings.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/vendor/rs-plugin/css/layers.css')}}">
		<link rel="stylesheet" href="{{url('public/assets/vendor/rs-plugin/css/navigation.css')}}">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{url('public/assets/css/skins/skin-corporate-5.css')}}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{url('public/assets/css/custom.css')}}">

		<!-- Head Libs -->
		<script src="{{url('public/assets/vendor/modernizr/modernizr.min.js')}}"></script>
	</head>
	<body>

		<div class="body">
			<header id="header" class="header-narrow" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": false}'>
				<div class="header-body">
					<div class="header-top header-top-secondary header-top-style-3">
						<div class="container" id="mail">
							<p class="text-color-light">
								<span class="ml-xs"><i class="fa fa-phone"></i> {{ AppHelper::pengaturan('telp') }}</span><span class="hidden-xs"> | <i class="fa fa-envelope"></i> <a href="#">{{ AppHelper::pengaturan('email') }}</a></span>
							</p>
							<div class="header-search hidden-xs">
								<form id="searchForm" action="#" method="get">
									<div class="input-group">
										<input type="text" class="form-control" name="q" id="q" placeholder="Search..." required>
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
										</span>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-logo">
									<a href="{{ url('/') }}">
										<img alt="Porto" width="230" height="48" src="{{ AppHelper::pengaturan('logo_apps') }}">
									</a>
								</div>
							</div>
							<div class="header-column">
								<div class="header-row">
									<div class="header-nav">
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
											<i class="fa fa-bars"></i>
										</button>
										<ul class="header-social-icons social-icons hidden-xs">
											<li class="social-icons-facebook"><a href="{{ AppHelper::pengaturan('link_fb') }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
											<li class="social-icons-twitter"><a href="{{ AppHelper::pengaturan('link_twitter') }}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
											<li class="social-icons-linkedin"><a href="{{ AppHelper::pengaturan('link_linkedin') }}" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
										</ul>
										<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
											<nav>
												<ul class="nav nav-pills" id="mainNav">
													<li id="index" class="dropdown">
														<a href="{{ url('/') }}">
															Home
														</a>
													</li>
													<li id="tentang" class="dropdown" >
														<a class="dropdown-toggle" href="#" id="tentang">
															Tentang
														</a>
														<ul class="dropdown-menu">
															{{ AppHelper::get_halaman() }}
														</ul>
													</li>
													<li class="dropdown" id="perizinan">
														<a class="dropdown-toggle" href="#">
															Perizinan
														</a>
														<ul class="dropdown-menu">
															<li><a href="{{ url('infoizin') }}">Informasi Perizinan</a></li>
															{{ AppHelper::get_perizinan() }}
														</ul>
													</li>
													<li class="dropdown" id="pengaduan">
														<a href="{{ url('pengaduan') }}">
															Pengaduan 
														</a>
													</li>
													<li class="dropdown" id="berita">
														<a href="{{ url('berita') }}">
															Berita 
														</a>
													</li>
													<li class="dropdown" id="galeri">
														<a href="{{ url('galeri') }}">
															Galeri 
														</a>
													</li>
													<li class="dropdown" id="kontak">
														<a href="{{ url('kontak') }}">
															Kontak 
														</a>
													</li>
												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			@yield('content')
 
			<footer id="footer">
				<div class="container" style="margin-bottom: -2em;">
					<div class="row">
						<div class="col-md-3">
							<div class="contact-details">
								<h4>Tautan Kami</h4>
								<ul class="nav nav-list mb-xlg">
									{!! AppHelper::get_link() !!}
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-details">
								<h4>Hubungi Kami</h4>
								<ul class="contact">
									<li><p><i class="fa fa-map-marker"></i> <strong>Alamat:</strong> {{ AppHelper::pengaturan('alamat') }}</p></li>
									<li><p><i class="fa fa-phone"></i> <strong>Telepon:</strong> {{ AppHelper::pengaturan('telp') }}</p></li>
									<li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:{{ AppHelper::pengaturan('email') }}">{{ AppHelper::pengaturan('email') }}</a></p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-5">
							<h4>Peta Kantor</h4>
							<div id="googlemaps" class="google-map small">
								<iframe src="{{ AppHelper::pengaturan('gmap') }}" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<p>© Copyright {{ date('Y') }} - {{ AppHelper::pengaturan('nama_apps') }}</p>
							</div>
							<div class="col-md-4">
								<nav id="sub-menu">
									<ul>
										<li><a href="#">FAQ's</a></li>
										<li><a href="#">Sitemap</a></li>
										<li><a href="/kontak">Kontak</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="{{url('public/assets/vendor/jquery/jquery.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/jquery-cookie/jquery-cookie.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/common/common.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/jquery.validation/jquery.validation.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/isotope/jquery.isotope.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/vide/vide.min.js')}}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{url('public/assets/js/theme.js')}}"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="{{url('public/assets/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
		<script src="{{url('public/assets/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
		<script src="{{url('public/assets/js/examples/examples.portfolio.js')}}"></script>
		
		<!-- Theme Custom -->
		<script src="{{url('public/assets/js/custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{url('public/assets/js/theme.init.js')}}"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				@if(Request::is('/'))
					$("#index").addClass("active");
				@endif
				@if(Request::is('berita'))
					$("#berita").addClass("active");
				@endif
				@if(Request::is('galeri'))
					$("#galeri").addClass("active");
				@endif
				@if(Request::is('pendahuluan'))
					$("#tentang").addClass("active");
				@endif
				@if(Request::is('profil'))
					$("#tentang").addClass("active");
				@endif
				@if(Request::is('vismis'))
					$("#tentang").addClass("active");
				@endif
				@if(Request::is('struktur'))
					$("#tentang").addClass("active");
				@endif
				@if(Request::is('infoizin'))
					$("#perizinan").addClass("active");
				@endif
				@if(Request::is('infoizin'))
					$("#perizinan").addClass("active");
				@endif
				@if(Request::is('imb'))
					$("#perizinan").addClass("active");
				@endif
				@if(Request::is('reklame'))
					$("#perizinan").addClass("active");
				@endif
				@if(Request::is('infoizin'))
					$("#perizinan").addClass("active");
				@endif
				@if(Request::is('izingangguan'))
					$("#perizinan").addClass("active");
				@endif
				@if(Request::is('situsiup'))
					$("#perizinan").addClass("active");
				@endif
				@if(Request::is('izinkes'))
					$("#perizinan").addClass("active");
				@endif
				@if(Request::is('kontak'))
					$("#kontak").addClass("active");
				@endif
			});
		</script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

	</body>
</html>