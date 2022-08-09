@extends('master.master')

@section('content')
			<div role="main" class="main">
				<div class="slider-container rev_slider_wrapper">
					<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"delay": 9000, "gridwidth": 1170, "gridheight": 500}'>
						<ul>
							@foreach($slider as $a)
								<li data-transition="fade">

									<img src="{{url('/')}}{{ $a->slide }}"  
										alt=""
										data-bgposition="center center" 
										data-bgfit="cover" 
										data-bgrepeat="no-repeat" 
										class="rev-slidebg">

								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="home-intro" id="home-intro">
					<div class="container">


					</div>
				</div>
				<div class="container">
					<div class="row mb-xl">
						<div class="col-md-4">
							<h2 class="mb-xl"><strong>Agenda</strong></h2>
							@foreach($agenda as $var)
							<div class="content-box">
								<h4 style="display: inline;"><i class="fa fa-calendar"></i> {{Date::indonesian_date($var->tanggal,'j F Y')}}</h4>
								<div class="content-box-content">
								<p>{{$var->agenda}}</p>
								</div>
							</div><!-- Content box end -->
							@endforeach
						</div>
						<div class="col-md-8">
							<h2 class="mb-xl"><strong>Layanan Kami</strong></h2>

							<div class="row">
								<div class="col-md-6">
									<div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
										<div class="feature-box-icon">
											<i class="fa fa-medkit icons"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-sm">izin Kesehatan</h4>
											<p class="mb-lg" style="text-align: justify;">izin Kesehatan adalah izin yang diberikan kepada seseorang atau badan hukum untuk menyelenggarakan / memberikan pelayanan pada sarana kesehatan setelah memenuhi persyaratan tertentu.<br>
											<a class="btn btn-info mt-xs mb-xl" href="{{ url('izinkes') }}">Read More</a></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
										<div class="feature-box-icon">
											<i class="fa fa-exclamation-triangle icons"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-sm">Izin Gangguan</h4>
											<p class="mb-lg" style="text-align: justify;">Izin Gangguan adalah izin kegiatan usaha kepada orang pribadi / badan dilokasi tertentu yang berpotensi menimbulkan bahaya kerugian dan gangguan, ketentraman dan ketertiban .<br>
											<a class="btn btn-info mt-xs mb-xl" href="{{ url('izingangguan') }}">Read More</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row mt-md">
								<div class="col-md-6">
									<div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
										<div class="feature-box-icon">
											<i class="fa fa-building-o icons"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-sm">IMB</h4>
											<p class="mb-lg" style="text-align: justify;">IMB adalah perizinan yang diberikan oleh Kepala Daerah kepada pemilik bangunan untuk membangun baru, mengubah, memperluas, mengurangi, dan/atau merawat bangunan .<br>
											<a class="btn btn-info mt-xs mb-xl" href="{{ url('imb') }}">Read More</a></p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
										<div class="feature-box-icon">
											<i class="fa fa-bank icons"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-sm">SIUP</h4>
											<p class="mb-lg" style="text-align: justify;">SIUP adalah Surat Izin untuk mendirikan Usaha yang dikeluarkan Instansi Pemerintah melalui Dinas Perindustrian dan Perdagangan di Wilayah sesuai domisili perusahaan .<br>
											<a class="btn btn-info mt-xs mb-xl" href="{{ url('situsiup') }}">Read More</a></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-md">
								<div class="col-md-6">
									<div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
										<div class="feature-box-icon">
											<i class="fa fa-object-group icons"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-sm">Izin Reklame</h4>
											<p class="mb-lg" style="text-align: justify;">Izin Reklame adalah Izin yang diberikan kepada orang / perorangan atau Badan Usaha / Prushan untuk dapat menyelenggarakan / memasang reklame dalam jangka waktu tertentu.<br>
											<a class="btn btn-info mt-xs mb-xl" href="{{ url('reklame') }}">Read More</a></p>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				@if(AppHelper::pengaturan('simulasi') == '1')
					<div class="container">
						<div class="col-md-12">
							<div class="heading heading-border heading-middle-border heading-middle-border-center">
								<h2> <strong>Simulasi</strong></h2>
							</div>
							<iframe src="/simulasi" style="width: 100%;height: 512px;overflow-y: hidden;border:none; " scrolling="no"></iframe>
						</div>
					</div>
				@endif
				<section class="section mt-xl pb-none">
					<div class="container">
					<div class="row" style="margin-bottom: 4em;">
						<div class="counters">
							<div class="col-md-4 col-sm-6">
								<div class="counter counter-dark">
									<i class="fa fa-university"></i>
									<strong data-to="<?php echo $count; ?>" data-append="">0</strong>
									<label>Jumlah Perizinan</label>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="counter counter-dark">
									<i class="fa fa-question"></i>
									<strong data-to="<?php echo $aduan; ?>">0</strong>
									<label>Jumlah Pengaduan</label>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="counter counter-dark">
									<i class="fa fa-globe"></i>
									<strong data-to="<?php echo $visitor; ?>">0</strong>
									<label>Jumlah Pengunjung</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				</section>
				<div class="container">
					<div class="row mt-xl">
						<div class="col-md-12 center">
							<h2 class="mb-xl"><strong>Berita Terbaru</strong></h2>
						</div>
					</div>
					<div class="row">
						@foreach($berita as $vars)
						<div class="col-md-4">
							<img class="img-responsive" src="{{url(''.$vars->gambar.'')}}" alt="Blog">
							<div class="recent-posts mt-xl">
								<article class="post">
									<div class="date">
										<span class="day">{{Date::indonesian_date($vars->tanggal,'j')}}</span>
										<span class="month">{{substr(Date::indonesian_date($vars->tanggal,'F'), 0, 3)}}</span>
									</div>
									<h4 id="judulblog" style="text-align: left;"><a href="{{ url('detailberita/'.$vars->id_berita.'') }}">{{$vars->judul}}</a></h4>
									<p style="text-align: justify;">
									{!!Date::truncate(($vars->deskripsi), 20, 100)!!}</p>
									<a href="{{ url('detailberita/'.$vars->id_berita.'') }}" class="btn btn-primary mt-md mb-xl">Read More</a>
								</article>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
@endsection
