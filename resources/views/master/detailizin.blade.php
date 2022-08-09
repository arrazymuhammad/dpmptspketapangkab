@extends('master.master')

@section('content')
			
				<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Perizinan</a></li>
									<li class="active">{{ $view->perizinan }}</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-9">

						<h2><strong>{{ $view->perizinan }}</strong></h2>

						<div class="row">
							<div class="col-md-12">
								{!! $view->isi !!}
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<strong>FILE DOWNLOAD</strong>
								<ol>
									@foreach($file as $var)
										<li><a href="{{ url('/') }}{{ $var->filenya }}">{{ $var->nama_file }}</a></li>
									@endforeach
								</ol>
							</div>
						</div>

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
