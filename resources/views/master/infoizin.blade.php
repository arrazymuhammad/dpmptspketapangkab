@extends('master.master')

@section('content')
			
				<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Perizinan</a></li>
									<li class="active"> Info Perizinan</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-9">

							<h2><strong> Info Perizinan</strong></h2>

							<div class="row">
								<div class="col-md-12">
									<center><strong>Masukan Pencarian (Berdasarkan NIK)</strong></center>
									<br>
								<form class="form-horizontal" action="{{url('infoizin')}}" method="post" id="domainSearchForm" novalidate="novalidate">
								{!!csrf_field()!!}
									<div class="form-group form-group-lg">
										<div class="col-sm-10">
											<div class="input-group">
												<input name="nik" class="form-control" aria-label="..." placeholder="Masukkan NIK Anda" required="" data-msg-required="Masukkan NIK Anda" aria-required="true" type="text">
												<input name="tld" value="nik" type="hidden">
												<div class="input-group-btn">
													<button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="tldBtn" value="1">NIK <span class="caret">
													</span>

													</button>
												</div>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="input-group">
												<select class="form-control" name="jenis">
													<option value="1">SIUP</option>
													<option value="2">HO</option>
													<option value="3">IMB</option>
												</select>
											</div>
										</div>
									</div>
									<center><button class="btn btn-lg btn-primary mt-md">Cari</button></center>
								</form>
								</div>
							</div>
							{{-- siup --}}
								<hr style="width: 100%"> 
								<center>
									<h5>Surat Izin Usaha Pedagangan  (SIUP)</h5>
								</center>
								<ol>
									@foreach ($datasiup as $siup)
										<li>Permohonan SIUP a.n. <b>{{$siup["nama_pemohon"]}} - {{$siup["nama_perusahaan"]}}</b> : <i>{{AppHelper::stat_siup($siup["status_verifikasi"])}}</i></li>
									@endforeach
								</ol>
							{{-- ho --}}
								<hr style="width: 100%"> 
								<center>
									<h5>Izin Gangguan</h5>
								</center>
								<ol>
									@foreach ($dataho as $ho)
										<li>
											Permohonan Izin Gangguan a.n. <b>{{$ho["nama_pemohon"]}} - {{$ho["nama_merk"]}}</b>  :
											<i>
												@if($ho["status_kelengkapan"] == 0)
													Cek Kelengkapan / Verifikasi Berkas
												@elseif($ho["status_kelengkapan"] == 1)
													@if($ho["status_verifikasi"] == 0)
														Pemeriksaan Lapangan
													@elseif($ho["status_verifikasi"] == 1)
														@if($ho["status_pembayaran"] == 1)
															Penandatanganan Dokumen
														@elseif($ho["status_pembayaran"] == 2)
															Izin Telah Terbit (Belum Lunas Retribusi)
														@elseif($ho["status_pembayaran"] == 3)
															Izin Telah Terbit
														@endif
													@elseif($ho["status_verifikasi"] == 2)
														Berkas Ditolak Verifikator
													@elseif($ho["status_verifikasi"] == 3)
														Proses Verifikasi
													@endif
												@else
													Berkas Ditolak
												@endif
											</i>
										</li>
									@endforeach
								</ol>
							{{-- imb --}}
								<hr style="width: 100%"> 
								<center>
									<h5>Izin Mendirikan Bangunan (IMB)</h5>
								</center>
								<ol>
									@foreach ($dataimb as $imb)
										<li>
											Permohonan IMB a.n. <b>{{$imb["nama_pemohon"]}} - {{$imb["nama_bangunan"]}}</b> : 
											<i>
												@if($imb["status_kelengkapan"] == 0)
													Pengecekan kelengkapan berkas
												@elseif($imb["status_kelengkapan"] == 1)
													Proses Pemeriksaan Lapangan
												@elseif($imb["status_kelengkapan"] == 2)
													Berkas Tidak Lengkap
												@elseif($imb["status_kelengkapan"] == 3)
													Proses Pemeriksaan Lapangan
												@elseif($imb["status_kelengkapan"] == 4)
													Proses Verifikasi Berkas
												@elseif($imb["status_kelengkapan"] == 5)
													@if($imb["status_pembayaran"] == 0)
														Proses Pembuatan SK
													@elseif($imb["status_pembayaran"] == 1)
														@if($imb["sertifikat"] == NULL)
															Proses Penandatanganan
														@else
															Izin Telah Diterbitkan (Belum Lunas)
														@endif
													@elseif($imb["status_pembayaran"] == 2)
														Izin Telah Diterbitkan
													@endif
												@endif
											</i>
										</li>
									@endforeach
								</ol>
						</div>

						<div class="col-md-3">
							<aside class="sidebar">
								@include('master.sidebar')
							</aside>
						</div>
					</div>

				</div>

			</div>
@endsection
