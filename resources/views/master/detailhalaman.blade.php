@extends('master.master')

@section('content')
			
				<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Tentang</a></li>
									<li class="active"> {{ $view->judul }}</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-9">

							<h2><strong>{{ $view->judul }}</strong></h2>

							<div class="row">
								<div class="col-md-12">
									{!! $view->isi!!}
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
