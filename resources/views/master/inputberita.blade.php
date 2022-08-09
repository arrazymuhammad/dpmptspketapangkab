@extends('master.master')

@section('content')
			
				<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Pengaduan</a></li>
									<li class="active">  Pengaduan</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-9">

						<h2><strong>  Pengaduan</strong></h2>

						<div class="alert alert-success hidden mt-lg" id="contactSuccess">
								<strong>Success!</strong> Your message has been sent to us.
							</div>

							<div class="alert alert-danger hidden mt-lg" id="contactError">
								<strong>Error!</strong> There was an error sending your message.
								<span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
							</div>

							<form id="contactForm" action="" method="POST" enctype="multipart/form-data">
								{!!csrf_field()!!}
								<div class="row">
									<div class="form-group">
										<div class="col-md-6">
											<label>tags *</label>
											<input type="text" value="" placeholder="Masukkan No Hp" maxlength="100" class="form-control" name="tags" id="tags" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Judul Pengaduan</label>
											<input type="text" value="" placeholder="Masukkan Judul Pengaduan" class="form-control" name="judul" id="subject" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Isi Aduan *</label>
											<textarea maxlength="5000" placeholder="Masukkan isi aduan" rows="10" class="form-control" name="deskripsi" id=" 	isi_aduan" required></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<input type="file" name="gambar">
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="submit" value="Kirim" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
									</div>
								</div>
							</form>

					</div>

						<div class="col-md-3">
							<aside class="sidebar">
								<div class="widget widget-categories">
									<h5 style="text-align: center;"><strong>Bupati & Wakil Bupati Ketapang</strong></h5>
									<center>
									<img src="http://kpt-ketapangkab.net/images/Bupati-2016.png" width="100%" height="100%">
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
