@extends('master.master')

@section('content')
			
				<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Tentang</a></li>
									<li class="active"> Struktur Organisasi</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-9">

							<h2><strong> Struktur Organisasi</strong></h2>

							<div class="row">
								<div class="col-md-12">
									<p><img alt="" src="{{url('public/assets/img/str.png')}}" style="height:900px; width:800px" /></p>
								</div>
							</div>

						</div>

						<div class="col-md-3">
							<aside class="sidebar">
								<div class="widget widget-categories">
									<h5 style="text-align: center;"><strong>Bupati & Wakil Bupati Ketapang</strong></h5>
									<center>
									<img src="{{url('public/assets/img/Bupati-2016.png')}}" width="100%" height="100%">
									</center>
								</div><!-- Categories end -->
								<br>
								<h4><strong>Link Terkait</strong></h4>
								<ul class="nav nav-list mb-xlg">
									<li><a href="#">BKPM</a></li>
									<li><a href="#">BPMPTSP Kalbar</a></li>
									<li><a href="#">BPS Ketapang</a></li>
									<li><a href="#">Humas Ketapang</a></li>
									<li><a href="#">KLH Ketapang</a></li>
									<li><a href="#">PN Ketapang</a></li>
									<li><a href="#">Web Ketapang</a></li>
								</ul>
							</aside>
						</div>
					</div>

				</div>

			</div>
@endsection
